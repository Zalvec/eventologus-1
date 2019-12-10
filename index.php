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
    <h2 class="maintitle">Uitgelicht</h2>
    <section class="contcontainer">
        <section class="undertitle">
        <?php
            $template = LoadTemplate("uitgelicht");
            $data = GetData("select eve_id, eve_naam, eve_image, eve_minprijs, eve_maxprijs, eve_begindatum, eve_einddatum, loc_gebouw, pos_gemeente, cat_naam, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                                    inner join postcode p on l.loc_pos_id = p.pos_id
                                    inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                    inner join categorie c on ce.cev_cat_id = c.cat_id");
            ReplaceContent($data,$template);
        ?>
        </section>
    </section>
    <h2 class="maintitle">Categorieën</h2>
    <section class="contcontainer">
        <?php
        $data1 = GetData("select eve_id, eve_naam, eve_image, eve_minprijs, eve_maxprijs, eve_begindatum, eve_einddatum, loc_gebouw, pos_gemeente, cat_naam, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                                    inner join postcode p on l.loc_pos_id = p.pos_id
                                    inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                    inner join categorie c on ce.cev_cat_id = c.cat_id
                                    limit 1");
        $template = LoadTemplate("titel");
        ReplaceContent($data1,$template);
        ?>
        <section class="undertitle">
        <?php
            $template = LoadTemplate("categorie");
            ReplaceContent($data,$template);
        ?>
        </section>
    </section>
</main>

<?php
print LoadTemplate("basic_footer");
