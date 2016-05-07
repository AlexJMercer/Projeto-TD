<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->categoria = $_POST['categoria'];

      $object->InserirCategoria();

      header("Location:ViewCategoriasObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Categorias();
      $object->id = $_POST['id'];

      $object->excluir();

      header("Location:ViewCategoriasObj.php");
  }

  else if (isset($_POST['atualizar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->id        = $_POST['id'];
      $object->categoria = $_POST['categoria'];

      $object->atualizar();

      header("Location:ViewCategoriasObj.php");
  }
?>
