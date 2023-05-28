<?php
    session_start();
if(!isset($_SESSION['isConnected'])){
    $_SESSION['isConnected']=false;
}
if (!isset($_SESSION['panierOffLine'])) {
    $_SESSION['panierOffLine'] = array();
}
?>