<?php
include("../../controller/utils/sessionCheck.ctrl.php");

if(isset($_POST['plat'])){
    $_SESSION['currentDish'] = $_POST['plat'];
}
?>