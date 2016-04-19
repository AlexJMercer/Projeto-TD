<?php

include_once '../../class/Carrega.class.php';

$false = false;

  if (isset($_POST['enviar']))
  {
    $object = new Permissions();
    $object->usuario = $_POST['usuario'];

    if (isset($_POST['noticias']))
    {
      $object->noticias = 1;
    }
    elseif (!isset($_POST['noticias']))
    {
      $object->noticias = 0;
    }

    if (isset($_POST['cardapios']))
    {
      $object->cardapios = 1;
    }
    elseif (!isset($_POST['cardapios']))
    {
        $object->cardapios = 0;
    }

    if (isset($_POST['cursos']))
    {
      $object->cursos = 1;
    }
    elseif(!isset($_POST['cursos']))
    {
      $object->cursos = 0;
    }
    //print_r($object);
    //var_dump($object);
    $object->InserirPermissions();
  }
?>
