<!--div class="form-group">
  <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
  <div class="col-sm-10">
   <input type="text" class="form-control" name="categoria" placeholder="Digite o categoria aqui" autofocus required>
  </div>
</div>
<div class="input-group input-group-sm">
  <input type="text" class="form-control">
  <span class="input-group-btn">
   <button class="btn btn-info btn-flat" type="button">Go!</button>
  </span>
</div--><!-- /input-group -->
<form id="formcat">
<div class="form-group">
   <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
   <div class="col-sm-8">
        <input type="text" class="form-control" name="new" placeholder="Digite a categoria aqui" autofocus required>
   </div>
   <div class="col-sm-2">
      <button class="btn btn-success btn-flat" type="submit" name="cadastrar" id="cadastrar" value="cadastrar" style="width:100%;"><i class="fa fa-check"></i> Cadastrar </button>
   </div>
</div>
</form>
<div id="resposta"></div> <br/>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#formcat').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax(
         {
				type: "POST",
				url: "cadCategoria.php",
				data: dados,
            success: function (data)
            {
               jQuery('#resposta').html(data);

               atualiza();

               function atualiza()
               {
                  jQuery.get('#listagemCategorias', function (resultado){
                    jQuery("#listagemCategorias").load(location.href + " #listagemCategorias");
                  })
               }
            }
         });
         return false;
      });
   });
</script>
