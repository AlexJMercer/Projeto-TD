<?php


echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

echo "<h1>Página de testes</h1><br>";

$n = new Connection();
echo "<pre>";
//$n->getAllCardapios(5);
//$n->getAllNoticias();
//$n->ShowNoticiaById();
//$n->getAllMonitoriasByCurso();
//$n->getMonitoriaById(1);
$n->ShowAllCardapios(1);
echo "</pre><br>";
$m = new Connection();
echo "<pre>";
$m->ShowAllCardapios(2);
echo "</pre><br>";
$b = new Connection();
echo "<pre>";
$b->ShowAllCardapios(3);
echo "</pre><br>";
$c = new Connection();
echo "<pre>";
$c->ShowAllCardapios(4);
echo "</pre><br>";
$x = new Connection();
echo "<pre>";
$x->ShowAllCardapios(5);
echo "</pre><br>";




?>
