<?php
require_once "autoload_lib.php";

$form_name = $_POST['formname'];
$button = $_POST['submit'];

$naam = "'".$_POST['naam']."'";
$voornaam = "'".$_POST['voornaam']."'";
$email = "'".$_POST['email']."'";
$vraag = "'".$_POST['vraag']."'";

if ($form_name == 'contact_form' AND $button == 'submit'){
    $sql = "INSERT INTO contact (con_naam, con_voornaam, con_email, con_vraag) VALUES
            ($naam, $voornaam, $email, $vraag)";
    if (ExecuteSQL($sql)){
        $_SESSION['msg'] = 'Bedankt voor uw vraag, wij beantwoorden deze zo snel mogelijk!';
        header('Location: ../index.php');
    } else{
        $_SESSION['msg'] = 'Er ging iets fout bij het verwerken van uw vraag, probeer opnieuw.';
        header('Location: ../contact.php');
    }
}


