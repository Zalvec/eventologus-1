<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Registreer" )
{
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);
    if ( count($data) > 0 ) die("Deze gebruiker bestaat reeds! Gelieve een andere login te gebruiken.");

    //controle wachtwoord minimaal 8 tekens
    if ( strlen($_POST["use_wachtwoord"]) < 8 ) die("Uw wachtwoord moet minstens 8 tekens bevatten!");

    //controle geldig e-mailadres
    if (!filter_var($_POST["use_email"], FILTER_VALIDATE_EMAIL)) die("Ongeldig email formaat voor login");

    //wachtwoord coderen
    $password_encrypted = password_hash ( $_POST["use_wachtwoord"] , PASSWORD_DEFAULT );

    $sql = "INSERT INTO $tablename SET " .
        " use_organisator='" . htmlentities($_POST['use_organisator'], ENT_QUOTES) . "' , " .
        " use_voornaam='" . $_POST['use_voornaam'] . "' , " .
        " use_achternaam='" . $_POST['use_achternaam'] . "' , " .
        " use_email='" . $_POST['use_email'] . "' , " .
        " use_geboortedatum='" . $_POST['use_geboortedatum'] . "' , " .
        " use_wachtwoord='" . $password_encrypted . "'  " ;

    if ( ExecuteSQL($sql) ){ print "Bedankt voor uw registratie!" ;
    echo "<meta http-equiv='refresh' content='2;../index.php'>";}
    else print "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen" ;
}
?>