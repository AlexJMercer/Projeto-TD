<?php

  include_once 'Carrega.class.php';


  class Cursos
  {
    private $id;
    private $nome;
    private $texto;
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
      $sql    = "INSERT INTO cursos (nome, texto, logo) VALUES ('$this->nome', '$this->texto', '$this->logo')";
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
      $sql    = "UPDATE cursos set nome ='$this->nome', texto ='$this->texto', logo ='$this->logo' where id_curso =$this->id";
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
         $object        = new Cursos();
         $object->id    = $reg["id_curso"];
         $object->nome  = $reg["nome"];
         $object->texto = $reg["texto"];
         $object->logo  = $reg["logo"];

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
         $object        = new Cursos();
         $object->id    = $reg["id_curso"];
         $object->nome  = $reg["nome"];
         $object->texto = $reg["texto"];
         $object->logo  = $reg["logo"];

         $return = $object;
      }

      return $return;
    }

}
?>
