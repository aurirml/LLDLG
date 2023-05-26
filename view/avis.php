<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="assets/css/Carte.css" />
    <link rel="stylesheet" href="assets/css/navig.css" />
    <link rel="stylesheet" href="assets/css/connexion.css" />
    <script src="assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/Favicon.ico">
</head>

<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="clark-house-nav navbar-3 w-nav">
    <div class="container-4 w-container">
        <nav role="navigation" class="nav-menu-2 w-nav-menu">
            <div class="nav-link-container">
                <a href="Carte.php" class="nav-link w-nav-link">La Carte</a>
            </div>
            <div class="nav-link-container">
                <a href="avis.php" class="nav-link w-nav-link">Avis</a>
            </div>
            <a href="index.php" aria-current="page" class="brand-3 w-nav-brand w--current">
                <img src="assets/img/Favicon.png" class="ch-logo" width="10%" />
            </a>
            <div class="nav-link-container">
                <a href="panier.php" class="nav-link w-nav-link">Panier</a>
            </div>
            <div class="nav-link-container">
                <?php
                session_start();
                if (isset($_SESSION['con'])) {
                    $nom = $_SESSION['con'];
                ?><a href="connection.php" class="nav-link w-nav-link">Déconnexion</a><?php
                                                                                    } else {
                                                                                        ?><a href="connection.php" class="nav-link w-nav-link">Se Connecter</a><?php
                                                                                                                                                            }
                                                                                                                                                                ?>

            </div>
        </nav>
    </div>
</div>

<body style="background-image: url('./assets/img/proto3-2.png');background-repeat:no-repeat;">


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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $com = $_POST['com'];
    $note = $_POST['note'];
    if (is_numeric($note)) {
        $note = intval($note);
        echo $note;
        if ($note < 0 || $note > 10) {
            $_SESSION['int'] = "des chiffres entre 0 et 10 pour la note";
            header("Location: http://localhost/ProjetWD/avis.php");
            exit;
        }
    } else {
        $_SESSION['int'] = "des chiffres entre 0 et 10 pour la note stp";
        header("Location: http://localhost/ProjetWD/avis.php");
        exit;
    }



    $sql2 = "INSERT INTO `projet` (`id`, `nom`, `note`, `com`,`nom_plat`) VALUES (NULL, '$nom', '$note', '$com','RESTO');";
    $conn->query($sql2);
}
$sql = "SELECT * FROM projet WHERE nom_plat='RESTO';";
$result = $conn->query($sql);


?>
<div class="message"><?= "Laissez votre avis sur notre restaurant !" ?></div>
<div class="container">
<form class="form" method="POST" action="<?php echo (isset($_SESSION['con']) == TRUE) ? 'avis.php' : 'connection.php'; ?>">
    <input type="note" name="note" id="note" placeholder="Entrez une note sur dix" />
    <?= "<br/>"?>
    <input type="com" name="com" id="com" placeholder="Entrez votre commentaire" />
    <?="<br/>"?>
    <input type="submit" value="Envoyer">
</form>
</div>
<?="<br/>"?>
<div class="precedent"><?="Avis précédents"?></div>
<div class="autre">
<?php
while ($row = $result->fetch_assoc()) {
    ?>
    <figure>
    <figcaption>— <?=$row["nom"]?>, <cite>Note de : <?= $row["note"]?> / 10.</cite> Commentaire : </figcaption>
    <blockquote>
        <p><?= $row["com"]?></p>
    </blockquote>

</figure>
<?php
}
?>
</div>
<?php
$conn->close();
?>

</html>