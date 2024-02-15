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
    
    $plataformas = [];

    foreach($data as $fila) {
        $nombre = "";
        $fecha_lanzamiento = "";
        $desarrollador = "";
        $plataforma = [];

        foreach($fila as $key => $value) {
            if ($key == "Nom") {
                $nombre = $value;
            } else if ($key == "Llançament") {
                $fecha_lanzamiento = $value;
            } else if ($key == "Plataforma") {
                $plataforma = explode(", ", $value);
                for ($i = 0; $i < count($plataforma); $i++) {
                    if (!in_array($plataforma[$i], $plataformas)) {
                        array_push($plataformas, $plataforma[$i]);
                    }
                }
            } else if ($key == "Desenvolupador") {
                $desarrollador = $value;
            }
        }

        // VIDEOJUEGO
        if (!empty($nombre) or !empty($fecha_lanzamiento)) {
            try {
                $sql = "INSERT INTO VIDEOJUEGO (nombre, fecha_lanzamiento)
                VALUES ('$nombre', '$fecha_lanzamiento', 'NULL')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                $last_id = $conn->lastInsertId();
                echo "New record created successfully. Last inserted ID is: " . $last_id;  
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
              
            $conn = null;
        } else if (!empty($plataformas)) {
            // PLATAFORMA
            for ($i = 0; $i < count($plataformas); $i++) {
                try {
                    $sql = "INSERT INTO PLATAFORMA (nombre)
                    VALUES ('$plataformas[$i]')";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "New record created successfully";
                    $last_id = $conn->lastInsertId();
                    echo "New record created successfully. Last inserted ID is: " . $last_id;  
                } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
                  
                $conn = null;
            }
        } else if (!empty($desarrollador)) {
            // DESARROLLADOR
            try {
                $sql = "INSERT INTO DESARROLADOR (nombre)
                VALUES ('$nombre')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                $last_id = $conn->lastInsertId();
                echo "New record created successfully. Last inserted ID is: " . $last_id;  
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
              
            $conn = null;
        }

    }

}

importar_todo('games.json');

?>