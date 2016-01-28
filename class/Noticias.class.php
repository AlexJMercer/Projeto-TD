<?php

include_once 'Carrega.class.php';

/**
 *
 */
class Noticias
{
   private $id;
   private $titulo;
   private $resumo;
   private $noticia;
   private $categorias;
   private $status;
   private $data;
   private $image;
   private $bd;

      function __construct()
      {
         $this->bd = new BD();
      }

      public function __destruct()
      {
         unset($this->bd);
      }

      public function __get($key)
      {
         return $this->$key;
      }

      public function __set($key, $value)
      {
         $this->$key = $value;
      }

      public function transacao($valor)
      {
         $sql = $valor;
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function Inserir()
      {
         $this->transacao("BEGIN");

         $sql    = "INSERT INTO noticias (autor, titulo, resumo, status, texto) VALUES ('$this->autor', '$this->titulo', '$this->resumo', '$this->status', '$this->noticia')";
         $return = pg_query($sql);

           if($return)
           {
             $sql_id_not = "SELECT CURRVAL('noticias_id_not_seq')";
             $last       = pg_query($sql_id_not);
             $idnot      = pg_fetch_array($last);

             $this->id = $idnot[0];

             foreach ($this->categorias as $value)
             {
               $sql2    = "INSERT INTO categorias_noticias (not_id, cat_id) VALUES ('$this->id', '$value')";
               $return2 = pg_query($sql2);
             }

             if ($return2)
             {
              $this->transacao("COMMIT");
             }
             else
             {
               $this->transacao("ROLLBACK");
             }
           }
           $this->transacao("ROLLBACK");
      }

      public function listar()
      {
         $sql    ="SELECT * FROM noticias Order by id_not";
         $result = pg_query($sql);

         while ($reg = pg_fetch_assoc($result))
         {
            $obj         = new Noticias();
            $obj->id     = $reg["id_not"];
            $obj->titulo = $reg["titulo"];
            $obj->data   = $reg["data"];

            $return[] = $obj;
         }
         return $return;
      }

      public function excluir()
      {
         $sql    = "DELETE from noticia where news_id =$this->cod";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $sql    = "UPDATE noticias set news_title ='$this->title', news_dateon ='$this->data', news_text ='$this->texto', catnews_id ='$this->cat' where news_id =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function UploadImagemNoticia($image='')
      {


          // Configura as variáveis
          $imagens         = $this->image;
          $nomes_imagens   = $imagens['name'];
          $tipos_imagens   = $imagens['type'];
          $tmp_imagens     = $imagens['tmp_name'];
          $erro_imagens    = $imagens['error'];
          $tamanho_imagens = $imagens['size'];

          $sql_id_not = "SELECT CURRVAL('noticias_id_not_seq')";
          $last       = pg_query($sql_id_not);
          $idnot      = pg_fetch_array($last);

          $this->id = $idnot;

          // Os mime types permitidos
          $permitir_tipos  = array(
            'image/bmp',
            'image/x-windows-bmp',
            'image/gif',
            'image/jpeg',
            'image/pjpeg',
            'image/png',
          );

          // Verifica se a variável de erro contém um array
          if (! is_array( $erro_imagens ))
          {
            exit('Nada enviado!');
          }

          // O laço
          for ( $i = 0; $i < count( $erro_imagens ); $i++ ) {

            // Verifica se ocorreu algum erro
            if ( $erro_imagens[$i] != 0 )
            {
              // Mostra o erro
              echo 'Erro ao enviar imagem ' . $nomes_imagens[$i];

            } else
            {
              // Verifica se os mime types estão entre os permitidos
              if ( in_array( $tipos_imagens[$i], $permitir_tipos ) )
              {
                // Verifica se o arquivo foi movido com sucesso (e move)
                if ( @move_uploaded_file( $tmp_imagens[$i], '../php/Imagens/Noticias' . $nomes_imagens[$i] ) )
                {
                  // Mostra a imagem
                  //echo '<img src="imagens/' . $nomes_imagens[$i] . '" style="width: 200px; height: auto;">';
                  $sqlImg    = "INSERT INTO imagens_noticias (imagem, noticia) VALUES ('$nomes_imagens', '$this->id')";
                  $returnImg = pg_query($sqlImg);
                } else
                {
                  // Mostra o erro no envio
                  echo 'Erro ao enviar imagem!';
                }

              } else
              {
                // Mostra o erro de tipos
                echo 'Envie apenas imagens.';
              } // Fim dos tipos permitidos

            } // Fim - Verifica se ocorreu algum erro

          } // Fim - O laço
          // Fim - Verifica se algo foi enviado
      }

      public function InserirWithImage()
      {
         $this->transacao("BEGIN");

         $sql    = "INSERT INTO noticias (autor, titulo, resumo, status, texto) VALUES ('$this->autor', '$this->titulo', '$this->resumo', '$this->status', '$this->noticia')";
         $return = pg_query($sql);

           if($return)
           {
             $sql_id_not = "SELECT CURRVAL('noticias_id_not_seq')";
             $last       = pg_query($sql_id_not);
             $idnot      = pg_fetch_array($last);

             $this->id = $idnot[0];

             // Configura as variáveis
             $imagens         = $this->image;
             $nomes_imagens   = $imagens['name'];
             $tipos_imagens   = $imagens['type'];
             $tmp_imagens     = $imagens['tmp_name'];
             $erro_imagens    = $imagens['error'];
             $tamanho_imagens = $imagens['size'];

             // Os mime types permitidos
             $permitir_tipos  = array(
               'image/bmp',
               'image/x-windows-bmp',
               'image/gif',
               'image/jpeg',
               'image/pjpeg',
               'image/png',
             );

             // Verifica se a variável de erro contém um array
             if (! is_array( $erro_imagens ))
             {
               exit('Nada enviado!');
             }

             // O laço
             for ( $i = 0; $i < count( $erro_imagens ); $i++ ) {

               // Verifica se ocorreu algum erro
               if ( $erro_imagens[$i] != 0 )
               {
                 // Mostra o erro
                 echo 'Erro ao enviar imagem ' . $nomes_imagens[$i];

               } else
               {
                 // Verifica se os mime types estão entre os permitidos
                 if ( in_array( $tipos_imagens[$i], $permitir_tipos ) )
                 {
                   // Verifica se o arquivo foi movido com sucesso (e move)
                   if ( @move_uploaded_file( $tmp_imagens[$i], '../php/Imagens/Noticias' . $nomes_imagens[$i] ) )
                   {
                     // Salvar imagem no banco teste
                     //echo '<img src="imagens/' . $nomes_imagens[$i] . '" style="width: 200px; height: auto;">';
                     $sqlImg    = "INSERT INTO imagens_noticias (imagem, noticia) VALUES ('$nomes_imagens', '$this->id')";
                     $returnImg = pg_query($sqlImg);

                   } else
                   {
                     // Mostra o erro no envio
                     echo 'Erro ao enviar imagem!';
                   }

                 } else
                 {
                   // Mostra o erro de tipos
                   echo 'Envie apenas imagens.';
                 } // Fim dos tipos permitidos

               } // Fim - Verifica se ocorreu algum erro

             }
             // Fim -Verifica se algo foi enviado

             foreach ($this->categorias as $value)
             {
               $sql2    = "INSERT INTO categorias_noticias (not_id, cat_id) VALUES ('$this->id', '$value')";
               $return2 = pg_query($sql2);
             }

             if ($return2)
             {
              $this->transacao("COMMIT");
             }
             else
             {
               $this->transacao("ROLLBACK");
             }
           }
           $this->transacao("ROLLBACK");
      }



}
?>
