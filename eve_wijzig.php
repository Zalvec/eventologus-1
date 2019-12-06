<?php
require_once "lib/autoload.php";
BasicHead();
/*if (!isset($_SESSION["user"])){
    print LoadTemplate("basic_header");
} else{
    print LoadTemplate("user_header");
}
*/?><!--

<main class="container">-->
            <?php
                $template = LoadTemplate("eve_wijzigen");
                $eve_user = "select * from evenement
                    inner join user u on evenement.eve_use_id = u.use_id
                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                    inner join postcode p on l.loc_pos_id = p.pos_id
                    where use_email = '". $_SESSION["user"]["use_email"]."'";
            $data = GetData($eve_user);

            ?>
<!--
    <?php /*print LoadTemplate("basic_footer"); */?>
</main>-->
