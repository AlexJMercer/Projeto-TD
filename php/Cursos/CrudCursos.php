<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object = new Cursos();
      $object->nome = $_POST['nome'];
      $object->texto = $_POST['texto'];
      $object->logo = $_POST['logo'];

      $object->Inserir();

      header("Location:ViewCursosObj.php");
  }

  elseif (isset($_POST['atualizar']))
  {
      $object = new Cursos();
      $object->id = $_POST['id'];
      $object->nome = $_POST['nome'];
      $object->texto = $_POST['texto'];
      $object->logo = $_POST['logo'];

      $object->Atualizar();

      header("Location:ViewCursosObj.php");
  }

  elseif (isset($_POST['excluir']))
  {
      $object = new Cursos();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewCursosObj.php");
  }
?>
