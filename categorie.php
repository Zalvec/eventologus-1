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
print LoadTemplate("catnav");

print LoadTemplate("categorie");

    ?>
</main>
<?php print LoadTemplate("basic_footer"); ?>