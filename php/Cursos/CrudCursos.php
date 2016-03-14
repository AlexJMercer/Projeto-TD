<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object            = new Cursos();
      $object->nome      = $_POST['nome'];
      $object->instituto = $_POST['instituto'];
      $object->texto     = $_POST['texto'];

      //print_r($object);
      $object->Inserir();

      $myUpload = new Upload($_FILES["logo"]);

      $Up = $myUpload->cursoUpload();

      header("Location:ViewCursosObj.php");
  }

  elseif (isset($_POST['atualizar']))
  {
      $object            = new Cursos();
      $object->id        = $_POST['id'];
      $object->nome      = $_POST['nome'];
      $object->instituto = $_POST['instituto'];
      $object->texto     = $_POST['texto'];

      $object->Atualizar();

      $myUpload = new Upload($_FILES["logo"]);

      $Up = $myUpload->cursoUploadUpdate($_POST['id']);

      header("Location:ViewCursosObj.php");
  }

  elseif (isset($_POST['excluir']))
  {
      $object     = new Cursos();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewCursosObj.php");
  }
?>
