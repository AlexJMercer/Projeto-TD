<?php

//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";


   if (isset($_POST['enviar']))
   {
      $object             = new Eventos();
      $object->evento     = $_POST['evento'];
      $object->dataInicio = $_POST['dataInicio'];
      $object->dataFinal  = $_POST['dataFinal'];
      $object->texto      = $_POST['texto'];
      //print_r($object);
      $object->Inserir();

      $myUpload = new Upload($_FILES["imagem"]);

      $Up = $myUpload->eventoUpload();
      header("Location:ViewEventosObj.php");
   }

   if (isset($_POST['excluir']))
   {
      $object     = new Eventos();
      $object->id = $_POST['id'];

      //print_r($object);
      $object->Excluir();

      header("Location:ViewEventosObj.php");
   }

?>
