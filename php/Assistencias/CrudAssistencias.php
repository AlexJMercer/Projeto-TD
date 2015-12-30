<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
    $object = new Assistencias();
    $object->assist = $_POST['assist'];
    $object->texto = $_POST['texto'];

    $object->Inserir();
    
    header("Location:ViewAssistenciasObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object = new Assistencias();
      $object->id = $_POST['id'];

      $object->excluir();

      header("Location:ViewAssistenciasObj.php");
  }

 ?>
