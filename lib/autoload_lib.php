<?php
//Bij de lib-bestanden is het niet nodig om de navigatie, messages en basichead weer te geven
require_once "pdo.php";                         //database functies
require_once "view_functions.php";      //basic_head, load_template, replacecontent...
require_once "show_message.php";
require_once "authorisation.php";
session_start();