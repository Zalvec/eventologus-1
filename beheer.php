<?php
require_once "lib/autoload.php";

?>
<main class="container">
    <h2 class="maintitle">Uw evenementen</h2>
    <section class="contcontainer">
        <section class="undertitle">
            <?php
            $sql = "select * from evenement
                    inner join user u on evenement.eve_use_id = u.use_id
                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                    inner join postcode p on l.loc_pos_id = p.pos_id
                    where use_email = '". $_SESSION["user"]["use_email"]."'
                    order by eve_begindatum";

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
        print LoadTemplate("eve_aanmaken_1");
        ?>
        <select name="loc_pos_id" id='loc_pos_id' required>
            <?php
            $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
            $data_pos = GetData($sql);
            ?>
            <option value='' disabled selected>Selecteer de postcode..</option>
            <?php
            foreach ($data_pos as $array){
                $option = "$array[pos_code], $array[pos_gemeente]";
                echo "<option value='$array[pos_id]'>$option</option>";}
            ?>
        </select>
        <?php
        print LoadTemplate("eve_aanmaken_2");
        ?>
    <select name="cev_cat_id" id='cev_cat_id' required>
        <?php
        $sql = "select * from categorie order by cat_naam";
        $data_cat = GetData($sql);
        ?>
        <option value='' disabled selected>Selecteer de categorie..</option>
        <?php
        foreach ($data_cat as $array){
            $option = "$array[cat_naam]";
            echo "<option value='$array[cat_id]'>$option</option>";}
        ?>
    </select>
    <?php
    print LoadTemplate("eve_aanmaken_3");
    ?>




</main>
<?php print LoadTemplate("basic_footer"); ?>
</html>
