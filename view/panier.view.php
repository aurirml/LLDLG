<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/avis.css" />
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?php include('nav.php'); ?>

<body style="background-image: url('../view/assets/img/fond.png');">

    <?php

        /*
        if (isset($_SESSION['offline'])) {
            $montableau = $_SESSION['offline'];
            foreach ($montableau as $element) {
                $sql = "INSERT INTO `commande` (`id_commande`, `nom_client`, `nom_plat`) VALUES (NULL, '$nom','$element');";
                $conn->query($sql);
            }
            unset($_SESSION['offline']);
        }
        */
            echo '<table>';
            echo '<tr>';
            echo '<td>Image</td>';
            echo '<td>Plat</td>';
            echo '<td>Prix</td>';
            echo '<td>Quantité</td>';
            echo '</tr>';
            foreach($orders as $commande) {
                echo '<tr>';
                    echo '<td></td>';
                    echo '<td>' . $commande->nom_plat . '</td>';
                    echo '<td></td>';
                    echo '<td>' . $commande->quantite . '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '<br/>';

    /* else {
        if (isset($_SESSION['offline'])) {
            $montableau = $_SESSION['offline'];
            foreach ($montableau as $element) {
                echo $element . '<br>';
            }
        }
    }*/
    ?>
</body>

</html>