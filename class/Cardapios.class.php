<?php

include_once "Carrega.class.php";

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

      public function Inserir()
      {

        $this->transacao("BEGIN");

        $sql = "INSERT INTO cardapios (dia, data) VALUES ('$this->dia', '$this->data')";
        $return = pg_query($sql);

          if($return)
          {

            //$count = count($this->alimento);

            $sql_id_card= "SELECT CURRVAL('cardapios_id_seq')";
            $last = pg_query($sql_id_card);
            $idcard = pg_fetch_array($last);

            $this->id = $idcard[0];

            foreach ($this->alimento as $value)
            {

              $sql2 = "INSERT INTO alimentos_cardapios (id_cad, id_ali) VALUES ('$this->id', '$value')";
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

      public function Listar()
      {
         $sql = "SELECT * FROM cardapios c, dia d WHERE d.id_dia=c.dia ORDER BY d.id_dia";
         $result = pg_query($sql);
         $retorno = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Cardapios();
            $obj->id = $reg["id_card"];
            $obj->dia = $reg["dia"];
            $obj->data = $reg["data"];

            $retorno[] = $obj;
         }
        return $retorno;
      }

      public function Excluir()
      {
         $sql = "DELETE from cardapios where id_card=$this->id";
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function Editar($id = "")
      {
         $sql = "SELECT * FROM cardapios c JOIN dia d ON d.id_dia=c.dia
                                           JOIN alimentos_cardapios ac ON ac.id_cad=c.id_card
                                           WHERE ac.id_cad=$id";
         $sql2 = "SELECT a.id FROM alimentos a, alimentos_cardapios ac WHERE
                                       ac.id_cad = $id AND a.id = ac.id_ali";

        $result = pg_query($sql);
        $result2 = pg_query($sql2);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj = new Cardapios();
           $obj->id = $reg["id_card"];
           $obj->dia = $reg["id_dia"];
           $obj->data = $reg["data"];

           foreach (pg_fetch_assoc($result2) as $value)
           {
              $temp[] = $value;

           }
          $obj->alimento = $temp;

           $retorno = $obj;
        }
        return $retorno;
      }


      public function exibir($id = "")
      {
        //Não adaptado as alterações recentes
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
