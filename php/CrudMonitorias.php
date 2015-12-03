<?php

include_once "../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
     $object = new Monitorias();
     $object->curso = $_POST['curso'];
     $object->disciplina = $_POST['disciplina'];
     $object->semestre = $_POST['semestre'];
     $object->sala = $_POST['sala'];
     $object->info = $_POST['info'];

     $object->Inserir();

     header("Location:MonitoriasObj.php");
  }

  else if (isset($_POST['excluir']))
  {
     $object = new Monitorias();
     $object->id = $_POST['id'];

     $object->Excluir();

     header("Location:PreviewMonitoriasObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
     $object = new Local();
     $object->id = $_POST['id'];
     $object->curso = $_POST['curso'];
     $object->disciplina = $_POST['disciplina'];
     $object->sala = $_POST['sala'];
     $object->semestre = $_POST['semestre'];
     $object->info = $_POST['info'];

     $object->Atualizar();

     header("Location:ViewMonitoriasObj.php");
  }

?>
