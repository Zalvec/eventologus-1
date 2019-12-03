<?php
session_start();
session_destroy();
unset($_SESSION);

session_start();
session_regenerate_id();
header("Location: ../login.php");
?>