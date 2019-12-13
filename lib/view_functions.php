<?php
/* Deze functie laadt de <head> sectie */
function BasicHead()
{
    print LoadTemplate("basic_head");
}

function PrintNavBar(){
    if (!isset($_SESSION["user"])){
        $sql = "SELECT * from navigatie where nav_item <> 'Logout' and nav_item <> 'Beheer'";
        $data = GetData($sql);
        $template = LoadTemplate('basic_header');
        print "<body>
        <header>
            <div id='header' class='container'>
            <a href='index.php'><h2>Eventologus</h2></a>
            <nav id='mainnav'>
                <ul>";
                    ReplaceContent($data, $template);
                print "</ul>
            </nav>
            </div>
        </header>";

    } else{
        $sql = "SELECT * from navigatie where nav_item <> 'Login'";
        $data = GetData($sql);
        $template = LoadTemplate('basic_header');
        print "<body>
        <header>
            <div id='header' class='container'>
            <a href='index.php'><h2>Eventologus</h2></a>
            <nav id='mainnav'>
                <ul>";
        ReplaceContent($data, $template);
        print "</ul>
            </nav>
            </div>
        </header>";
    }
}


/* Deze functie laadt de opgegeven template */
function LoadTemplate( $name )
{
    if (file_exists("templates/$name.html")) {
        return file_get_contents("templates/$name.html");
    } else{
//        include("templates/$name.php");
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

function Check($tabel, $id, $veld){

    $check = GetData("select * from $tabel where $veld =".$id);

    if (empty($check)){
        $_SESSION['msg'] = 'Er ging iets fout bij het aanmaken. Probeer opnieuw.';
    };

}