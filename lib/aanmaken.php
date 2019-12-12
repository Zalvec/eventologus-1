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

    $sql_loc = "INSERT INTO locatie SET " .
        "loc_gebouw='" . $_POST['loc_gebouw'] . "' , " .
        "loc_straat='" . $_POST['loc_straat'] . "' , " .
        "loc_nr='" . $_POST['loc_nr'] . "' ," .
        "loc_pos_id='" . $_POST["loc_pos_id"] . "';";

    $loc_id = GetData_LastID($sql_loc)['last_id'];

    Check('locatie', $loc_id, 'loc_id');

    if (empty($_POST['eve_gratis'])) {
        $sql_eve = "INSERT INTO $tablename SET " .
            "eve_naam='" . $_POST['eve_naam'] . "' , " .
            "eve_loc_id='" . $loc_id . "' , " .
            "eve_use_id='" . $_SESSION['user']["use_id"] . "' , " .
            "eve_minprijs='" . $_POST['eve_minprijs'] . "' , " .
            "eve_maxprijs='" . $_POST['eve_maxprijs'] . "' , " .
            "eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
            "eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
            "eve_opening='" . $_POST['eve_opening'] . "' , " .
            "eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
            "eve_image='" . $imagename . "' , " .
            "eve_beschrijving='" . $_POST['eve_beschrijving'] . "' ";
    } else {
        $sql_eve = "INSERT INTO $tablename SET " .
            "eve_naam='" . $_POST['eve_naam'] . "' , " .
            "eve_loc_id='" . $loc_id . "' , " .
            "eve_use_id='" . $_SESSION['user']["use_id"] . "' , " .
            "eve_minprijs= 0 , " .
            "eve_maxprijs= 0 , " .
            "eve_gratis = '".$_POST['eve_gratis']."' ,".
            "eve_begindatum='" . $_POST['eve_begindatum'] . "' , " .
            "eve_einddatum='" . $_POST['eve_einddatum'] . "' , " .
            "eve_opening='" . $_POST['eve_opening'] . "' , " .
            "eve_sluiting='" . $_POST['eve_sluiting'] . "' , " .
            "eve_image='" . $imagename . "' , " .
            "eve_beschrijving='" . $_POST['eve_beschrijving'] . "' ";
    }

    $eve_id = GetData_LastID($sql_eve)['last_id'];

    Check($tablename ,$eve_id, 'eve_id');

    $sql_cat = "INSERT INTO categorie_evenement SET " .
        "cev_cat_id='" . $_POST["cev_cat_id"] . "' , " .
        "cev_eve_id='" . $eve_id . "';";

    $cev_id = GetData_LastID($sql_cat)['last_id'];

    Check('categorie_evenement', $cev_id, 'cev_id');

    $sql_som_name = "select som_name from socialmedia";
    $som = GetData($sql_som_name);
    $som_name = array();
    foreach ($som as $niks=>$array){
        $som_name[]= $array['som_name'];
    }

    foreach ($_POST as $key => $value){

        if (in_array($key,$som_name) and strlen($value) > 5){
            $sql_som = "SELECT som_id from socialmedia where som_name = '". $key ."'";
            $data = GetData($sql_som);
            $sql_hyp = "INSERT INTO hyperlink SET 
                        hyp_som_id = ". $data[0]['som_id']." ,
                        hyp_eve_id = ".$eve_id." ,
                        hyp_use_id = ".$_SESSION['user']['use_id'].", 
                        hyp_link = '".$value."'";
            $hyp_id = GetData_LastID($sql_hyp)['last_id'];
        }
    }

    if (!isset($_SESSION['msg'])){
        $_SESSION['msg'] = "Uw evenement is succesvol aangemaakt! U kan het bekijken en bewerken in het tabblad 'Beheer'.";
    }
    header("Location: ../beheer.php");
}


