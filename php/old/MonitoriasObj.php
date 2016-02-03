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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name="cadmonitorias" method="post" action="CrudMonitorias.php">
                                      <div class="form-group">
                                          <label for="curso">Curso:</label>
                                          <select class="form-control"  name="curso" id="curso">
                                            <option value="">Selecione o curso</option>
                                            <?php $cursoSelect = new Select();
                                                  $cursoSelect->cursoSelect();
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="disciplina">Disciplina:</label>
                                          <span class="carregando">Aguarde, carregando...</span>
                                          <select class="form-control" name="disciplina" id="disciplina">
                                            <option value="">Selecione a disciplina</option>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="semestre">Semestre:</label>
                                          <select class="form-control"  name="semestre" id="semestre">
                                            <option value="">Selecione o semestre</option>
                                            <?php $semestreSelect = new Select();
                                                  $semestreSelect->semestreSelect();
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="sala">Sala:</label>
                                          <select class="form-control"  name="sala" id="sala">
                                            <option value="">Selecione o sala</option>
                                            <?php $localSelect = new Select();
                                                  $localSelect->localSelect();
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="info">Informações adicionais:</label>
                                        <textarea class="form-control" name="info" rows="4" placeholder="Digite as informações aqui"></textarea>
                                      </div>
                                        <br>
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
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
    $(function(){
      $('#curso').change(function(){
        if( $(this).val() )
        {
          $('#disciplina').hide();
          $('.carregando').show();
          $.getJSON('disciplina.ajax.php',{curso: $(this).val(), ajax: 'true'}, function(j)
          {
            //var vehicle = $('#vehicle');
            var options = '<option value=""></option>';
            for (var i = 0; i < j.length; i++)
            {
              options += '<option value="' + j[i].id_disc + '">' + j[i].disciplina + '</option>';
            }
            $('#disciplina').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#disciplina').html('<option value="">Nada encontrado !!</option>');
        }
});
});
    </script>

</body>
</html>
