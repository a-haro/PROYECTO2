<?php
class db
{
    private $servername = "db";
    private $username = "root";
    private $password = "politecnic";

    public function conectar()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=Juegos", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed2: " . $e->getMessage();
        }
        return $conn;
    }
    public function insertVideojuego($nombre, $fecha, $pegi)
    {
        $conn = $this->conectar();
        try {

            $sql = "INSERT INTO VIDEOJUEGO (nombre, fecha, pegi)
            VALUES ('$nombre', '$fecha', '$pegi')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $last_id = $conn->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function insertPlataforma($nombre)
    {
        $conn = $this->conectar();
        try {

            $sql = "INSERT INTO PLATAFORMA (nombre)
            VALUES ('$nombre')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $last_id = $conn->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function insertGenero($nombre)
    {
        $conn = $this->conectar();
        try {

            $sql = "INSERT INTO GENERO (nombre)
            VALUES ('$nombre')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $last_id = $conn->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function insertDesarrollador($nombre)
    {
        $conn = $this->conectar();
        try {

            $sql = "INSERT INTO DESARROLLADOR (nombre)
            VALUES ('$nombre')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $last_id = $conn->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

}
