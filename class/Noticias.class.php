<?php

include_once 'Carrega.class.php';

/**
 *
 */
class Noticias
{
   private $cod;
   private $title;
   private $text;
   private $cat;
   private $data;
   private $type;
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

      public function inserir()
      {
         $sql="";
         $return = pg_query($sql);
         return $return;
      }

      public function listar()
      {
         $sql="SELECT * FROM noticias Order by news_dateon";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Noticias();
            $obj->cod = $reg["news_id"];
            $obj->title = $reg["news_title"];
            $obj->text = $reg["news_text"];
            $obj->data = $reg["news_dateon"];
            $obj->type = $reg["typeuser"];

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
