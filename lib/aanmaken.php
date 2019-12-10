<?php
require_once "autoload.php";

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
    $sql = "INSERT INTO $tablename SET " .
        "eve_naam='" . $_POST['eve_naam'] . "' , " .
        "eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
        "eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
        "eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
        "eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
        "eve_opening='" . $_POST['eve_opening'] . "' , " .
        "eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
        "eve_image='" . $imagename . "' , " .
        "eve_beschrijving='" . $_POST['eve_beschrijving'] . "' ; " .
        "INSERT INTO locatie SET " .
        "loc_gebouw='" . $_POST['loc_gebouw'] . "' , " .
        "loc_straat='" . $_POST['loc_straat'] . "' , " .
        "loc_nr='" . $_POST['loc_nr'] . "';";
}




//if (isset($_POST['eve_aanmaken'])) {

//    echo "<pre>", print_r($_FILES['eventImage']), "</pre>";

        //melding bij succes of fout upload
//        if (mysqli_query($conn, $sql)) {
//            $msg = "Image uploaded and saved to database";
//            $css_class = "alert-success";
//        } else {
//            $msg = "Database Error: Failed to save user";
//            $css_class = "alert-danger";
//        }
//
//    }
//    else {
//        $msg = "Failed to upload";
//        $css_class = "alert-danger";
//    }
