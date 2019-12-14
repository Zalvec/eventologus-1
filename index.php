<?php
require_once "lib/autoload.php";

?>
<main class="container">
    <h2 class="maintitle">Uitgelicht</h2>
    <section class="contcontainer">
        <section class="undertitle">
        <?php
            $template = LoadTemplate("uitgelicht");
            $data = GetData("select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                                    inner join postcode p on l.loc_pos_id = p.pos_id
                                    inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                    inner join categorie c on ce.cev_cat_id = c.cat_id
                                    order by RAND()
                                    limit 3");
            ReplaceContent($data,$template);
        ?>
        </section>
    </section>
    <h2 class="maintitle">Categorieën</h2>

    <?php
    $categorie = ["Conventies", "Festivals"];

    foreach ($categorie as $value) {
        echo '<section class="contcontainer">';
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
        ReplaceContent($data1,$template);
        echo '</section>';

        echo '<section class="undertitle">';

        $template = LoadTemplate("categorie");
        $data = GetData("select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                                        inner join locatie l on evenement.eve_loc_id = l.loc_id
                                        inner join postcode p on l.loc_pos_id = p.pos_id
                                        inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                        inner join categorie c on ce.cev_cat_id = c.cat_id
                                        where cat_naam = '".$cat_naam."' 
                                        order by eve_begindatum
                                        limit 3");
        ReplaceContent($data,$template);
        print "<a class='lees_meer' href='categorie?".$data[0]['cat_id']."'>Alle $value...</a>";
        echo '</section>';
    }
    ?>
</main>

<?php
print LoadTemplate("basic_footer");
