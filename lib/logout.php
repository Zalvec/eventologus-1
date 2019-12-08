<?php
session_start();
session_destroy();
unset($_SESSION);

session_start();
session_regenerate_id();
$_SESSION['msg'] = 'U bent uitgelogd!';
header("Location: ../index.php");
?>