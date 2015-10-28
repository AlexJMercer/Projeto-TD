<?php

include_once "../class/Carrega.class.php";

    if (isset($_POST['enviar']))
    {
      $object = new Disciplinas();
      $object->disciplinas = $_POST['disciplinas'];
      $object->curso = $_POST['curso'];

      $object->inserir();

      header("Location:ViewDisciplinasObj.php");
    }

    else if (isset($_POST['atualizar']))
    {
      $object = new Disciplinas();
      $object->id = $_POST['id'];
      $object->disciplinas = $_POST['disciplinas'];
      $object->curso = $_POST['curso'];
      
      $object->atualizar();

      header("Location:ViewDisciplinasObj.php");
    }

    else if (isset($_POST['excluir']))
    {
      $object = new Disciplinas();
      $object->id = $_POST['id'];

      $object->excluir();


      header("Location:ViewDisciplinasObj.php");
    }


 ?>
