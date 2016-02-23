<?php

  include_once 'Carrega.class.php';

   class Categorias
   {
      private $id;
      private $categoria;
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
        $sql    = "INSERT INTO categorias (categoria) VALUES ('$this->categoria')";
        $return = pg_query($sql);

        if($return)
        {

          return true;
        }
        else
        {
           
          return false;
        }
      }

      function listar()
      {
         $sql    = "SELECT * from categorias Order by id";
         $result = pg_query($sql);

         while ($reg = pg_fetch_assoc($result))
         {
            $obj            = new Categorias();
            $obj->id        = $reg["id"];
            $obj->categoria = $reg["categoria"];

            $return[]       = $obj;
         }
         return $return;
      }

      public function excluir()
      {
         $sql    = "DELETE from categorias where id =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $sql    = "UPDATE categorias set categoria ='$this->categoria' where id =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function editar($id = "")
      {
        $sql    = "SELECT * FROM categorias WHERE categorias.id =$id ";
        $result = pg_query($sql);
        $return = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj            = new Categorias();
           $obj->id        = $reg["id"];
           $obj->categoria = $reg["categoria"];

           $return = $obj;
        }
        return $return;
      }

      public function categoriaSelect($categoria ="")
      {
         $sql    = "SELECT * from categoria Order by id";
         $result = pg_query($sql);

         $ln     =pg_num_rows($result);

        if ($ln==0)
        {
           echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {
          while ($a = pg_fetch_array($result))
          {
            $this->id        = $a['id'];
            $this->categoria = $a['categoria'];

            if ($categoria==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->categoria}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->categoria}</option>";
            }
          }
        }
      }
   }
?>
