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
    <h2 class="maintitle">Uw evenementen??</h2>
    <section class="contcontainer">
        <section class="undertitle">
            <?php
            $sql = "select * from evenement
                    inner join user u on evenement.eve_use_id = u.use_id
                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                    inner join postcode p on l.loc_pos_id = p.pos_id
                    where use_email = '". $_SESSION["user"]["use_email"]."'";
            $data = GetData($sql);
            $template = LoadTemplate("eve_uwevenementen");
            if (!empty($data)){
                ReplaceContent($data, $template);
            } else {
                print "<h2 class='geen_eve maintitle'> U heeft geen evenementen. </h2>";
            }
            ?>
        </section>
    </section>
    <?php
    print LoadTemplate("eve_aanmaken");
    ?>
</main>
<?php print LoadTemplate("basic_footer"); ?>
</html>
