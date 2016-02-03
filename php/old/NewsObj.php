<?php

include_once "../class/Carrega.class.php";

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
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel de Controle</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap time Picker -->
    <link href="../style/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--Topo -->
          <?php include "topolinks.html"; ?>
          <!--Topo -->

          <!--Menu Lateral -->
          <?php include "menu.html"; ?>
          <!--Menu Lateral -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Noticias</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulário de cadastro de noticias
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name="cadnoticias" method="post" action="<?php $SELF_PHP;?>">
                                      <div class="form-group">
                                            <label>Autor</label>
                                            <p class="form-control-static">Mercer</p>
                                      </div>
                                      <div class="form-group">
                                          <label for="titulo">Titulo:</label>
                                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite aqui o titulo da noticia">
                                      </div>
                                      <div class="form-group">
                                          <label for="datepicker">Data:</label>
                                          <input class="form-control" id='datepicker' name="data" placeholder="DD/MM/AAAA" required>
                                      </div>
                                      <div class="bootstrap-timepicker">
                                      <div class="form-group">
                                        <label for="hora">Hora:</label>
                                        <input class="form-control timepicker" type="text" name="hora" id="hora" value="">
                                      </div>
                                    </div>
                                      <div class="form-group">

                                      </div>
                                        <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> Enviar </button>
                                        <br>

                                        <button type="reset" name="limpar" value="limpar" class="btn btn-danger btn-lg btn-block"><i class="fa fa-magic"></i> Limpar dados </button>

                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>

    <!-- bootstrap time picker -->
    <script src="../plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

    <script src="../utilities/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../utilities/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

    <script type="text/javascript">
      $(function() {
        //Timepicker
              $(".timepicker").timepicker({
                  showInputs: false,
                  maxHours:24,
                  showMeridian: false
              });
          });
    </script>
    <script>
      $(document).ready(function () {
        $('#datepicker').datepicker({
            language: "pt-BR",
            format: "dd/mm/yyyy",
            orientation: "top left"

        });
      });
    </script>
</body>
</html>
