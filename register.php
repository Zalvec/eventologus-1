<?php
require_once "lib/autoload.php";

ShowMessages();
BasicHead();
print LoadTemplate("basic_header");
print LoadTemplate("register");
print LoadTemplate("basic_footer");
