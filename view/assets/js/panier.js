function retrait(nom, taille, quantite) {
    quantite = - 1;
    appelle(nom, taille, quantite);
}

function ajout(nom, taille, quantite) {
    quantite = 1;
    console.log(quantite);
    appelle(nom, taille, quantite);
}

function appelle(nom, taille, quantite) {
    fetch("../controller/editPanier.ctrl.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "nom=" + encodeURIComponent(nom) + "&taille=" + encodeURIComponent(taille) + "&quantite=" + encodeURIComponent(quantite)
    })
        .then(function (response) {
            console.log(response);
            if (response.ok) {
                window.location.href = "../controller/panier.ctrl.php";
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}