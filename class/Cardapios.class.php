<?php

include "BD.class.php";

  class Cardapios
  {
    private $cod;
    private $dia;
    private $data;
    private $texto;
    private $bd;
    private $tabel;

      public function __construct()
      {
         $this->bd = new BD();
         $this->tabel = "cardapios";
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
         $sql = "INSERT INTO $this->tabel (card_day, card_date, card_text)
                 VALUES ('$this->dia', '$this->data', '$this->texto') ";
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function listar()
      {
         $sql = "SELECT * FROM cardapios, dia WHERE cardapios.card_day=dia.id ORDER BY cardapios.card_id";
         $result = pg_query($sql);
         $retorno = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Cardapios();
            $obj->cod = $reg["card_id"];
            $obj->dia = $reg["dia"];
            $obj->data = $reg["card_date"];
            $obj->texto = $reg["card_text"];

            $retorno[] = $obj;
         }
        return $retorno;
      }

      public function excluir()
      {
         $sql = "DELETE from $this->tabel where card_id=$this->cod";
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function atualizar()
      {
         $retorno = false;
         $sql = "UPDATE $this->tabel
                  set card_day='$this->dia',
                      card_date='$this->data',
                      card_text='$this->texto'
                  where card_id=$this->cod";

         $retorno = pg_query($sql);
         return $retorno;
      }

      public function editar($cod = "")
      {
        $sql = "SELECT * FROM cardapios, dia WHERE cardapios.card_day=dia.id AND cardapios.card_id=$cod ";
        $result = pg_query($sql);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj = new Cardapios();
           $obj->cod = $reg["card_id"];
           $obj->dia = $reg["card_day"];
           $obj->data = $reg["card_date"];
           $obj->texto = $reg["card_text"];

           $retorno = $obj;
        }
        return $retorno;
      }


      public function exibir($cod = "")
      {
        $sql = "SELECT * FROM cardapios, dia WHERE cardapios.card_day=dia.id AND cardapios.card_id=$cod ";
        $result = pg_query($sql);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj = new Cardapios();
           $obj->cod = $reg["card_id"];
           $obj->dia = $reg["dia"];
           $obj->data = $reg["card_date"];
           $obj->texto = $reg["card_text"];

           $retorno = $obj;
        }
        return $retorno;
      }
   }
?>
