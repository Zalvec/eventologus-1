<?php
function ControleLoginWachtwoord( $login, $paswd )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM user WHERE use_email='" . $login . "' ";
    $data = GetData($sql);
    //Als er een gebruiker is met deze email
    if ( count($data) == 1 )
    {
        //De gegevens van de gebruiker uit de data halen
        $row = $data[0];
        //password controleren
        if ( password_verify( $paswd, $row['use_wachtwoord'] ) ) $login_ok = true;
    }

    if ( $login_ok )
    {
        //Alle gegevens van deze user in de session steken
        $_SESSION['user'] = $row;
        return true;
    }

    return false;
}