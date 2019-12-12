<?php
require_once "lib/autoload.php";


?>
<main class="container">
    <ul class="categorieën_list">
        <li><a href="categorie.php">Alle</a></li>
    <?php
    if (empty($_GET)){
        $where = "";
    } else {
        foreach ($_GET as $id => $niks){
        }
        $where = "where cev_cat_id = ".$id;
    }
    $sql = "select * from categorie
            left join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id
            group by cat_naam
            order by cat_id";
    $data = GetData($sql);
    $template =  LoadTemplate("catnav");
    ReplaceContent($data, $template);
?>
    </ul>
    <section class="contcontainer">
        <?php
        if (empty($where)){
            $data = array();
            $data['cat_naam'] = 'Alle';
            $templateTitel = LoadTemplate('titel');
            ReplaceContentRow($data, $templateTitel);
        } else{
            $data = GetData("select * from categorie 
                            inner join categorie_evenement ce on categorie.cat_id = ce.cev_cat_id ".$where." limit 1");
            $templateTitel = LoadTemplate('titel');
            ReplaceContent($data,$templateTitel);
        }

        ?>
        <section class="undertitle">
            <?php
            $template = LoadTemplate("categorie");
            $data = GetData("select *, date_format(eve_begindatum, \"%e %b %Y\") begin_format, date_format(eve_einddatum, \"%e %b %Y\") eind_format  from evenement
                                    inner join locatie l on evenement.eve_loc_id = l.loc_id
                                    inner join postcode p on l.loc_pos_id = p.pos_id
                                    inner join categorie_evenement ce on evenement.eve_id = ce.cev_eve_id
                                    inner join categorie c on ce.cev_cat_id = c.cat_id ".$where);
            ReplaceContent($data,$template);
            ?>
        </section>
    </section>

</main>
<?php print LoadTemplate("basic_footer"); ?>