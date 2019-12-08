<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];
if ( $buttonvalue == "Log in" )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);
    if ( count($data) == 1 )
    {
        $row = $data[0];
        //password controleren
        if ( password_verify( $_POST['use_wachtwoord'], $row['use_wachtwoord'] ) ) $login_ok = true;
    }

    if ( $login_ok )
    {
        $_SESSION['msg'] = "Welkom, U bent ingelogd!";
        session_start();
        header('Location: ../index.php');
        $_SESSION['user'] = $row;
    }
    else
    {
        $_SESSION['msg'] = "Sorry! Verkeerde login of wachtwoord!";
        header('Location: ../index.php');
    }
}
?>