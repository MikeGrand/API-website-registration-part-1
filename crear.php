<?php
$mensaje = "";
$alerta = "";

if (isset($_POST["crear"])) {

    // 1️⃣ Limpiar datos
    $nom = trim($_POST["nom"] ?? "");
    $app = trim($_POST["app"] ?? "");
    $tel = trim($_POST["tel"] ?? "");
    $llave = 0;

    // 2️⃣ Validaciones
    if (
        $nom === "" || $app === "" || $tel === "" ||
        strlen($nom) > 30 || strlen($app) > 30 ||
        !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nom) ||
        !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $app) ||
        !ctype_digit($tel)
    ) {
        $alerta = "Datos inválidos. Revisa los campos.";
    } else {

        // 3️⃣ Consultar API (listar)
        $json = json_decode(
            file_get_contents("http://localhost/Sistema/api.php?tipo=1&llave=0"),
            true
        );

        if (!isset($json["dato"])) {
            $alerta = "Error al consultar la API.";
        } else {

            // 4️⃣ Verificar duplicados
            $existe = false;
            foreach ($json["dato"] as $c) {
                if (
                    strtolower($c["nom"]) == strtolower($nom) &&
                    strtolower($c["app"]) == strtolower($app) &&
                    $c["tel"] == $tel
                ) {
                    $existe = true;
                    break;
                }
            }

            if ($existe) {
                $alerta = "El usuario <strong>" . htmlspecialchars($nom) . " " . htmlspecialchars($app) . "</strong> ya está registrado.";
            } else {

                // 5️⃣ Codificar antes de mandar a la API
                $nom_url = urlencode($nom);
                $app_url = urlencode($app);
                $tel_url = urlencode($tel);

                $url = "http://localhost/Sistema/api.php?tipo=2&nom=$nom_url&app=$app_url&tel=$tel_url&llave=$llave";
                file_get_contents($url);

                $mensaje = "El usuario <strong>" . htmlspecialchars($nom) . " " . htmlspecialchars($app) . "</strong> fue registrado correctamente.";
            }
        }
    }
}
?>

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Contacto</title>

    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body {width:100%;min-height:100vh;background:radial-gradient(ellipse at center,#380a0a 0%,#000000 70%);font-family:'Share Tech Mono',monospace;color:white;padding:40px;text-align:center;}
        h2,h3 {text-shadow:0 0 15px rgba(255,60,60,0.9);font-size:32px;margin-bottom:20px;}
        .contenedor {background:rgba(255,255,255,0.08);padding:35px;border-radius:12px;box-shadow:0 0 25px rgba(255,60,60,0.6);width:450px;margin:auto;}
        .form-control {width:100%;padding:12px;margin-top:10px;margin-bottom:20px;border-radius:6px;border:1px solid rgba(255,60,60,0.4);background:#380a0a;color:white;font-size:18px;}
        button {width:100%;padding:14px;border-radius:6px;font-size:20px;cursor:pointer;border:1px solid rgba(255,60,60,0.4);background:#380a0a;color:white;text-shadow:0 0 10px rgba(255,60,60,0.7);transition:0.3s ease;}
        button:hover {background:rgba(255,60,60,1);box-shadow:0 0 15px rgba(255,60,60,1);}
        .btn-regresar {display:block;margin-top:15px;text-decoration:none;padding:14px;border-radius:6px;font-size:20px;color:white;background:#222;border:1px solid rgba(255,255,255,0.2);transition:0.3s;}
        .btn-regresar:hover {background:#444;}
        .alerta {background:rgba(255,0,0,0.18);border:1px solid rgba(255,0,0,0.5);padding:15px;border-radius:8px;margin-bottom:20px;text-shadow:0 0 6px rgba(255,50,50,0.8);}
        .alerta-success {background:rgba(0,255,0,0.18);border:1px solid rgba(0,255,0,0.5);text-shadow:0 0 6px rgba(50,255,50,0.8);}
        table {margin:40px auto;color:white;border-collapse:collapse;width:80%;border:2px solid white;}
        th, td {text-align:center!important;padding:10px;border:1px solid white;}
        th {background:rgba(255,0,0,0.6)!important;}
        td {background:rgba(40,0,0,0.6)!important;}
    </style>
</head>

<body>

<div class="contenedor">
    <h2>Crear Contacto</h2>

    <?php if ($alerta != ""): ?>
        <div class="alerta">
            <?= $alerta ?>
        </div>
    <?php endif; ?>

    <?php if ($mensaje != ""): ?>
        <div class="alerta alerta-success">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="crear.php">
        <label>Nombre:</label>
        <input type="text" name="nom" class="form-control" required>

        <label>Apellido:</label>
        <input type="text" name="app" class="form-control" required>

        <label>Teléfono:</label>
        <input type="text" name="tel" class="form-control" required>

        <button name="crear">Crear</button>
    </form>

    <a href="index.php" class="btn-regresar">Regresar</a>
</div>

<h3>Tabla Actual</h3>
<?php include "tabla.php"; ?>

</body>
</html>
