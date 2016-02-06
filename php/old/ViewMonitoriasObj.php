<!DOCTYPE html>
<html lang="pt-br">
<!-- Editado por Julian 23/07/2015 -->
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

    <!-- Social Buttons CSS -->
    <link href="../bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                            Listagem de monitorias
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                            <div class="dataTable_wrapper">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Disciplina</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

include_once "../class/Carrega.class.php";

$curso = $_POST["curso"];

  if (isset($_POST['pesquisar']) || isset($_POST['retornar']))
  {

    $listar = new Monitorias();
    $list = $listar->ListarEspecify($curso);

    if ($list != null)
    {
      foreach ($list as $line)
      {
?>
                            <tr class="odd gradeX">
                              <form name="view" class="" action="EditMonitoriasObj.php" method="post">
                                <td><?php echo $line->disciplina; ?></td>
                                <td class='center'>
                                  <input type='hidden' name='id' value='<?php echo $line->id; ?>'>
                                  <input type="hidden" name="curso" value="<?php echo $curso;?>">
                                  <button type="submit" name="exibir" value="exibir" formaction="ExibMonitoriaObj.php" class="btn btn-outline btn-info"><i class="fa fa-edit"></i> Exibir </button>

                                  <button type="submit" name="editar" value="editar" class="btn btn-outline btn-warning"><i class="fa fa-edit"></i> Editar </button>

                                  <button type="submit" name="excluir" value="excluir" formaction="CrudMonitorias.php" class='btn btn-outline btn-danger'><i class="fa fa-times"></i> Excluir </button>
                                  </td>
                              </form>
                            </tr>
<?php
        }
      }
      else
      {
        echo "<h2> Nada Aqui!!</h2>";
      }
    }
?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <!-- /.table-responsive -->
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    $("#exibir").click(function () {
    // get needed html
    $.get("modalExibMonitoria.php", function (result) {
        // append response to body
        $('body').append(result);
        // open modal
        $('#myModal2').modal();

    });
  });
    </script>
</body>
</html>