<?php
function GetConnection()
{
//    $dsn = "mysql:host=185.115.218.166;dbname=wdev_nathan";
//    $user = "wdev_nathan";
//    $passwd = "7keQALHp64hZ";

//    $dsn = "mysql:host=185.115.218.166;dbname=wdev_roel";
//    $user = "wdev_roel";
//    $passwd = "xlplnmvEQATn";

    $dsn = "mysql:host=localhost;dbname=eventologus";
    $user = "root";
    $passwd = "ArtHur17";

    $pdo = new PDO($dsn, $user, $passwd);
    return $pdo;
}

function GetData( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->query($sql);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

    $last_id = $stm->lastInsertId();

    return $rows;
}

function ExecuteSQL( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);

    if ( $stm->execute() ) return true;
    else return false;
}

