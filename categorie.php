<?php
require_once "lib/autoload.php";
ShowMessages();
BasicHead();
if (!isset($_SESSION["user"])){
    print LoadTemplate("basic_header");
} else{
    print LoadTemplate("user_header");
}
?>
<main class="container">
    <ul class="categorieën_list">
        <li><a href="categorie_pagina.php">Alle</a></li>
    <?php
    $sql = "select * from categorie
            left join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id
            group by cat_naam
            order by cat_id";
    $data = GetData($sql);
    $template =  LoadTemplate("catnav");
    ReplaceContent($data, $template);
?>
    </ul>
    <section class="contcontainer">
        <section class="undertitle">
            <?php
            $template = LoadTemplate("uitgelicht");
            $data = GetData("select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format  from evenement
                                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                                    inner join postcode p on l.loc_pos_id = p.pos_id
                                    inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                    inner join categorie c on ce.cev_cat_id = c.cat_id");
            ReplaceContent($data,$template);
            ?>
        </section>
    </section>

</main>
<?php print LoadTemplate("basic_footer"); ?>