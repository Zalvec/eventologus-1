<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename_loc = $_POST["tablename_loc"];
$tablename_eve = $_POST["tablename_eve"];
$pkey = $_POST["pkey"];

var_dump($_POST);

if ( $formname == "eve_wijzig_form" )
{
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM user WHERE use_email='" . $_POST['eve_id'] . "' ";
    $data = GetData($sql);

    $sql_eve = "UPDATE $tablename_eve SET " .
        " eve_naam='" . htmlentities($_POST['eve_naam'], ENT_QUOTES) . "' , " .
        " eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
        " eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
        " eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
        " eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
        " eve_opening='" . $_POST['eve_opening'] . "' , " .
        " eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
        " eve_beschrijving='" . $_POST['eve_beschrijving'] . "' 
        where eve_id='" . $_POST['eve_id'] . "'";

    $sql_loc = "UPDATE $tablename_loc SET " .
        " loc_straat='" . $_POST['loc_straat']. "' , " .
        " loc_nr='" . $_POST['loc_nr'] . "' , " .
        " loc_pos_id='" . $_POST['loc_pos_id'] . "' , " .
        " loc_gebouw='" . $_POST['loc_gebouw'] . "' 
        where eve_id='" . $_POST['loc_id'] . "'";

    print $sql_eve;
    print $sql_loc;

    if ( ExecuteSQL($sql) ){
        $_SESSION['msg'] = 'Uw evenement is gewijzigd!' ;
        //echo "<meta http-equiv='refresh' content='1;../index.php'>";
        header('Location: ../index.php');
        }
    else {
        $_SESSION['msg'] = "Sorry, er liep iets fout. De gegevens werden niet goed opgeslagen" ;
        header('Location: ../index.php');
    }
}
?>