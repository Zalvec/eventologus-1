<?php
require_once "autoload_lib.php";

foreach ($_GET as $field => $value){
    $eve_id = $field;
}

$sql = 'DELETE FROM evenement where eve_id = '.$eve_id;

GetData($sql);


if (ExecuteSQL($sql)){
    $_SESSION['msg'] = 'Evenement is verwijderd!';
    header('Location: ../beheer.php');
} else{
    $_SESSION['msg'] = 'Er ging iets fout bij het verwijderen van het evenement, probeer opnieuw!';
    header('Location: ../beheer.php');
}