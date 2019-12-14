<?php

    require_once "lib/autoload.php";

    //Als GET leeg is wordt er geen specifieke categorie aangeroepen, als dat wel zo is moet er een where statement bij de SQL komen
    if (empty($_GET)){
        $where = "";
    } else {
        foreach ($_GET as $id => $niks){
        }
        $where = "where cev_cat_id = ".$id;
    }
    $sql = "select * from categorie
            left join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id
            group by cat_naam
            order by cat_id";
    //Navigatie categorieën printen
    print ReplaceALLContent("catnav_item", "catnav", $sql);

    //Als $where leeg is is er geen specifieke categoriepagina geladen, dus kunnen alle evenementen geladen worden
    if (empty($where)){
        $data = array();
        $data['cat_naam'] = 'Alle';
        $templateTitel = LoadTemplate('titel');
        print ReplaceContentRow($data, $templateTitel);
    //Anders worden enkel de evenementen van deze categorie geladen
    } else {
        $data = GetData("select * from categorie 
                            inner join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id ".$where." limit 1");
        $templateTitel = LoadTemplate('titel');
        print ReplaceContent($data,$templateTitel);
    }

    $sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format  from evenement
                            inner join locatie l on evenement.eve_loc_id = l.loc_id
                            inner join postcode p on l.loc_pos_id = p.pos_id
                            inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                            inner join categorie c on ce.cev_cat_id = c.cat_id ".$where.
                            " order by eve_minprijs";
    print ReplaceALLContent("categorie", "undertitle", $sql);

    print LoadTemplate("basic_footer");

?>