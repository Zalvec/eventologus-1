<?php

    require_once "lib/autoload.php";

    print "<h2 class=\"maintitle\">Uw evenementen</h2>";

    $sql = "select * from evenement
            inner join user u on evenement.eve_use_id = u.use_id
            inner join locatie l on evenement.eve_loc_id = l.loc_id
            inner join postcode p on l.loc_pos_id = p.pos_id
            where use_email = '". $_SESSION["user"]["use_email"]."'";
    $data = GetData($sql);

    $template = LoadTemplate("eve_uwevenementen");
    if (!empty($data)){
        $content = ReplaceContent($data, $template);
    } else {
        $content = "<h2 class='geen_eve maintitle'> U heeft geen evenementen. </h2>";
    };

    $data = array("content" => $content);
    $template =  LoadTemplate("undertitle");

    print ReplaceContentRow($data, $template);

    print LoadTemplate("eve_aanmaken");

    print LoadTemplate("basic_footer");

?>
