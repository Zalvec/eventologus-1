<?php
require_once "lib/autoload.php";
BasicHead();
if (!isset($_SESSION["user"])){
    print LoadTemplate("basic_header");
} else{
    print LoadTemplate("user_header");
}
?>
<main class="container">
    <?php
print LoadTemplate("catnav");
?>
    <section class="contcontainer">
        <section class="undertitle">
            <?php
            $template = LoadTemplate("uitgelicht");
            $data = GetData("select eve_naam, eve_image, eve_minprijs, eve_maxprijs, eve_begindatum, eve_einddatum, loc_gebouw, pos_gemeente, cat_naam from evenement
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