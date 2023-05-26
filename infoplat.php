<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="assets/css/Carte.css" />
    <link rel="stylesheet" href="assets/css/navig.css" />
    <link rel="stylesheet" href="assets/css/panier.css" />
    <script src="assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/Favicon.ico">
</head>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dataBaseName = 'avis';
$conn = new mysqli($servername, $username, $password, $dataBaseName);
if ($conn->connect_error) {
    die("connection echou e");
}
//$sql="SELECT * FROM commande WHERE nom_plat='$plat'; ";
//$res=$conn->query($sql);
//if($res->num_rows>0){
$sql10 = "SELECT AVG(note) AS moyenne FROM projet WHERE nom_plat='$plat';";
$res10 = $conn->query($sql10);
$row = $res10->fetch_assoc();
$moyenne = number_format($row['moyenne'], 1);
//}else{
//    echo 'non noté';
//}
$conn->close();
?>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dataBaseName = 'avis';
$conn = new mysqli($servername, $username, $password, $dataBaseName);
if ($conn->connect_error) {
    die("connection echou�e");
}


$sql = "SELECT * FROM projet WHERE nom_plat ='$plat';";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["nom"] . '/ ' . $row["note"] . '/ ' . $row["com"];
    echo '<br/>';
}


$conn->close();
?>

<?php include 'nav.php';?>

<body style="background-image: url('./assets/img/proto3-2.png');background-repeat:no-repeat;" onload="currentSlide(1);initToggle();">
    <?php
    $item = json_decode($_GET["nom"]);
    $plat = $item->name_fr;
    ?>

    <div class="plat">
        <?php echo $plat; ?>
    </div>

    <?php

    $imageLinks = array();
    foreach ($item->images as $img) {
        if ($img != NULL) {
            if (getimagesize($img)) {
                array_push($imageLinks, $img);
            } else {
                array_push($imageLinks, "assets/img/error.png");
            }
        }
    }

    ?>
    <div class="carrousel">
        <div class="slideshow-container">

            <?php
            foreach ($imageLinks as $img) {
            ?>
                <div class="mySlides fade">
                    <img src="<?= $img; ?>" style="width:100%">
                </div>
            <?php
            }
            ?>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <div style="text-align:center">
        <?php

        for ($i = 1; $i <= count($imageLinks); $i++) {
        ?>

            <span class="dot" onclick="currentSlide(<?= $i; ?>)"></span>
        <?php
        }
        ?>
    </div>



    <div class="ingredients">
        <?php
        echo "<b>Ingrédients :</b> ";
        foreach ($item->ingredients as $ing) {
            echo " ~ " . $ing->name_fr;
        }

        ?>
    </div>

    <?php

    $i = 0;

    foreach ($item->prices as $prix) {
        $i++;
    }
    if ($i == 1) {
        $tarif = $prix->price;

    ?>
        <div class="prix"> <?= "<b>Prix :</b> $tarif €"; ?></div>
        <div class="container">
            <form method="POST" class="connexion">
                <input type="submit" class="ajout1" name="bouton1" value='Ajouter au panier'>
            </form>
        </div>
    <?php
    } elseif ($i >= 1) {
    ?>
        <div class="taille">
            <?php
            foreach ($item->prices as $prix) {
                $tarif = $prix->price;
                $taille = $prix->size;

            ?>

                <?php echo "<b>Taille </b>: $taille" ?><span style="float:right"><?= "<b>Prix</b>: $tarif € <br/>"; ?></span>
                <div class="container2">
                    <form method="POST" class="connexion">
                        <input type="submit" class="ajout2" name="bouton1" value='Ajouter au panier'>
                    </form>
                </div>
            <?php
            }
            ?>
        </div><?php
            }
                ?>

    <form class="form" method="POST" action="<?php echo (isset($_SESSION['con']) == TRUE) ? $_SERVER['REQUEST_URI'] : 'connection.php'; ?>">
        <input type="note" name="note" id="note" placeholder="entrez une note sur dix" />
        <input type="com" name="com" id="com" placeholder="entrez votre commentaire" />
        <input type="submit" name="bouton2" value="Envoyer">

    </form>
    <div class="avis">
        <?= "<b>Les avis sur notre $plat</b>"; ?>
    </div>

    <div class="note">
        <?= "Note moyenne de $moyenne / 10"; ?>
    </div>
    <div class="notation">
        <button type="button" class="collapsible">Open Collapsible</button>
        <div class="content">
            <p>Lorem ipsum...</p>
        </div>
    </div>



    <div class="author">
        <?php echo "<br/>" ?>
        <?php echo 'By : Allan Chopra & Auriane Ramel'; ?>
    </div>


</body>

<?php
if (isset($_SESSION['int'])) {
    $int = $_SESSION['int'];
    echo $int;
    unset($_SESSION['int']);
}
$servername = 'localhost';
$username = 'root';
$password = '';
$dataBaseName = 'avis';
$conn = new mysqli($servername, $username, $password, $dataBaseName);
if ($conn->connect_error) {
    die("connection echou�e");
}
$red = $_SERVER['REQUEST_URI'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bouton2'])) {
    $com = $_POST['com'];
    $note = $_POST['note'];
    if (is_numeric($note)) {
        $note = intval($note);
        //echo $note;
        if ($note < 0 || $note > 10) {
            $_SESSION['int'] = "des chiffres entre 0 et 10 pour la note";
            header("Location: $red");
            exit;
        }
    } else {
        $_SESSION['int'] = "des chiffres entre 0 et 10 pour la note stp";
        header("Location: $red");
        exit;
    }



    $sql2 = "INSERT INTO `projet` (`id`, `nom`, `note`, `com`,`nom_plat`) VALUES (NULL, '$nom', '$note', '$com','$plat');";
    $conn->query($sql2);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bouton1'])) {
    if (isset($_SESSION['con'])) {
        echo "ajouter au panier";
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dataBaseName = 'avis';
        $conn = new mysqli($servername, $username, $password, $dataBaseName);
        if ($conn->connect_error) {
            die("connection echouée");
        }
        $item = json_decode($_GET["nom"]);
        $plat = $item->name_fr;
        $sql2 = "INSERT INTO `commande` (`id_commande`, `nom_client`, `nom_plat`, `taille`) VALUES (NULL, '$nom','$plat','$taille');";
        $conn->query($sql2);
        $conn->close();
    } else {
        if (!isset($_SESSION['offline'])) {
            $_SESSION['offline'] = array();
        }
        $tableau = $_SESSION['offline'];
        $tableau[] = $plat;
        $_SESSION['offline'] = $tableau;
    }
}

?>


</html>