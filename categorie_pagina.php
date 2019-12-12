<?php

require_once "lib/autoload.php";
ShowMessages();
BasicHead();
if (!isset($_SESSION["user"])) {
    print LoadTemplate("basic_header");
} else {
    print LoadTemplate("user_header");
}
?>

<main class="container">
    <h2 class="maintitle">Uitgelicht</h2>
    <section class="contcontainer">
        <section class="undertitle">

<?php
foreach ($_GET as $key => $value){

}
if ($key !=""){
    $id = "where cev_cat_id = '".$key."' ";
} else{
    $id = "";
}

$sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from categorie
        inner join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id
        inner join evenement e on ce.cev_eve_id = e.eve_id
        inner join locatie l on e.eve_loc_id = l.loc_id
        inner join postcode p on l.loc_pos_id = p.pos_id
        ".$id."";

$data = GetData($sql);

$template = LoadTemplate('categorie');

ReplaceContent($data, $template);