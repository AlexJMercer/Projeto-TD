<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object           = new Cardapios();
      $object->dia      = $_POST['dia'];
      $object->data     = $_POST['data'];
      $object->alimento = $_POST['alimento'];
      /*var_dump($object);*/
      $object->Inserir();

      header("Location:ViewCardapiosObj.php");
  }

  elseif (isset($_POST['excluir']))
  {
      $object     = new Cardapios();
      $object->id = $_POST['id'];

      $object->excluir();

      header("Location:ViewCardapiosObj.php");
  }

  elseif (isset($_POST['atualizar']))
  {
      //realiza recadastramento
      $object        = new Cardapios();
      $object->id    = $_POST['id'];

      $object->excluir();

      $obj           = new Cardapios();
      $obj->dia      = $_POST['dia'];
      $obj->data     = $_POST['data'];
      $obj->alimento = $_POST['alimento'];

      $obj->Inserir();

      header("Location:ViewCardapiosObj.php");
  }
?>
