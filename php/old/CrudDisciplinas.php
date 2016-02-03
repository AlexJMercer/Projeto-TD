<?php

include_once "../class/Carrega.class.php";

    if (isset($_POST['enviar']))
    {
      $object = new Disciplinas();
      $object->disciplina = $_POST['disciplina'];
      $object->curso = $_POST['curso'];

      $object->Inserir();

      header("Location:ViewDisciplinaObj.php");
    }

    else if (isset($_POST['atualizar']))
    {
      $object = new Disciplinas();
      $object->id = $_POST['id'];
      $object->disciplina = $_POST['disciplina'];
      $object->curso = $_POST['curso'];

      $object->Atualizar();

      header("Location:ViewDisciplinaObj.php");
    }

    else if (isset($_POST['excluir']))
    {
      $object = new Disciplinas();
      $object->id = $_POST['id'];

      $object->Excluir();


      header("Location:ViewDisciplinaObj.php");
    }


 ?>
