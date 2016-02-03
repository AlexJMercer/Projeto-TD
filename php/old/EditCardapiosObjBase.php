<?php

  include_once "Cardapios.class.php";

  if (isset($_POST['atualizar']))
  {
      $object = new Cardapios();
      $object->cod = $_POST['cod'];
      $object->dia = $_POST['dia'];
      $object->data = $_POST['data'];
      $object->texto = $_POST['cardapio'];

      $object->atualizar();

      header("Location:ViewCardapioObj.php");
  }


?>
  <?php

    include_once "Dia.class.php";

  $cod = $_POST["cod"];

  if (isset($_POST["editar"]))
  {
    $edit = new Cardapios();
    $comp = $edit->editar($cod);

    if ($edit != null)
    {
?>
<!DOCTYPE html>
<html>
  <head lang="pt-br">
    <meta charset="utf-8">
    <title>Editar Cardápios</title>
  </head>
  <body>
    <section>
      <table>
        <h2> Editar Cardápio </h2>
          <form name="editcardapio" action="<?php $SELF_PHP;?>" method="post">
            <label for=dia> Dia:
              <select name="dia">"
              <option value="">Selecione o dia</option>
              <?php $diaSelect = new Dia();
                    $diaSelect->diaSelect($comp->dia);
              ?>
            </select>
            </label>
            <label for="data"> Data:
              <input type="text" id="data" placeholder="DD/MM/AAAA" name="data" value=" <?php echo date('d/m/y',strtotime( $comp->data)) ?>"/>
            </label>
            <label for="cardapio"> Cardápio:
              <textarea placeholder="Digite o cardápio" name="cardapio" id="cardapio" rows="7" cols="45"><?php echo $comp->texto;  ?></textarea>
            </label>
            <input type="hidden" name="cod" value="<?php echo $comp->cod; ?>">
            <input type="submit" name="atualizar" value="Atualizar" />
            <input type="button" name="cancelar" value="Cancelar" onclick="history.go(-1)" />
        </form>
      </table>
    </section>
  </body>
</html>
<?php
    }
  }
?>
