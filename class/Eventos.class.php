<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Eventos
  {
    private $id;
    private $nome;
    private $texto;
    private $categorias;
    private $data;
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
      $sql = "";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql = "";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object = new Disciplinas();
        $object->id = $reg[""];
        $object->nome = $reg[""];
        $object->texto = $reg[""];
        $object->categoria = $reg[""];
        $object->data = $reg[""];

        $return[] = $object;
      }
      return $return;
    }

    public function Atualizar()
    {
      $return = false;
      $sql = "UPDATE
                set ,

                where ";

      $return = pg_query($sql);

      return $return;
    }

    public function Excluir($id='')
    {
      $sql = "DELETE from  where ";
      $return = pg_query($sql);
      return $return;
    }

    public function Editar($value='')
    {
      $sql = "";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object = new Disciplinas();
        $object->id = $reg[""];
        $object->nome = $reg[""];
        $object->texto = $reg[""];
        $object->categoria = $reg[""];
        $object->data = $reg[""];

        $return[] = $object;
      }
      return $return;
    }

  }

?>
