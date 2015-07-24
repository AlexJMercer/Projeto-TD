<?php

include_once 'Dia.class.php';
include_once 'Cardapios.class.php';

  if (isset($_POST['enviar']))
  {
      $object = new Cardapios();
      $object->dia = $_POST['dia'];
      $object->data = $_POST['data'];
      $object->texto = $_POST['cardapio'];

      $object->inserir();

      header("Location:ViewCardapioObj.php");
  }
?>


<!DOCTYPE html>
<html>
    <head lang="pt-br">
      <meta charset="UTF-8">
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
      <title>Cardápios</title>
    </head>
    <body>
      <section>
         <h2>Cadastro de Cardápios</h2>
         <form name="cadcardapio" method="post" action="<?php $SELF_PHP;?>"/>
           <label for=dia> Dia:
           <select name='dia'>"
           <option value=''>Selecione o dia</option>";
            <?php $diaSelect = new Dia();
                  $diaSelect->diaSelect();
            ?>
            </select>
            </label>
		        <label for="data"> Data:
            <input type='date' id='data' placeholder='DD/MM/AAAA' name='data'/>
            </label>
		        <label for="cardapio"> Cardápio:
		        <textarea placeholder="Digite o cardápio" name="cardapio" id="cardapio" rows="7" cols="45"></textarea>
            </label>
		        <input type="submit" name="enviar" value="Enviar" />
		        <input type="reset" name="limpar" value="Limpar Dados" />
	        </form>
      </section>
   </body>
</html>
