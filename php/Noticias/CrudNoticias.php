<?php

include_once "../../class/Carrega.class.php";

   if (isset($_POST['enviar']))
   {
      $object = new Noticias();
      $object->autor = $_POST['autor'];
      $object->titulo = $_POST['titulo'];
      $object->resumo = $_POST['resumo'];
      $object->status = $_POST['status'];
      $object->categorias = $_POST['categorias'];
      $object->noticia = $_POST['noticia'];

      //print_r($object);
      $object->Inserir();

      header("Location:NoticiaObj.php");
   }


?>
