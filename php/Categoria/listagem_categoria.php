<?php
include_once "../../class/Carrega.class.php";
?>

<label for="categoria" class="col-sm-2 control-label">Categorias da noticia:</label>
  <div class="col-sm-8">
   <select class="form-control select2" id="categoria" name="categoria[]" multiple="multiple" placeholder="Selecione a(s) categoria(s)" required>
      <option value=""></option>
      <?php
        $catSelect = new Select();
        $catSelect->categoriaMultiSelected();
      ?>
   </select>
  </div>
