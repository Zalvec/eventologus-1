<?php
/* Deze functie laadt de <head> sectie */
function BasicHead()
{
    print LoadTemplate("basic_head");
}

/* Deze functie laadt de opgegeven template */
function LoadTemplate( $name )
{
    if (file_exists("templates/$name.html")) {
        return file_get_contents("templates/$name.html");
    } else{
        return file_get_contents("templates/$name.php");
    }
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContent( $data, $template_html )
{
    foreach ( $data as $row )
    {
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }
        print $content;
    }
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContentRow( $row, $template_html )
{
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

        print $content;
}