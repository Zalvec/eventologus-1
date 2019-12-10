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
    <section class="contcontainer">
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

            $sql = "select * from hyperlink
                    inner join socialmedia s on hyperlink.hyp_som_id = s.som_id
                    inner join evenement e on hyperlink.hyp_eve_id = e.eve_id
                    where eve_id = $id";
            $data = GetData($sql);
            foreach ($data as $row) {
                if ($row['som_name'] == 'facebook') {
                    $icoonfb = "fab fa-facebook-square fa-3x";
                    $linkfb = $row['hyp_link'];
                    $facebook = true;
                }
                if ($row['som_name'] == 'twitter') {
                    $icoontw = "fab fa-twitter-square fa-3x";
                    $linktw = $row['hyp_link'];
                    $twitter = true;
                }
                if ($row['som_name'] == 'instagram') {
                    $icoonig = "fab fa-instagram fa-3x";
                    $linkig = $row['hyp_link'];
                    $instagram = true;
                }
                if ($row['som_name'] == 'youtube') {
                    $icoonyt = "fab fa-youtube-square fa-3x";
                    $linkyt = $row['hyp_link'];
                    $youtube = true;
                }
                if ($row['som_name'] == 'tickets') {
                    $icoontick = "fas fa-ticket-alt fa-3x";
                    $linktick = 'https://'.$row['hyp_link'];
                    $tickets = true;
                }
            }
            ?>
            <div class="social">
            <?php
            if ($facebook) print "<a href='".$linkfb."' class='".$icoonfb."'></a>";
            if ($twitter) print "<a href='".$linktw."' class='".$icoontw."'></a>";
            if ($instagram) print "<a href='".$linkig."' class='".$icoonig."'></a>";
            if ($youtube) print "<a href='".$linkyt."' class='".$icoonyt."'></a>";
            if ($tickets) print "<a href='".$linktick."' class='".$icoontick."'></a>";
            ?>
            </div>
            </div>
            </div>
    </section>
</main>

<?php
print LoadTemplate("basic_footer");
