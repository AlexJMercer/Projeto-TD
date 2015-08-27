<?php
include '../class/Carrega.class.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="../js/jquery.js"></script>

  </head>
  <body>

    <form class="" action="" method="post">
      <label for="alimentos"> Alimentos: </label>
        <select name="alimentos[]" id="alimentos" multiple="multiple" required>
            <option value="">Selecione o alimento</option>
            <?php $alimentoSelect = new Alimentos();
                  $alimentoSelect->alimentoSelect();
            ?>
        </select>
        <input type="button" name="carrega" value="carrega">
        <div id="box"></div>
      </select>
    </form>

  </body>

  <script>
  $(document).ready(function()
  {

      $("#carrega").click(function(event)
      {

      var select = $("#alimentos ").val();

      $.post('../php/requireAlimento.php', {select: alimentos}, function(resposta)
      {

              $("#box").slideDown();

              if (resposta != false)
              {

                  $("#box").html(resposta);
              }
              else
              {
                  // Coloca a mensagem no div de mensagens
                  $("#box").html(resposta);

                  $("#box").prepend("<p>"resposta"</p>");

              }
          });
      });
  });
  </script>
</html>
