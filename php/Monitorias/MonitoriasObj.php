<?php

include_once "../../class/Carrega.class.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <?php include '../inc/topotime.html';

            include '../inc/menutime.php';

      ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Monitorias</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de monitorias</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="form-horizontal" name="cadmonitorias" id="form" method="post" action="CrudMonitorias.php">
                  <div class="box-body">
                     <div class="form-group">
                        <label for="curso" class="control-label col-sm-2">Curso:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" id="curso" name="curso" style="width: 100%;">
                            <option value=""></option>
                            <?php $cursoSelect = new Select();
                                  $cursoSelect->cursoSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="disciplina">Disciplina:</label>
                        <div class="col-sm-10">
                          <span class="carregando">Aguarde, carregando...</span>
                           <select class="form-control select2" name="disciplina" id="disciplina" required>
                              <option value=""></option>
                           </select>
                        </div>
                        </div>
                      <div class="form-group">
                           <label for="semestre" class="col-sm-2 control-label">Semestre:</label>
                           <div class="col-sm-10">
                            <select class="form-control select2" name="semestre" id="semestre" style="width: 100%;">
                              <option value=""></option>
                              <?php $semestreSelect = new Select();
                                    $semestreSelect->semestreSelect();
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                           <label for="sala" class="col-sm-2 control-label">Sala:</label>
                           <div class="col-sm-10">
                              <select class="form-control select2" name="sala" id="sala" style="width: 100%;">
                                 <option value=""></option>
                                 <?php $localSelect = new Select();
                                       $localSelect->localSelect();
                                 ?>
                             </select>
                           </div>
                         </div>
                        <div class="form-group">
                           <label for="info" class="col-sm-2 control-label">Informações adicionais:</label>
                           <div class="col-sm-10">
                              <textarea class="form-control" name="info" rows="6" placeholder="Digite aqui..."></textarea>
                           </div>
                        </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-flat btn-block">Enviar</button>
                    <br>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm ">Limpar</button>

                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
        include '../inc/footer.html';
        include '../inc/control-sidebar.html';
      ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript">
    $(function()
    {
      $(".select2").select2();

      $('#curso').change(function()
      {
        if( $(this).val() )
        {
          $('#disciplina').hide();
          $('.carregando').show();
          $.getJSON('disciplina.ajax.php',{curso: $(this).val(), ajax: 'true'}, function(j)
          {
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
