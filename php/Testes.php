<?php


echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

$n = new Connection();
echo "<pre>";
$n->getAllCardapios(18);
echo "</pre><br>";

$b = new Cardapios();
echo "<pre>";
$b->showCardapio(18);
echo "</pre>";


?>
