<?php

  include_once "../class/Carrega.class.php";

?>

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
                        <br>
                           <span title="The tooltip" data-toggle="tooltip" data-placement="bottom">
                              <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i>Selecionar curso</button>
                           </span>
                        <br>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form class="" action="ViewMonitoriasObj.php" method="post">
                                     <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title" id="myModalLabel">Selecione o curso para filtrar as monitorias</h4>
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-group">
                                           <label for="curso">Curso:</label>
                                           <select class="form-control"  name="curso" id="curso">
                                             <option value="">Selecione o curso</option>
                                             <?php $cursoSelect = new Select();
                                                   $cursoSelect->cursoSelect();
                                             ?>
                                           </select>
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                        <button type="submit" name="pesquisar" value="pesquisar" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"></i>Pesquisar monitorias</button>

                                     </div>
                                    </form>
                                  </div>
                                  <!-- /.modal-content -->
                             </div>
                             <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
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

    <script type="text/javascript">
    // tooltip
    $( document ).ready(function()
    {
      $('[data-toggle="tooltip"]').tooltip({{'placement': 'bottom'}});
    });
    </script>

    <script type="text/javascript">
    $(window).load(function()
    {
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
