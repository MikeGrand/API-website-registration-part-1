<?php
$mensaje = "";

if (isset($_GET["id"]) && isset($_GET["nom"]) && isset($_GET["app"]) && isset($_GET["tel"])) {

    $id = $_GET["id"];
    $nom = $_GET["nom"];
    $app = $_GET["app"];
    $tel = $_GET["tel"];

    $url = "http://localhost/Sistema/api.php?tipo=3&llave=0&id=$id&nom=$nom&app=$app&tel=$tel";
    file_get_contents($url);

    $mensaje = " El contacto con ID <strong>$id</strong> fue <strong>modificado</strong> correctamente.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Contacto</title>

    <!-- Fuente futurista -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background: radial-gradient(ellipse at center, #380a0a 0%, #000000 70%);
            font-family: 'Share Tech Mono', monospace;
            color: white;
            padding: 40px;
            text-align: center;
        }

        h2, h3 {
            text-shadow: 0 0 15px rgba(255, 60, 60, 0.9);
            font-size: 32px;
            margin-bottom: 20px;
        }

        .contenedor {
            background: rgba(255, 255, 255, 0.08);
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(255, 60, 60, 0.6);
            width: 450px;
            margin: auto;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid rgba(255, 60, 60, 0.4);
            background: #380a0a;
            color: white;
            font-size: 18px;
        }

        button {
            width: 100%;
            padding: 14px;
            border-radius: 6px;
            font-size: 20px;
            cursor: pointer;
            border: 1px solid rgba(255, 60, 60, 0.4);
            background: #380a0a;
            color: white;
            text-shadow: 0 0 10px rgba(255, 60, 60, 0.7);
            transition: 0.3s ease;
        }

        button:hover {
            background: rgba(255, 60, 60, 1);
            box-shadow: 0 0 15px rgba(255, 60, 60, 1);
        }

        .btn-regresar {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 20px;
            color: white;
            background: #222;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s;
        }

        .btn-regresar:hover {
            background: #444;
        }

        /* Mensaje */
        .alerta {
            background: rgba(255, 0, 0, 0.18);
            border: 1px solid rgba(255, 0, 0, 0.5);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-shadow: 0 0 6px rgba(255, 50, 50, 0.8);
        }

        /* TABLA */
        table {
            margin: 40px auto;
            color: white !important;
            border-collapse: collapse;
            width: 80%;
            border: 2px solid white;
        }

        th, td {
            text-align: center !important;
            padding: 10px;
            border: 1px solid white;
        }

        th {
            background: rgba(255, 0, 0, 0.6) !important;
        }

        td {
            background: rgba(40, 0, 0, 0.6) !important;
        }
    </style>
</head>

<body>

    <div class="contenedor">
        <h2>Modificar Contacto</h2>

        <?php if ($mensaje != ""): ?>
            <div class="alerta">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <form method="GET" action="modificar.php">

            <label>ID del contacto:</label>
            <input type="number" name="id" class="form-control" required>

            <label>Nuevo Nombre:</label>
            <input type="text" name="nom" class="form-control" required>

            <label>Nuevo Apellido:</label>
            <input type="text" name="app" class="form-control" required>

            <label>Nuevo Teléfono:</label>
            <input type="text" name="tel" class="form-control" required>

            <button>Modificar</button>
        </form>

        <a href="index.php" class="btn-regresar">Regresar</a>
    </div>

    <h3>Tabla Actual</h3>
    <?php include "tabla.php"; ?>

</body>
</html>
