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
<div class="form-group">
   <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
   <div class="col-sm-10">
      <div class="input-group input-group-sm">
        <input type="text" class="form-control" name="categoria" placeholder="Digite a categoria aqui" required>
        <span class="input-group-btn">
         <button class="btn btn-info btn-flat" type="submit" name="cadastrar" value="cadastrar"> Cadastrar </button>
        </span>
      </div>
   </div>
</div>
<div id="resposta"></div> <br/>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#formteste').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax(
         {
				type: "POST",
				url: "../Categoria/cadCategoria.php",
				data: dados,
            success: function (data)
            {
               jQuery('#resposta').html(data);

               atualiza();

               function atualiza()
               {
                  jQuery.get('../Categoria/listagem_categoria.php', function (resultado){
                     jQuery('#listagemCategorias').html(resultado);
                  })
               }
            }
         });
         return false;
      });
   });
</script>
