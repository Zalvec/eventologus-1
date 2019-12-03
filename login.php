<?php
require_once "lib/autoload.php";
BasicHead();
if( !isset($_SESSION['user'])){
    print LoadTemplate("basic_header");
    print LoadTemplate("login");
    print LoadTemplate("basic_footer");
} else{
    print "Je bent al ingelogd.";
    echo "<meta http-equiv='refresh' content='2;index.php'>";
}
