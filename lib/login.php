<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];
if ( $buttonvalue == "Log in" )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);
    var_dump($data);
    if ( count($data) == 1 )
    {
        $row = $data[0];
        //password controleren
        if ( password_verify( $_POST['use_wachtwoord'], $row['use_wachtwoord'] ) ) $login_ok = true;
    }

    if ( $login_ok )
    {
        print "Welkom, U bent ingelogd!";
        session_start();
        $_SESSION['user'] = $row;
        echo "<meta http-equiv='refresh' content='2;../index.php'>";
    }
    else
    {
        print "Sorry! Verkeerde login of wachtwoord!";
    }
}
?>