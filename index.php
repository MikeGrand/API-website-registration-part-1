<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda - Menú Principal</title>

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
            height: 100vh;
            background: radial-gradient(ellipse at center, #380a0a 0%, #000000 70%);
            font-family: 'Share Tech Mono', monospace;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h2 {
            text-shadow: 0 0 15px rgba(255, 60, 60, 0.9);
            margin-bottom: 30px;
            font-size: 35px;
        }

        .menu {
            background: rgba(255, 255, 255, 0.08);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(255, 60, 60, 0.6);
            width: 350px;
        }

        a {
            display: block;
            text-decoration: none;
            padding: 15px;
            margin: 12px 0;
            border-radius: 6px;
            font-size: 22px;
            color: white;
            background: #380a0a;
            border: 1px solid rgba(255, 60, 60, 0.4);
            text-shadow: 0 0 10px rgba(255, 60, 60, 0.7);
            transition: all 0.3s ease;
        }

        a:hover {
            background: rgba(255, 60, 60, 1);
            box-shadow: 0 0 15px rgba(255, 60, 60, 1);
        }

    </style>
</head>
<body>

    <div class="menu">
        <h2>Agenda - Menú Principal</h2>

        <a href="mostrar.php">Mostrar Contactos</a>
        <a href="crear.php">Crear Contacto</a>
        <a href="modificar.php">Modificar Contacto</a>
        <a href="eliminar.php">Eliminar Contacto</a>
    </div>

</body>
</html>
