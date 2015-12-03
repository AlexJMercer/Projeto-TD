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
    <style type="text/css">
    .carregando
    {
      color:#666;
      display:none;
    }
    </style>

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
                    <h1 class="page-header">Monitorias</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulário de cadastro de Monitorias
                        </div>
<?php

$id = $_POST["id"];

   if (isset($_POST["editar"]))
   {
      $edit = new Monitorias();
      $comp = $edit->Editar($id);

      if ($edit != null)
      {

?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name="cadmonitorias" method="post" action="CrudMonitorias.php">
                                      <div class="form-group">
                                          <label>Curso:</label>
                                          <p class="form-control-static"><?php echo $comp->curso; ?></p>
                                      </div>
                                      <div class="form-group">
                                          <label>Disciplina:</label>
                                          <p class="form-control-static"> <?php echo $comp->disciplina; ?></p>
                                      </div>
                                      <div class="form-group">
                                          <label for="semestre">Semestre:</label>
                                          <select class="form-control"  name="semestre" id="semestre">
                                            <option value="">Selecione o semestre</option>
                                            <?php $semestreSelect = new Select();
                                                  $semestreSelect->semestreSelect($comp->semestre);
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="sala">Sala:</label>
                                          <select class="form-control"  name="sala" id="sala">
                                            <option value="">Selecione o sala</option>
                                            <?php $localSelect = new Select();
                                                  $localSelect->localSelect($comp->sala);
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="info">Informações adicionais:</label>
                                        <textarea class="form-control" name="info" rows="4" placeholder="Digite as informações aqui"><?php echo $comp->info; ?></textarea>
                                      </div>
                                        <br>
                                        <input type="hidden" name="id" value="<?php echo $comp->id; ?>">
                                        <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> Editar </button>
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

</body>
</html>
