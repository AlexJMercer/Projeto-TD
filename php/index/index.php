<?php

include_once "../../class/Carrega.class.php";
/*ini_set('session.save_path', '../tmp');
//ob_start();
session_start();

if(empty($_SESSION['email']) && empty($_SESSION['tipo_usuario']) && empty($_SESSION['nome']) && empty($_SESSION['id']))
{
   header('Location:login_page.php?notlogged');
   exit;
}*/

include "../Session.php";

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
    <!--Font Awesome-->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css">
    <!--Ionicons-->
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/skin-green-light.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      a {
          color: #000000;
        }
      a:hover {
                color: #3c8dbc;
                font-weight: bold;
              }
    </style>
  </head>
  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
      <?php
            include '../inc/topotime.html';
            include '../inc/menutime.php';
      ?>
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Página Inicial
            <small>Em construção!!!</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <?php
              print_r($_SESSION);
            ?>
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Cardápios</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cutlery"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para cardápios <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Monitorias</p>
                </div>
                <div class="icon">
                  <i class="fa fa-laptop"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para monitorias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
            <!--Bloco-->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $teste = new Noticias();
                  ?>
                  <h3><?php echo $teste->numNoticias(); ?></h3>
                  <p>Notícias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!--Fim do Bloco-->
          </div>
        </section>
      </div><!-- /.content-wrapper -->
      <?php
        include '../inc/footer.html';
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

  </body>
</html>
