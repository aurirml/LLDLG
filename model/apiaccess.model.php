<?php
$apiclient = new Apiclient();

class apiclient{

    private $url = "http://test.api.catering.bluecodegames.com/menu";

    function getAllPlat(){
        $postdata = json_encode(
            array(
                'id_shop' => 1 
            )
        );
    
        $opts = array(
            'http' => array(
                'method' => "POST",
                'header' => "Content-Type:application/json",
                'content' => $postdata
            )
        );
    
        $context = stream_context_create($opts);
    
        // Accès à un fichier HTTP avec les entêtes HTTP indiqués ci-dessus
        $file = file_get_contents($this->url, false, $context);
        $json = json_decode($file);

        return $json;
    }

}
    ?>
    