<?php
function ShowMessages()
{

    //weergeven messages
    if ( isset($_SESSION['msg']) )
    {
        $message = $_SESSION['msg'];
        $row = array( "message" => $message );
        $templ = LoadTemplate("message");
        print ReplaceContentRow( $row, $templ );
        unset($_SESSION['msg']);
    }
}