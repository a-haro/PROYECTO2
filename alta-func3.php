<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-1qWJ1a/6zq6h3I4I8L3B9WlFlsUiRLBUZRtN+VitE6U3IVBRcTzMjT9cDl73KFL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Games</title>
</head>

<body>
    <?php
    include "navbar.html";
    ?>

    <div class="contenedor">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <div class="mb-3">
                        <label for="nombrePlataforma" class="form-label">Plataforma</label>
                        <input type="text" class="form-control" id="nombrePlataforma" name="platform">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                    <div class="mb-3">
                        <label for="nombreGenero" class="form-label">Género</label>
                        <input type="text" class="form-control" id="nombreGenero" name="genre">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                    <div class="mb-3">
                        <label for="nombreDesarrollador" class="form-label">Desarrollador</label>
                        <input type="text" class="form-control" id="nombreDesarrollador" name="developer">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    include "clases/db.php";
    $inserir = new db();
    $platform = $genre = $developer = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["platform"] != null) {
        $platform = test_input($_GET["platform"]);
        $inserir->insertPlataforma($platform);
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["genre"] != null) {
        $genre = test_input($_GET["genre"]);
        $inserir->insertGenero($genre);
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["developer"] != null) {
        $developer = test_input($_GET["developer"]);
        $inserir->insertDesarrollador($developer);
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <?php
    include "funciones.php";
    echo footer();
    ?>
</body>

</html>