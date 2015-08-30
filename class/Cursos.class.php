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
      $sql = "INSERT INTO cursos (nome, texto, logo)
              VALUES ('$this->nome', '$this->texto', '$this->logo')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql = "SELECT * FROM cursos Order by cursos.id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object = new Cursos();
         $object->id = $reg["id"];
         $object->nome = $reg["nome"];

         $return[] = $object;
      }

      return $return;

    }

    public function Excluir()
    {
      $sql = "DELETE from cursos where id=$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function Atualizar()
    {
      $return = false;
      $sql = "UPDATE cursos
                set nome='$this->nome',
                    texto='$this->texto',
                    logo='$this->logo'
                where id=$this->id";
      $return = pg_query($sql);

      return $return;
    }

    public function Editar($id = "")
    {
      $sql = "SELECT * FROM cursos c WHERE c.id=$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object = new Cursos();
         $object->id = $reg["id"];
         $object->nome = $reg["nome"];
         $object->texto = $reg["texto"];
         $object->logo = $reg["logo"];

         $return = $object;
      }

      return $return;
    }

    public function Exibir($id = "")
    {
      $sql = "SELECT * FROM cursos c WHERE c.id=$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object = new Cursos();
         $object->id = $reg["id"];
         $object->nome = $reg["nome"];
         $object->texto = $reg["texto"];
         $object->logo = $reg["logo"];

         $return = $object;
      }

      return $return;
    }

    public function cursoSelect($id ="")
    {
       $sql = "SELECT * from cursos Order by id";
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
          $this->nome = $a['nome'];

          if ($id==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->nome}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->nome}</option>";
          }
        }
      }
    }

}
?>
