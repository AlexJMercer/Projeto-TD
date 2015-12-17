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

         $sql = "INSERT INTO noticias (autor, titulo, resumo, status, texto) VALUES ('$this->autor', '$this->titulo', '$this->resumo', '$this->status', '$this->noticia')";
         $return = pg_query($sql);

           if($return)
           {

             //$count = count($this->alimento);

             $sql_id_not= "SELECT CURRVAL('noticias_id_not_seq')";
             $last = pg_query($sql_id_not);
             $idnot = pg_fetch_array($last);

             $this->id = $idnot[0];

             foreach ($this->categorias as $value)
             {

               $sql2 = "INSERT INTO categorias_noticias (not_id, cat_id) VALUES ('$this->id', '$value')";
               $return2 = pg_query($sql2);

             }

             /*foreach ($this->image as $value)
             {
               $sql3 = "INSERT INTO imagens_noticias (noticia, imagem) VALUES ('$this->id', '$value')";
               $return3 = pg_query($sql3);

            }*/

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
         $sql="SELECT * FROM noticias Order by id_not";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Noticias();
            $obj->id = $reg["id_not"];
            $obj->titulo = $reg["titulo"];
            $obj->data = $reg["data"];

            $return[] = $obj;
         }

         return $return;
      }

      public function excluir()
      {
         $sql = "DELETE from noticia where news_id=$this->cod";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $return = false;
         $sql = "UPDATE noticias
                  set news_title='$this->title',
                      news_dateon='$this->data',
                      news_text='$this->texto',
                      catnews_id='$this->cat'
                  where news_id=$this->cod";

         $return = pg_query($sql);
         return $return;
      }

      public function FunctionName($value='')
      {
         # code...
      }


}
?>
