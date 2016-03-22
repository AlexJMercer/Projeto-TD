<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->categoria = $_POST['categoria'];

      $object->inserir();

      header("Location:ViewCategoriasObj.php");
  }
?>
