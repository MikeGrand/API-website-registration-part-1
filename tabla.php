<?php

$url = "http://localhost/Sistema/api.php?tipo=1&llave=0";

$datos = json_decode(file_get_contents($url), true);

if (!isset($datos["dato"]) || !is_array($datos["dato"])) {
    echo "<p>No hay datos para mostrar o la API no respondió correctamente.</p>";
    exit;
}
?>

<table class="table table-bordered mt-3">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>TELÉFONO</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($datos["dato"] as $c): ?>
        <tr>
            <td><?= $c["id"] ?></td>
            <td><?= $c["nom"] ?></td>
            <td><?= $c["app"] ?></td>
            <td><?= $c["tel"] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
