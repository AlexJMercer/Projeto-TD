<?php

//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";


   if (isset($_POST['enviar']))
   {
      $object             = new Noticias();
      $object->autor      = $_POST['autor'];
      $object->titulo     = $_POST['titulo'];
      $object->resumo     = $_POST['resumo'];
      $object->status     = $_POST['status'];
      $object->categorias = $_POST['categorias'];
      $object->noticia    = $_POST['noticia'];
      //print_r($object);
      $object->Inserir();

      $myUpload = new Upload($_FILES["imagem"]);

      $Up = $myUpload->noticiaUpload();
      header("Location:ViewNoticiasObj.php");
   }

   elseif (isset($_POST['excluir']))
   {
      $object     = new Noticias();
      $object->id = $_POST['id'];

      //print_r($object);
      $object->Excluir();

      header("Location:ViewNoticiasObj.php");
   }

   elseif (isset($_POST['atualizar']))
   {
      $object     = new Noticias();
      $object->id = $_POST['id'];
   }

?>
