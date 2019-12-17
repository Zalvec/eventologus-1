<?php
require_once "autoload_lib.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];
//Als de gegevens uit het juiste formulier komen
if ( $buttonvalue == "Log in" )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);

    //Als er een user is met deze gegevens, passwoord controleren
    if ( count($data) == 1 )
    {
        $row = $data[0];
        //Wachtwoord controleren en indien dit ok is de variabele 'true' geven
        if ( password_verify( $_POST['use_wachtwoord'], $row['use_wachtwoord'] ) ) $login_ok = true;
    }

    //Afhankelijk van of het wachtwoord juist is wordt een message weergegeven
    if ( $login_ok )
    {
        $_SESSION['user'] = $row;
        $_SESSION['msg'] = "Welkom ". $_SESSION['user']['use_voornaam']."!";
        session_start();
        header('Location: ../beheer.php');
    }
    else
    {
        $_SESSION['msg'] = "Sorry! Verkeerde login of wachtwoord!";
        header('Location: ../login.php');
    }
}
?>