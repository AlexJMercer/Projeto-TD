<?php

include_once '../class/Carrega.class.php';


if (isset($_POST['excluir']))
{
    $object = new Cardapios();
    $object->id = $_POST['id'];

    $object->excluir();

    //echo "<meta http-equiv='refresh' content='0;url=ViewCardapioObj.php'";
    header("Location:ViewCardapioObj.php");
}
?>
