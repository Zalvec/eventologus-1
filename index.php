<?php
    require_once "lib/autoload.php";

    print "<h2 class=\"maintitle\">Uitgelicht</h2>";

    $sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
        inner join locatie l on evenement.eve_loc_id = l.loc_id
        inner join postcode p on l.loc_pos_id = p.pos_id
        inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
        inner join categorie c on ce.cev_cat_id = c.cat_id
        order by RAND()
        limit 3";
    ReplaceALLContent("uitgelicht", "undertitle", $sql);

    print LoadTemplate('window');

    print "<h2 class=\"maintitle\">Categorieën</h2>";

    $categorie = ["Conventies", "Festivals"];
    foreach ($categorie as $value) {
        $data1 = GetData("select cat_naam from evenement
                                inner join locatie l on evenement.eve_loc_id = l.loc_id
                                inner join postcode p on l.loc_pos_id = p.pos_id
                                inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                inner join categorie c on ce.cev_cat_id = c.cat_id
                                where cat_naam = '" . $value ."'
                                order by cat_naam
                                limit 1");
        $cat_naam = $data1[0]['cat_naam'];
        $template = LoadTemplate("titel");
        print ReplaceContent($data1,$template);

        $template = LoadTemplate("categorie");
        $sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                inner join locatie l on evenement.eve_loc_id = l.loc_id
                inner join postcode p on l.loc_pos_id = p.pos_id
                inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                inner join categorie c on ce.cev_cat_id = c.cat_id
                where cat_naam = '".$cat_naam."' 
                limit 3";
        ReplaceALLContent("categorie", "undertitle", $sql);
    }

    print LoadTemplate("basic_footer");
?>
