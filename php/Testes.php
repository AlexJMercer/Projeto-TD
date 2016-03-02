<?php


echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

$object = new Connection();
echo "<pre>";
$object->getAllAssistencias();
echo "</pre>";
echo "<br>";
$obj = new Connection();
echo "<pre>";
$obj->getObjNoticiaById(12);
echo "</pre>"
?>
