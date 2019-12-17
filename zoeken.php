<?php
require_once 'lib/autoload.php';

$trefwoord = $_POST['trefwoord'];

$sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format  from evenement
                            inner join locatie l on evenement.eve_loc_id = l.loc_id
                            inner join postcode p on l.loc_pos_id = p.pos_id
                            inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                            inner join categorie c on ce.cev_cat_id = c.cat_id 
                            where eve_naam like '%".$trefwoord."%' 
                            or loc_gebouw like '%".$trefwoord."%' 
                            or pos_gemeente like '%".$trefwoord."%'
                            order by eve_begindatum";

print $sql;

$data = GetData($sql);

$template = LoadTemplate('categorie');

//Geeft 'gratis' weer als de eve_minprijs 0 is, anders krijg je een tekst met de eve_minprijs in
foreach ($data as $row => $value) {
    if ($value['eve_minprijs'] == 0) {
        $data[$row]['prijs'] = "Gratis";
    } else {
        $data[$row]['prijs'] = "Tickets vanaf: €".$data[$row]['eve_minprijs']." VAT";
    }
}

print ReplaceALLContent("categorie", "undertitle", $data);

print LoadTemplate("basic_footer");