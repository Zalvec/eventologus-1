<?php
require_once "autoload_lib.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

//Als de gegevens uit het juiste formulier komen
if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Registreer" )
{
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);
    if ( count($data) > 0 ) {
        $_SESSION['msg'] = "Deze gebruiker bestaat reeds! Gelieve een andere login te gebruiken.";
        header('Location: ../register.php');
        die();
    }
    //controle wachtwoord minimaal 8 tekens
    if ( strlen($_POST["use_wachtwoord"]) < 8 ){
        $_SESSION['msg'] = "Uw wachtwoord moet minstens 8 tekens bevatten!";
        header('Location: ../register.php');
        die();
    }

    //controle geldig e-mailadres
    if (!filter_var($_POST["use_email"], FILTER_VALIDATE_EMAIL)){
        $_SESSION['msg'] = "Ongeldig email formaat voor login";
        header('Location: ../register.php');
        die();
    }

    //wachtwoord coderen
    $password_encrypted = password_hash ( $_POST["use_wachtwoord"] , PASSWORD_DEFAULT );

    //De gegevens met het gecodeerde wachtwoord in de user tabel zetten
    $sql = "INSERT INTO $tablename SET " .
        " use_organisator='" . htmlentities($_POST['use_organisator'], ENT_QUOTES) . "' , " .
        " use_voornaam='" . $_POST['use_voornaam'] . "' , " .
        " use_achternaam='" . $_POST['use_achternaam'] . "' , " .
        " use_email='" . $_POST['use_email'] . "' , " .
        " use_geboortedatum='" . $_POST['use_geboortedatum'] . "' , " .
        " use_wachtwoord='" . $password_encrypted . "'  " ;

    //Afhankelijk van of de query goe wordt uitgevoerd message weergeven
    if ( ExecuteSQL($sql) ){
        $_SESSION['msg'] = "Bedankt voor uw registratie!" ;
        header('Location: ../index.php');
    }
    else {
        $_SESSION['msg'] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen";
        header('Location: ../register.php');
    };
}
?>