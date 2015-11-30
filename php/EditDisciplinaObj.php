<?php

 include_once "../class/Carrega.class.php";

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../plugins/select2/select2.css">
    <link rel="stylesheet" href="../plugins/select2/select2-bootstrap.css">

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
                    <h1 class="page-header">Cardápios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulário de edição de cardápios
                        </div>

<?php

  $id = $_POST["id"];

  if (isset($_POST["editar"]))
  {

    $edit = new Disciplinas();
    $comp = $edit->editar($id);

      if ($edit != null)
      {
?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <form role="form" name="caddisciplina" method="post" action="<?php $SELF_PHP;?>">
                                    <div class="form-group">
                                        <label for="disciplina">Disciplina:</label>
                                        <input type="text" class="form-control" id="disciplina" name="disciplina" placeholder="Digite a disciplina aqui" value="<?php echo $comp->disciplina; ?>" autofocus required>
                                    </div>
                                    <div class="form-group">
                                      <label for="curso">Curso:</label>
                                      <select class="form-control select2"  name="curso" id="curso">
                                        <option value="">Selecione o cursos</option>
                                        <?php $cursoSelect = new Cursos();
                                              $cursoSelect->cursoSelect($comp->curso);
                                        ?>
                                      </select>
                                    </div>

                                      <br>
                                      <input type="hidden" name="cod" value="<?php echo $comp->id; ?>">
                                      <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> Enviar </button>
                                      <br>
                                      <button type="reset" name="limpar" value="limpar" class="btn btn-outline btn-danger btn-lg btn-block"><i class="fa fa-magic"></i> Limpar </button>

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

    <?php
          }
        }
    ?>
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

    <script type="text/javascript" src="../plugins/select2/select2.js"></script>
    <script type="text/javascript">
    $( ".select2" ).select2({
      theme: "bootstrap"
    });
    </script>

    <script>
      $(document).ready(function () {
        $('#datepicker').datepicker({
            language: "pt-BR",
            format: "dd/mm/yyyy",
            orientation: "top right"
        });
      });
    </script>

    <script src="../utilities/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../utilities/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

</body>
</html>
