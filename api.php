<?php

$base = "http://localhost/serv/index.php";

$url = $base . "?" . http_build_query($_GET);

echo file_get_contents($url);
?>
