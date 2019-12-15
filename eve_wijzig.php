<?php

    require_once "lib/autoload.php";

    //ID van evenement uit GET halen
    foreach ($_GET as $key => $value){
    }
    //Details van evenement uit databank halen en al invullen in alle velden
    $eve_user = "select * from evenement
        inner join user u on evenement.eve_use_id = u.use_id
        inner join locatie l on evenement.eve_loc_id = l.loc_id
        inner join postcode p on l.loc_pos_id = p.pos_id
        where eve_id = '". $key."'";
    $data = GetData($eve_user);
    $template = LoadTemplate('eve_wijzigen');
    $template = ReplaceContent($data, $template);

    //Alle data uit postcode tabel in een select steken, de id van de geselecteerde gemeente wordt doorgegeven
    $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
    $content = ReplaceALLContent("wijzigen_option_pos", "wijzigen_pos", GetData($sql));
    $data1 = array("content" => $content);
    print ReplaceContentRow($data1, $template);


    print LoadTemplate("basic_footer");

?>
