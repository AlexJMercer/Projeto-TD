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

      public function InserirCategoria()
      {
        $sql    = "INSERT INTO categorias (categoria) VALUES ('$this->categoria')";
        $return = pg_query($sql);

        if($return)
        {
          return $return;
        }
      }

      function listar()
      {
         $sql    = "SELECT * from categorias Order by id_cat";
         $result = pg_query($sql);

         while ($reg = pg_fetch_assoc($result))
         {
            $obj            = new Categorias();
            $obj->id        = $reg["id_cat"];
            $obj->categoria = $reg["categoria"];

            $return[]       = $obj;
         }
         return $return;
      }

      public function excluir()
      {
         $sql    = "DELETE from categorias where id_cat =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $sql    = "UPDATE categorias set categoria ='$this->categoria' where id_cat =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function editar($id = "")
      {
        $sql    = "SELECT * FROM categorias WHERE categorias.id_cat =$id ";
        $result = pg_query($sql);
        $return = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj            = new Categorias();
           $obj->id        = $reg["id_cat"];
           $obj->categoria = $reg["categoria"];

           $return = $obj;
        }
        return $return;
      }

      public function labelCategorias($categoria = "")
      {
        $sql    = "SELECT * from categorias";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
           echo "<small class='label bg-red'>ERRO</small>";
        }
        else
        {
           while ($a = pg_fetch_assoc($result))
           {
             $this->id        = $a['id_cat'];
             $this->categoria = $a['categoria'];


            if(in_array($this->id, $categoria))
            {
              print "<small class='label bg-blue'>{$this->categoria}</small>  ";
            }
           }
         }
      }

}
?>
