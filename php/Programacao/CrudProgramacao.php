<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object       = new Programacao();
      $object->evento = $_POST['evento'];

      $object->Inserir();

      header("Location:ViewProgramacaoObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Programacao();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewProgramacaoObj.php");

  

  else if (isset($_POST['atualizar']))
  {
      $object       = new Programacao();
      $object->id   = $_POST['id'];
      $object->evento = $_POST['evento'];

      $object->Atualizar();

      header("Location:ViewProgramacaoObj.php");
  }

?>
