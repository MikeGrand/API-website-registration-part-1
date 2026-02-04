<?php

$datos = [];
if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $url = "http://localhost/Sistema/api.php?tipo=1&llave=0";
    $json = json_decode(file_get_contents($url), true);

    foreach ($json["dato"] as $c) {
        if ($c["id"] == $id) {
            $datos = $c;
            break;
        }
    }
}

if (isset($_POST["actualizar"])) {

    $id  = $_POST["id"];
    $nom = $_POST["nom"];
    $app = $_POST["app"];
    $tel = $_POST["tel"];
    $llave = 0;

    $url = "http://localhost/Sistema/api.php?tipo=3&id=$id&nom=$nom&app=$app&tel=$tel&llave=$llave";
    file_get_contents($url);

    header("Location: actualizar.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body class="p-5">

<h2>Actualizar Contacto</h2>

<form method="POST" class="mt-4">
    <input type="hidden" name="id" value="<?= $datos["id"] ?? "" ?>">

    <label>Nombre:</label>
    <input type="text" name="nom" class="form-control mb-2"
           value="<?= $datos["nom"] ?? "" ?>" required>

    <label>Apellido:</label>
    <input type="text" name="app" class="form-control mb-2"
           value="<?= $datos["app"] ?? "" ?>" required>

    <label>Teléfono:</label>
    <input type="text" name="tel" class="form-control mb-2"
           value="<?= $datos["tel"] ?? "" ?>" required>

    <button name="actualizar" class="btn btn-warning mt-3">Actualizar</button>
</form>

<a href="index.php" class="btn btn-secondary mt-3">Regresar</a>

<hr>

<h3>Tabla Actualizada</h3>
<?php include "tabla.php"; ?>

</body>
</html>
