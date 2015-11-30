<?php

include_once "../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object = new Usuarios();
      $object->nome = $_POST['nome'];
      $object->email = $_POST['email'];
      $object->senha = sha1($_POST['senha']);
      $object->type = $_POST['type'];
      $object->login = $_POST['login'];

      $object->inserir();

      echo "<meta http-equiv='refresh' content='0;url=UserObj.php'";
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
                    <h1 class="page-header">Usuários</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulário de cadastro de usuários
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="caduser" method="post" action="<?php $SELF_PHP;?>">
                                       <div class="form-group">
                                          <label for="nome"> Nome: </label>
                                          <input class="form-control" id="nome" name="nome" placeholder="Digite aqui seu nome" required>

                                       </div>
                                       <div class="form-group">
                                             <label for="email"> E-mail: </label>
                                                 <input class="form-control"
                                                  id="email" name="email" placeholder="Digite aqui seu e-mail" required>

                                       </div>
                                       <div class="form-group">
                                             <label for="senha">Senha:</label>
                                                 <input class="form-control"
                                                 type="password" id="senha" name="senha" placeholder="Digite aqui sua senha" required>

                                       </div>
                                       <div class="form-group">
                                          <label for="type">Tipo de usuário:</label>
                                          <select class="form-control" name="type" id="type" required>
                                              <option value="">Selecione tipo</option>
                                              <?php $typeSelect = new Type();
                                                    $typeSelect->typeSelect();
                                              ?>
                                          </select>

                                       </div>
                                       <div class="form-group">
                                          <label for="login"> Login:</label>
                                             <input class="form-control" id="login" name="login" placeholder="Digite aqui seu login" required>

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

</body>
</html>
