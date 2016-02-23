<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->categoria = $_POST['categoria'];

      $object->inserir();

      /*if ($object->inserir()==true)
      {
         echo "Cadastrado com sucesso!!";
      }
      elseif ($object->inserir()==false) {
         echo "deu ruim";
      }*/

      /*if ($object->inserir())
      {
        echo "<meta http-equiv='refresh' content='0;url=CategoriaObj.php'";
        echo "<script type='text/javascript'>
              $(window).load(function()
              {
                $('#myModal').modal('show');
              });
              </script>";
      }
      else {
        echo "não";
     }*/

      header("Location:ViewCategoriasObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Categorias();
      $object->id = $_POST['id'];

      $object->excluir();

      header("Location:ViewCategoriasObj.php");
  }

  else if (isset($_POST['atualizar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->id        = $_POST['id'];
      $object->categoria = $_POST['categoria'];

      $object->atualizar();

      header("Location:ViewCategoriasObj.php");
  }
?>
