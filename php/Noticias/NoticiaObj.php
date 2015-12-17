<?php

include_once "../../class/Carrega.class.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker-->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Dropzone-->
    <link rel="stylesheet" href="../../plugins/dropzone/dist/dropzone.min.css">
    <!-- Dropzone-->
    <script type="text/javascript" src="../../plugins/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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

            include '../inc/menutime.html';

      ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              Noticias
              <button type="button" class="btn btn-flat pull-right" name="name" value="teste">ADD NEWS</button>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Noticias</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" id="form" method="post" action="CrudNoticias.php">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label"> Autor: </label>
                        <div class="col-sm-10">
                           <input type="text" value="Mercer" class="form-control" disabled>
                           <input type="hidden" name="autor" value="2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o título aqui" autofocus required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="resumo" class="col-sm-2 control-label">Resumo:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="resumo" id="resumo" placeholder="Digite o resumo aqui" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="status" id="status" required>
                            <option value=""></option>
                            <?php
                                $staSelect = new Select();
                                $staSelect->statusSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="categoria" class="col-sm-2 control-label">Categorias da noticia:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" id="categoria" name="categorias[]" multiple="multiple" placeholder="Selecione a(s) categoria(s)" required>
                            <option value=""></option>
                            <?php
                              $catSelect = new Select();
                              $catSelect->categoriaSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="noticia" class="col-sm-2 control-label">Noticia:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  name="noticia" id="noticia" rows="8" cols="40"></textarea>
                        </div>
                      </div>
                      <!--div class="form-group">
                        <label for="imagens" class="col-sm-2 control-label">Adicionar imagens:</label>
                        <div class="col-sm-10">

                              <input type="file" name="file" class="dropzone" multiple/>

                        </div>
                     </div-->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-lg btn-success btn-flat btn-block"><i class="fa fa-check"></i> Enviar </button>
                    <br>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
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
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <!-- date-range-picker >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script-->
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Dropzone-->
    <script type="text/javascript" src="../../plugins/dropzone/dist/min/dropzone.min.js"></script>

    <script type="text/javascript">
    $(function(){
      $("#status").select2({
        placeholder:"Selecione o status"
      });

      $("#categoria").select2({
        placeholder:"Selecione a(s) categoria(s)"
      });

      $('#tempo').daterangepicker({
        timePicker24Hour: true,
        timePicker:true,
        singleDatePicker: true,
        format: 'DD/MM/YYYY HH:mm',
        "locale": {
        "format": "DD/MM/YYYY HH:mm",
        "separator": " - ",
        "applyLabel": "OK",
        "cancelLabel": "Cancelar",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sab"
        ],
        "monthNames": [
            "Janeiro",
            "Feveireiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        "firstDay": 1
    },
      });

      CKEDITOR.replace('noticia');
    });
    </script>
  </body>
</html>
