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
        $eve_user = "select * from evenement
            inner join user u on evenement.eve_use_id = u.use_id
            inner join locatie l on evenement.eve_loc_id = l.loc_id
            inner join postcode p on l.loc_pos_id = p.pos_id
            where use_email = '". $_SESSION["user"]["use_email"]."'";
        print LoadTemplate('eve_wijzigen_1');
    ?>
    <select name="loc_pos_id" id='loc_pos_id'>
        <?php
        $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
        $data = GetData($sql);
        foreach ($data as $array){
            $option = "$array[pos_code], $array[pos_gemeente]";
            echo "<option value='$array[pos_id]'>$option</option>";}
        ?>
    </select>
    <?php
    print LoadTemplate('eve_wijzigen_2');
    print LoadTemplate("basic_footer");
    ?>
</main>
