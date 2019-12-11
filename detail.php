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
    <section class="contcontainer contdetail">

            <?php

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
            ReplaceContent($data, $template );

            ?>

        <div class="social">

            <?php

            $sql = "select som_name, som_icoon, hyp_link from hyperlink
                    inner join socialmedia s on hyperlink.hyp_som_id = s.som_id
                    inner join evenement e on hyperlink.hyp_eve_id = e.eve_id
                    where eve_id = $id";
            $data = GetData($sql);

            $sql_som = "select som_name from socialmedia";
            $som = GetData($sql_som);
            $som_name = array();
            foreach ($som as $niks=>$array){
                $som_name[]= $array['som_name'];
            }
            foreach ($data as $row) {
                if (in_array($row['som_name'], $som_name)) {
                    $icoon = $row['som_icoon'];
                    $link = 'https://'.$row['hyp_link'];
                    print "<a href='".$link."' class='".$icoon."'></a>";
                }
            }

            ?>
        </div>
        </div>
        </div>
    </section>
</main>

<?php
print LoadTemplate("basic_footer");
