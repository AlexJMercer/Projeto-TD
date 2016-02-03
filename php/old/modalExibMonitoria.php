<?php

  $id = $_POST["id"];

  if (isset($_POST["exibir"]))
  {
    $exib = new Cardapios();
    $comp = $exib->ShowMonitoria($id);

      if ($exib != null)
      {

?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
          <form class="" action="ViewMonitoriasObj.php" method="post">
           <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Monitoria</h4>
           </div>
           <div class="modal-body">
              <div class="form-group">
                <h4>Curso: </h4>
                  <blockquote>
                    <p><?php echo $comp->curso; ?></p>
                  </blockquote>
                <h4>Disciplina: </h4>
                  <blockquote>
                    <p><?php echo $comp->disciplina; ?></p>
                  </blockquote>
                <h4>Semestre: </h4>
                  <blockquote>
                    <p><?php echo $comp->semestre; ?></p>
                 </blockquote>
                <h4>Local: </h4>
                  <blockquote>
                    <p><?php echo $comp->sala; ?></p>
                  </blockquote>
                <h4>Informações: </h4>
                  <blockquote>
                    <p><?php echo $comp->info; ?></p>
                  </blockquote>
             </div>
           </div>
           <div class="modal-footer">
              <button type="submit" name="pesquisar" value="pesquisar" class="btn btn-primary btn-lg btn-block">Pesquisar monitorias</button>

           </div>
          </form>
        </div>
        <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
  }
}
?>
