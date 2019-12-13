<?php
require_once "lib/autoload.php";
if( !isset($_SESSION['user'])){
    print LoadTemplate("login");
    print LoadTemplate("basic_footer");
} else{
    $msg =  "Je bent al ingelogd.";
    header("Location: beheer.php");
}
