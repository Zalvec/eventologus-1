<?php
require_once "lib/autoload.php";
ShowMessages();
BasicHead();
if (!isset($_SESSION["user"])){
    print LoadTemplate("basic_header");
} else{
    print LoadTemplate("user_header");
}
foreach ($_GET as $key => $value){
}

?>

<main class="container">
    <?php
        $eve_user = "select * from evenement
            inner join user u on evenement.eve_use_id = u.use_id
            inner join locatie l on evenement.eve_loc_id = l.loc_id
            inner join postcode p on l.loc_pos_id = p.pos_id
            where eve_id = '". $key."'";
        $data = GetData($eve_user);
        $template = LoadTemplate('eve_wijzigen_1');
        ReplaceContent($data, $template);
    ?>
    <select name="loc_pos_id" id='loc_pos_id'>
        <?php
        $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
        $data_pos = GetData($sql);
        foreach ($data_pos as $array){
            $option = "$array[pos_code], $array[pos_gemeente]";
            echo "<option value='$array[pos_id]'>$option</option>";}
        ?>
    </select>
    <?php
    $template = LoadTemplate('eve_wijzigen_2');
    ReplaceContent($data, $template);
    print LoadTemplate("basic_footer");
    ?>
</main>
