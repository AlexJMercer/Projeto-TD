<?php

include "BD.class.php";

  class Cardapios
  {
    private $id;
    private $dia;
    private $data;
    private $alimento;
    private $bd;

      public function __construct()
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

      public function inserir()
      {


        $this->transacao("BEGIN");

        $sql = "INSERT INTO cardapios (dia, data) VALUES ('$this->dia', '$this->data')";
        $return = pg_query($sql);


          if($return)
          {

            $count = count($this->alimento);

            $sql_id_card= "SELECT CURRVAL('cardapios_id_seq')";
            $last = pg_query($sql_id_card);
            $idcard = pg_fetch_array($last);

            $this->id = $idcard[0];

            foreach ($this->alimento as $value)
            {

              $sql2 = "INSERT INTO alimentos_cardapios (id_card, id_ali) VALUES ('$this->id', '$value')";
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
         $sql = "SELECT * FROM cardapios c, dia d WHERE c.dia=d.id ORDER BY c.id";
         $result = pg_query($sql);
         $retorno = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Cardapios();
            $obj->id = $reg["id"];
            $obj->dia = $reg["dia"];
            $obj->data = $reg["data"];

            $retorno[] = $obj;
         }
        return $retorno;
      }

      public function excluir()
      {
         $sql = "DELETE from $this->tabel where id=$this->id";
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function atualizar()
      {
         $retorno = false;
         $sql = "UPDATE $this->tabel
                  set dia='$this->dia',
                      data='$this->data',
                      card_text='$this->alimento'
                  where id=$this->id";

         $retorno = pg_query($sql);
         return $retorno;
      }

      public function editar($d = "")
      {
        $sql = "SELECT * FROM cardapios, dia WHERE cardapios.dia=dia.id AND cardapios.id=$id ";
        $result = pg_query($sql);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj = new Cardapios();
           $obj->id = $reg["id"];
           $obj->dia = $reg["dia"];
           $obj->data = $reg["data"];
           $obj->alimento = $reg["card_text"];

           $retorno = $obj;
        }
        return $retorno;
      }


      public function exibir($id = "")
      {
        $sql = "SELECT * FROM cardapios, dia WHERE cardapios.dia=dia.id AND cardapios.id=$id ";
        $result = pg_query($sql);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj = new Cardapios();
           $obj->id = $reg["id"];
           $obj->dia = $reg["dia"];
           $obj->data = $reg["data"];
           $obj->alimento = $reg["card_text"];

           $retorno = $obj;
        }
        return $retorno;
      }
   }
?>
