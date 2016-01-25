<?php

  include_once 'Carrega.class.php';

   class Alimentos
   {
      private $id;
      private $alimento;
      private $bd;


      function __construct()
      {
         $this->bd = new BD();
      }

      function __destruct()
      {
        unset($this->bd);
      }

      function __get($key)
      {
        return $this->$key;
      }

      function __set($key, $value)
      {
        $this->$key = $value;
      }

      public function inserir()
      {
        $sql    = "INSERT INTO alimentos (alimento) VALUES ('$this->alimento')";
        $return = pg_query($sql);

        return $return;
      }

      function listar()
      {
         $sql              = "SELECT * from alimentos Order by id";
         $result           = pg_query($sql);

         while ($reg       = pg_fetch_assoc($result))
         {
            $obj           = new Alimentos();
            $obj->id       = $reg["id"];
            $obj->alimento = $reg["alimento"];

            $return[]      = $obj;
         }
         return $return;
      }

      public function excluir()
      {
         $sql    = "DELETE from alimentos where id =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {

         $sql    = "UPDATE alimentos set alimento ='$this->alimento' where id =$this->id";
         $return = pg_query($sql);

         return $return;
      }

      public function editar($id = "")
      {
        $sql    = "SELECT * FROM alimentos WHERE alimentos.id =$id";
        $result = pg_query($sql);
        $return = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj           = new Alimentos();
           $obj->id       = $reg["id"];
           $obj->alimento = $reg["alimento"];

           $return = $obj;
        }
        return $return;
      }

      public function alimentoSelect($alimento ="")
      {
         $sql = "SELECT * from alimentos as a where a.id= ";
         $result = pg_query($sql);

         $ln=pg_num_rows($result);

         if ($ln==0)
         {
            echo "<option value=''>Nada Encontrado!!</option>";
         }
         else
         {
           while ($a = pg_fetch_array($result))
           {
            $this->id = $a['id'];
            $this->alimento = $a['alimento'];

            foreach ($alimento as $key)
            {

               if ($key==$this->id)
               {
                 print "<option selected value='{$this->id}'>{$this->alimento}</option>";
               }

            }
            echo "<option value='{$this->id}'>{$this->alimento}</option>";
          }
        }
      }


      public function alimentoMulti($alimento ="")
      {
         $sql = "SELECT * from alimentos";
         $result = pg_query($sql);

         $ln=pg_num_rows($result);

         if ($ln==0)
         {
            echo "<option value=''>Nada Encontrado!!</option>";
         }
         else
         {
            while ($a = pg_fetch_array($result))
            {
              $this->id = $a['id'];
              $this->alimento = $a['alimento'];
              //$count=count($a);

              foreach ($alimento as $key)
              {
                if ($key==$this->id)
                {
                  print "<option selected value='{$this->id}'>{$this->alimento}</option>";
                }
              }
            }
          }
        }

}
?>
