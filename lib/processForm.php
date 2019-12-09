<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

// empty strings needed to be able to use variables
//$msg = "";
//$css_class = "";

if ($formname == "eve_form" AND $_POST['aanmaakbutton'] == "Aanmaken") {
    $sql = "INSERT INTO $tablename SET " .
        "eve_naam='" . $_POST['eve_naam'] . "' , " .
        "eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
        "eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
        "eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
        "eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
        "eve_opening='" . $_POST['eve_opening'] . "' , " .
        "eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
        "eve_beschrijving='" . $_POST['eve_beschrijving'] . "' ; " .
        "INSERT INTO locatie SET " .
        "loc_gebouw='" . $_POST['loc_gebouw'] . "' , " .
        "loc_straat='" . $_POST['loc_straat'] . "' , " .
        "loc_nr='" . $_POST['loc_nr'] . "';" ;

    //timestamp toegevoegd zodat elke image uniek is
    $eventImageName = time() . ' ' . $_FILES['eventImage']['name'];

    $target = 'images/' . $eventImageName;

    if (move_uploaded_file($_FILES['eventImage']['tmp_name'], $target)) {
        //insert into database
        $sql .= "INSERT INTO $tablename (eve_image) VALUES ('$eventImageName')";
}

echo $sql;

//if (isset($_POST['eve_aanmaken'])) {
    echo "<pre>", print_r($_POST), "</pre>";
    echo "<pre>", print_r($_FILES), "</pre>";
//    echo "<pre>", print_r($_FILES['eventImage']), "</pre>";
    echo "<pre>", print_r($_FILES['eventImage']['name']), "</pre>";

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
}