<?php

//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";


   if (isset($_POST['enviar']))
   {
      $object                = new Eventos();
      $object->evento        = $_POST['evento'];
      $object->dataInicio    = $_POST['dataInicio'];
      $object->dataFim       = $_POST['dataFim'];
      $object->horarioInicio = $_POST['horarioInicio'];
      $object->horarioFim    = $_POST['horarioFim'];
      $object->categoria     = $_POST['categoria'];
      $object->texto         = $_POST['texto'];

      //print_r($object);
      $object->Inserir();

      if (!empty($_FILES["imagem"]["name"]))
      {
        $myUpload = new Upload($_FILES["imagem"]);
        $Up       = $myUpload->eventoUpload();
      }
      else
      {
        $noImage = new Eventos();
        $noImage->noImageUp();
      }
      header("Location:ViewEventosObj.php");
   }

   else if (isset($_POST['excluir']))
   {
      $object     = new Eventos();
      $object->id = $_POST['id'];

      //print_r($object);
      $object->Excluir();

      header("Location:ViewEventosObj.php");
   }

   else if (isset($_POST['atualizar']))
   {
      $object                = new Eventos();
      $object->id            = $_POST['id'];
      $object->evento        = $_POST['evento'];
      $object->dataInicio    = $_POST['dataInicio'];
      $object->dataFim       = $_POST['dataFim'];
      $object->horarioInicio = $_POST['horarioInicio'];
      $object->horarioFim    = $_POST['horarioFim'];
      $object->categoria     = $_POST['categoria'];
      $object->texto         = $_POST['texto'];

      $object->Atualizar();

      $myUpload = new Upload($_FILES['imagem']);
      $Up       = $myUpload->eventoUploadUpdate($_POST['id']);

      header("Location:ViewEventosObj.php");
   }
?>
