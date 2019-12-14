<?php
require_once "autoload_lib.php";

$formname = $_POST["formname"];
$tablename_loc = $_POST["tablename_loc"];
$tablename_eve = $_POST["tablename_eve"];
$pkey = $_POST["pkey"];


if ( $formname == "eve_wijzig_form" )
{
    var_dump($_FILES);
    $image = $_FILES['eve_image'];
    $imagename = time().'_'.$image['name'];
    $target = '../images/'.$imagename;

    move_uploaded_file($image['tmp_name'], $target);

    $sql_eve = "UPDATE $tablename_eve SET " .
        " eve_naam='" . htmlentities($_POST['eve_naam'], ENT_QUOTES) . "' , " .
        " eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
        " eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
        " eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
        " eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
        " eve_opening='" . $_POST['eve_opening'] . "' , " .
        " eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
        "eve_image='" . $imagename . "' , " .
        " eve_beschrijving='" . $_POST['eve_beschrijving'] . "' 
        where eve_id='" . $_POST['eve_id'] . "'";

    $sql_loc = "UPDATE $tablename_loc, $tablename_eve SET " .
        " loc_straat='" . $_POST['loc_straat']. "' , " .
        " loc_nr='" . $_POST['loc_nr'] . "' , " .
        " loc_pos_id='" . $_POST['loc_pos_id'] . "' , " .
        " loc_gebouw='" . $_POST['loc_gebouw'] . "' 
        where eve_id='" . $_POST['loc_id'] . "'";


    if ( ExecuteSQL($sql_eve) and ExecuteSQL($sql_loc)){
        $_SESSION['msg'] = 'Uw evenement is gewijzigd!' ;
        //echo "<meta http-equiv='refresh' content='1;../index.php'>";
        //header('Location: ../beheer.php');
        }
    else {
        $_SESSION['msg'] = "Sorry, er liep iets fout. De gegevens werden niet goed opgeslagen" ;
        //header('Location: ../beheer.php');
    }
}
?>