<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/panier.css" />
    <script src="../view/assets/js/panier.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?php include('nav.php'); ?>

<body style="background-image: url('../view/assets/img/fond.png');">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <?php
    $total = [];
    ?>
    <table>
        <caption>Votre panier</caption>
        <thead>
            <th scope="col">Image</th>
            <th scope="col">Plat</th>
            <th scope="col">Prix unitaire</th>
            <th scope="col">Quantité</th>
        </thead>
        <tbody>
            <?php foreach ($orders as $commande) { ?>
                <tr>
                    <th scope="row"> <?php foreach ($json->data as $subarray) {
                                            foreach ($subarray->items as $plat) {
                                                if ($plat->name_fr == $commande->nom_plat) {
                                                    $img = $plat->images[0];
                                                    if ($img != NULL) {
                                                        if (getimagesize($img)) {
                                        ?><img src="<?= $img; ?>" style="width:40%">
                                        <?php
                                                        } else {
                                                            $img = $plat->images[1];
                                        ?><img src="<?= $img; ?>" style="width:40%">
                        <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                        ?></th>
                    <td> <?= "$commande->nom_plat" ?></td>
                    <td><?php foreach ($json->data as $subarray) {
                            foreach ($subarray->items as $plat) {
                                if ($plat->name_fr == $commande->nom_plat) {
                                    foreach ($plat->prices as $prix) {
                                        if ($commande->taille == $prix->size) {
                                            $sous = $prix->price;
                                            $tot = $sous * $commande->quantite;
                                            array_push($total, $tot);
                                            echo "$sous";
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </td>
                    <td class="quantite"> <button onclick="retrait(<?= "'" . urlencode($commande->nom_plat) . "'" ?> , <?= "'" . urlencode($commande->taille) . "'" ?>, <?= urlencode($commande->quantite)?>)" >-</button> <?= "$commande->quantite" ?> <button onclick="ajout(<?= "'" . urlencode($commande->nom_plat) . "'" ?> , <?= "'" . urlencode($commande->taille) . "'" ?>, <?= urlencode($commande->quantite)?>)">+</button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    $payer = 0;
    for ($i = 0; $i <= count($total); $i++) {
        $payer = $payer + $total[$i];
    }

    ?>
    <div class="total">
        <b>Total à payer :</b>
        <?php echo "$payer €"; ?>
    </div>

    <form class="form" method="POST" action="<?php echo ($_SESSION['isConnected']) ? "../controller/panier.ctrl.php" : '../controller/connection.ctrl.php'; ?>">
        <input type="submit" class="payer" name="payer" value="Payer">
    </form>

</body>

<?php include('footer.php'); ?>

</html>