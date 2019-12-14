<?php

    //Als de gebruiker als ingelogd is heeft hij geen toegang tot de pagina
    require_once "lib/autoload_lib.php";
    if( isset($_SESSION['user'])){
        $_SESSION['msg'] =  "Je bent al ingelogd.";
        header("Location: beheer.php");
    } else{
        print LoadTemplate("login");
        print LoadTemplate("basic_footer");
    }

?>