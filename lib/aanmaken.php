<?php
require_once "autoload.php";

include "lib/pdo.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];


// empty strings needed to be able to use variables
//$msg = "";
//$css_class = "";

if ($formname == "eve_form" AND $_POST['aanmaakbutton'] == "Aanmaken") {
    $image = $_FILES['eve_image'];
    $imagename = time().'_'.$image['name'];
    $target = '../images/'.$imagename;

    move_uploaded_file($image['tmp_name'], $target);

    print $imagename;
    $sql_loc = "INSERT INTO locatie SET " .
        "loc_gebouw='" . $_POST['loc_gebouw'] . "' , " .
        "loc_straat='" . $_POST['loc_straat'] . "' , " .
        "loc_nr='" . $_POST['loc_nr'] . "';" .
        "loc_pos_id='" . $_POST['loc_pos_id'] . "';";

    $sql = "select last_insert_id() laatste_id";


    $sql_eve = "INSERT INTO $tablename SET " .
        "eve_naam='" . $_POST['eve_naam'] . "' , " .
        "eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
        "eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
        "eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
        "eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
        "eve_opening='" . $_POST['eve_opening'] . "' , " .
        "eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
        "eve_image='" . $imagename . "' , " .
        "eve_beschrijving='" . $_POST['eve_beschrijving'] . "' ; ";
    var_dump(GetData($sql_loc));
    var_dump(GetData($sql));
    var_dump(GetData($sql_eve));
}


