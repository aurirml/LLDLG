function plat() {
    var coll = document.getElementsByClassName("linkDetails");
    var i;
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function (e) {
            e.preventDefault();
            var dish = this.getAttribute("data-info-dish");
            fetch("../controller/utils/currentDish.ctrl.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "plat=" + encodeURIComponent(dish)
            })
                .then(function (response) {
                    if (response.ok) {
                        window.location.href= "../controller/infoplat.ctrl.php";
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    }
}