<?php

require_once "autoload_lib.php";

$sql = "delete from evenement
        where eve_einddatum + 7 < date(now())";

if (ExecuteSQL($sql)){
    $_SESSION['msg'] = "Evenementen die langer dan een week zijn afgelopen zijn verwijderd.";
    header('Location: ../beheer.php');
} else {
    $_SESSION['msg'] = "Er ging iets fout. Probeer opnieuw.";
    header('Location: ../beheer.php');
}