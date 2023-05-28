<?php

    include_once("../model/apiaccess.model.php");

    $json = $apiclient->getAllPlat();
    
    include("../view/carte.view.php");
?>