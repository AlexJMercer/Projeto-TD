<?php

//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";


   if (isset($_POST['enviar']))
   {
      $object             = new Eventos();
      $object->evento     = $_POST['evento'];
      $object->categoria  = $_POST['categoria'];
      $object->texto      = $_POST['texto'];

      $object->Inserir();

      $myUpload = new Upload($_FILES["imagem"]);
      $Up       = $myUpload->eventoUpload();
      /*print_r($object);
      print_r($Up);*/
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
      $object            = new Eventos();
      $object->id        = $_POST['id'];
      $object->evento    = $_POST['evento'];
      $object->categoria = $_POST['categoria'];
      $object->texto     = $_POST['texto'];

      $object->Atualizar();

      $myUpload = new Upload($_FILES['imagem']);
      $Up       = $myUpload->eventoUpload();

      header("Location:ViewEventosObj.php");
   }
?>
