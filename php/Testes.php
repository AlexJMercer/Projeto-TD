<?php

include_once "../class/Carrega.class.php";

$object = new Connection();
echo "<pre>";
$object->getAllNoticias();
echo "</pre>";
echo "<br>";
$obj = new Connection();
echo "<pre>";
$obj->getNoticiaById(1);
echo "</pre>"
?>
