<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $('table').DataTable();

    });
    </script>
    <title> Listagem de Cardápios </title>
  </head>
  <body>
    <h1 class="page-header"> Listagem de Cardápios </h1>
      <table>
        <thead>
          <tr><th> Dia <th> Data <th> Cardápios <th> Opções<th></tr>
        </thead>
        <tbody>

<?php

include_once "Cardapios.class.php";

    $listar = new Cardapios();
    $list = $listar->listar();

      if ($list != null)
      {
        foreach ($list as $line)
        {
?>
      <tr>
        <form name="view" class="" action="EditCardapiosObj.php" method="post">
<?php
    echo "<th>" .$line->dia. "</th>
            <th>"  .date('d/m/Y',strtotime($line->data)). "</th>
            <th>"  .$line->texto. "</th>
            <th>
              <input type='hidden' name='cod' value='" .$line->cod."'>
              <input type='submit' name='editar' value='Editar'/></th>
            <th>
            <input type='submit' formaction='' name='excluir' value='Excluir'/></th>
      </tr>
    </form>";
?>
<?php
        }
      }
      else
      {
        echo"<h2> Nenhum dia cadastrado!!</h2>";
      }
?>
         </tbody>
      </table>
  </body>
</html>
<?php

if (isset($_POST['excluir']))
{
    $object = new Cardapios();
    $object->cod = $_POST['cod'];

    $object->excluir();

    header("Location:ViewCardapioObj.php");
}

?>
