<?php

  include_once 'Carrega.class.php';


  class Cursos
  {
    private $id;
    private $nome;
    private $texto;
    private $instituto;
    private $logo;
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

    public function Inserir()
    {
      $sql    = "INSERT INTO cursos (nome, inst_id, texto, logo) VALUES ('$this->nome', '$this->instituto', '$this->texto', '$this->logo')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql    = "SELECT * FROM cursos Order by cursos.id_curso";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object       = new Cursos();
         $object->id   = $reg["id_curso"];
         $object->nome = $reg["nome"];

         $return[] = $object;
      }

      return $return;

    }

    public function Excluir()
    {
      $sql    = "DELETE from cursos where id_curso =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function Atualizar()
    {
      $sql    = "UPDATE cursos set nome ='$this->nome', instituto='$this->instituto', texto ='$this->texto', logo ='$this->logo' where id_curso =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function Editar($id = "")
    {
      $sql    = "SELECT * FROM cursos c WHERE c.id_curso =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object            = new Cursos();
         $object->id        = $reg["id_curso"];
         $object->nome      = $reg["nome"];
         $object->instituto = $reg['inst_id'];
         $object->texto     = $reg["texto"];
         $object->logo      = $reg["logo"];

         $return = $object;
      }
      return $return;
    }

    public function Exibir($id = "")
    {
      $sql    = "SELECT * FROM cursos c WHERE c.id_curso =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object            = new Cursos();
         $object->id        = $reg["id_curso"];
         $object->nome      = $reg["nome"];
         $object->instituto = $reg['instituto'];
         $object->texto     = $reg["texto"];
         $object->logo      = $reg["logo"];

         $return = $object;
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
