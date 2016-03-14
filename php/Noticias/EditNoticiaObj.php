<?php

include_once "../../class/Carrega.class.php";
date_default_timezone_set('America/Sao_Paulo');

/*session_start();

if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['tipo']) && empty($_SESSION['nome']))
{
   header('Location:../login.php');
   exit;
}*/


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
    <!--FileInput-->
    <link rel="stylesheet" href="../../plugins/fileinput/css/fileinput.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!--style type="text/css">
      input[type=file]
      {
        border: none;
      }
    </style-->

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
                <?php

                  $id = $_POST["id"];

                  if (isset($_POST["editar"]))
                  {
                    $edit = new Noticias();
                    $comp = $edit->editar($id);
                    //print_r($comp);
                    //var_dump($comp);
                      if ($edit != null)
                      {
                ?>
                <!-- form start -->
                <form class="form-horizontal" id="form" method="post" action="CrudNoticias.php" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label"> Autor: </label>
                        <div class="col-sm-10">
                           <input type="text" value="Mercer" class="form-control" disabled>
                           <input type="hidden" name="autor" value="<?php echo $comp->autor; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="data" class="col-sm-2 control-label">Data:</label>
                        <div class="col-sm-5">
                          <input type="text" name="data" value="<?php echo date('d/m/Y'); ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                        <label for="hora" class="col-sm-1 control-label">Hora:</label>
                        <div class="col-sm-4 pull-right">
                          <input type="text" name="hora" value="<?php echo date('H:i');?>" class="form-control pull-right">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o título aqui" value="<?php echo $comp->titulo; ?>" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="linha" class="col-sm-2 control-label">Linha de apoio:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="linha_apoio" id="linha" rows="2" cols="40"><?php echo $comp->linha_apoio; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="status" id="status" required>
                            <option value=""></option>
                            <?php
                                $staSelect = new Select();
                                $staSelect->statusSelect($comp->status);
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="categoria" class="col-sm-2 control-label">Categorias da noticia:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" id="categoria" name="categoria[]" multiple="multiple" placeholder="Selecione a(s) categoria(s)">
                            <option value=""></option>
                            <?php
                              $catSelected = new Select();
                              $catSelected->categoriaMultiSelected($comp->categoria);
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL do site:</label>
                        <div class="col-sm-10">
                          <input type="text" class='form-control' name="url" id='url' value="<?php echo $comp->url; ?>" placeholder="Coloque aqui o link da noticia do website">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="noticia" class="col-sm-2 control-label">Noticia:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  name="noticia" id="noticia" rows="16" cols="40" required><?php echo $comp->texto; ?></textarea>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="imagem" class="col-sm-2 control-label">Adicionar imagem:</label>
                        <div class="col-sm-10">
                              <input class="file" type="file" id="imagem" name="imagem" data-show-upload="false" data-min-file-count="0"/>
                        </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="id" value="<?php echo $comp->id; ?>"/>
                    <button type="submit" name="atualizar" value="atualizar" class="btn btn-success btn-flat btn-block"><i class="fa fa-check"></i> Atualizar </button>
                    <br>
                    <button type="button" name="cancelar" value="cancelar" onclick="location.href='ViewNoticiasObj.php'" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-times"></i> Cancelar </button>
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
        //include '../inc/control-sidebar.html';
      ?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!--FileInput-->
    <script src="../../plugins/fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../../plugins/fileinput/js/fileinput_locale_pt-BR.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>


    <script type="text/javascript">

    $(function(){

      $("#status").select2({
        placeholder:"Selecione o status"
      });

      $("#categoria").select2({
        placeholder:"Selecione a(s) categoria(s)"
      });

      $("#scategoria").select2();

      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      //Money Euro
      $("[data-mask]").inputmask();

      //Timepicker
      $(".timepicker").timepicker({
        showInputs: false,
        showMeridian: false
      });

      CKEDITOR.replace('noticia');
});

    </script>

    <?php
        if ($comp->imagem != null)
        {
          $show = $comp->imagem;
        }
        else
        {
          $show = "../../dist/img/nadaCadastrado.png";
        }
    ?>

    <script type="text/javascript">

            $('.file').fileinput({
              initialPreview: [
                '<img src="<?php echo $show; ?>" class="file-preview-image">'
              ],
                browseClass: "btn btn-info btn-flat btn-block",
                showCaption: false,
                showRemove: false,
                showUpload: false,
                language: 'pt-BR',
                overwriteInitial: true,
                allowedFileExtensions : ['jpg', 'png','gif']
            });

    </script>
  </body>
</html>
<?php
    }
  }
?>
