<?php


echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

$n = new Connection();
echo "<pre>";
$n->getAllMonitorias();
echo "</pre><br>";


?>
