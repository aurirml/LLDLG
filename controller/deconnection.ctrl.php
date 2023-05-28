<?php
include("../controller/utils/sessionCheck.ctrl.php");
$_SESSION['isConnected']=false;

header("Location: ../index.php");
?>