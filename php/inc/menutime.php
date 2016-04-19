<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/LogoIFSP.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Teste</p>
        <h6><i class="fa fa-circle text-success"></i> Administrador </h6>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <?php

          if($_SESSION['tipo_usuario']==3)
          {
            include '/admin/menuadmin.html';
          }
          elseif($_SESSION['tipo_usuario']==2)
          {
            $object = new Permissions();
            $pages  = $object->loadPermissions($_SESSION['id']);

            if ($object != null)
            {
              if ($pages->noticias)
              {
                include '/editor/noticias';
              }
              echo $pages->id;
              echo "<br>";
              echo $pages->noticias;
              echo "<br>";
              echo $pages->cardapios;
              echo "<br>";
              echo $pages->cursos;
            }
            else
            {
              echo "<li>Falha no carregamento!!</li>";
            }
          }
          else
          {
            include '/autor/menubasic.html';
          }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
