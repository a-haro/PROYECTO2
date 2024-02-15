<?php
function mostrar_menu()
{
    include "navbar.html";
}

######## FUNCION 2 ########

function importar_todo($fichero)
{  
    //include "conectar.php";

    $json = file_get_contents($fichero);
    $data = json_decode($json, true);
    
    foreach($data as $fila) {
        $nombre = "";
        $fecha_lanzamiento = "";

        foreach($fila as $key => $value) {
            if ($key == "Nom") {
                $nombre = $value;
            }
            if ($key == "Llançament") {
                $fecha_lanzamiento = $value;
            }
            
            echo "Nombre: $nombre, fecha de lanzamiento: $fecha_lanzamiento<br>";
        }
        echo "<br>";
    }
}

importar_todo('games.json');

?>