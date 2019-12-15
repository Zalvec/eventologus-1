<?php
    require_once "lib/autoload.php";
?>
    <!-- Content moet in deze section staan voor layout -->
    <section class="contcontainer contdetail">

            <?php

                // Replace content voor de beschrijving en foto
                foreach ($_GET as $id => $niks){
                };
                $sql = "select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format from evenement
                        inner join locatie l on evenement.eve_loc_id = l.loc_id
                        inner join postcode p on l.loc_pos_id = p.pos_id
                        inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                        inner join categorie c on ce.cev_cat_id = c.cat_id
                        where eve_id = $id";
                $data = GetData($sql);
                $template = LoadTemplate('detail');
                print ReplaceContent($data, $template );

                //Load template voor social buttons, template bevat ook een beetje php
                include LoadTemplate("detail_social");

            ?>

        </div>
        </div>
    </section>

<?php

    print LoadTemplate("basic_footer");

?>
