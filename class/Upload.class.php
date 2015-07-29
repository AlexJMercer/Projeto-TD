<?php

   /**
    *
    */
   class Upload
   {
      private $name;
      private $pasta;
      private $nome_substituto;
      private $permite;

      public function uploadImagem($name_imagem,$pasta_destino,$nome_principal,$tipo_imagem)
      {
         if(!empty($_FILES[$name_imagem][''tmp_name'']))
         {
		         $tipo_permitido = explode(",", $tipo_imagem);

               $this->name = $_FILES[$name_imagem];
               $this->pasta = $pasta_destino;
               $nome = $this->name[''name''];
               $extensao = end(explode(".",$this->name[''name'']));
               $this->nome_substituto = $nome_principal;
               $upload_arquivo = $this->pasta.$this->nome_substituto.".".$extensao;

               foreach ($tipo_permitido as $key => $tipo)
               {
                  $this->permite[] = $tipo;
               }



         }
      }
   }


 ?>
