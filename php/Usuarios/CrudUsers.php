<?php

include_once "../../class/Carrega.class.php";


if (isset($_POST['enviar']))
{
    $object        = new Usuarios();
    $object->nome  = $_POST['nome'];
    $object->email = $_POST['email'];
    $object->senha = $_POST['senha'];
    $object->tipo  = $_POST['tipo'];

    $object->inserir();

}

?>
