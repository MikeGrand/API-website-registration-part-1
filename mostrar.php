<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Contactos</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        * {
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
        }

        h2 {
            text-align: center;
            text-shadow: 0 0 15px rgba(255, 60, 60, 0.9);
            margin-bottom: 30px;
            font-size: 35px;
        }

        .contenedor {
            background: rgba(255, 255, 255, 0.08);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(255, 60, 60, 0.6);
            width: 90%;
            max-width: 900px;
            margin: 0 auto 40px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            color: white;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 60, 60, 0.5);
        }

        table th {
            background: rgba(255, 60, 60, 0.2);
            text-shadow: 0 0 10px rgba(255, 60, 60, 0.7);
        }

        a.boton {
            display: block;
            width: 200px;
            text-align: center;
            margin: 0 auto;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            background: #380a0a;
            color: white;
            border: 1px solid rgba(255, 60, 60, 0.4);
            text-shadow: 0 0 10px rgba(255, 60, 60, 0.7);
            transition: 0.3s ease;
            font-size: 20px;
        }

        a.boton:hover {
            background: rgba(255, 60, 60, 1);
            box-shadow: 0 0 15px rgba(255, 60, 60, 1);
        }
    </style>

</head>
<body>

    <h2>Lista de Contactos</h2>

    <div class="contenedor">
        <?php include "tabla.php"; ?>
    </div>

    <a href="index.php" class="boton">Regresar</a>

</body>
</html>
