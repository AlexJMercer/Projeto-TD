<?php
  include '../class/Carrega.class.php';

  $alimento = $_POST['select'];

    if (isset($_POST['carrega']))
    {

      $select = new Alimentos();
      $select->editar($alimento);

  }
?>
