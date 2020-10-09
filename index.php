<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Programmierhilfe_V2.css">
<header>
    <meta charset="utf-8">
    <title>logi-php.net</title>
</header>

<body>
    <div>
    <img src="https://i.ibb.co/rFxKcMY/Logo-Querformat.png" width="300px" height="200px" id="picture2">
    </div>

    <input id="suche" onkeyup="search_command()" type="text"
    name="suche" placeholder="Mit Logi suchen"> 
<!-- ordered list -->
    <ul id='list'> 
        <p>
            <?php
                $url = "https://www.php.net/manual-lookup.php?pattern=output&scope=quickref";
                $html = file_get_contents($url);
                $html = substr($html,stripos($html,'<!-- result list start -->')+6);
                $html = substr($html,0,strripos($html,'<!-- result list end -->'));
                
                // replace dd/dt with li and class for search
                // <dd> or <dt>        <a href='/manual/en/
                // <li class="commands"><a href="http://www.php.net/manual/de
                $html = str_replace("dd","li class=\"commands\"", $html);
                $html = str_replace("dt","li class=\"commands\"", $html);
                $html = preg_replace("/(d?)(.*)manual(?)){2}\w}(?)/", "li class=\"commands\"><a target=\"_blank\" href=\"https://www.php.net/manual/de/", $html);
                echo $html;
            ?>
        </p> 
        
    </ul>

    <div>
        <script>
            function search_command() { 
                let input = document.getElementById('suche').value 
                input=input.toLowerCase(); 
                let x = document.getElementsByClassName('commands'); 
                for (i = 0; i < x.length; i++) {  
                    if (!x[i].innerHTML.toLowerCase().includes(input)) { 
                        x[i].style.display="none"; 
                    } 
                    else { 
                        x[i].style.display="list-item";                  
                    }
                }
            }
        </script>
    </div>

    <div>
        <img src="https://i.ibb.co/4s4Qj3z/Logo-Hochformat.png" width="40px" height="80px" id="picture1">
    </div>
</body>

<footer>
    <p>
        <p2 id="content2"><strong>Referenzen:</strong> Robin Giezen, Robin Löwenstein, Darwin Wolf, Fabio Mannoni</p2>
    </p>
</footer>
