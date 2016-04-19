<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Permissions
  {
    private $id;
    private $usuario;
    private $noticias;
    private $cardapios;
    private $cursos;
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

    public function InserirPermissions()
    {
      $sql       = "INSERT INTO permissaoteste (user_id, noticias, cardapios, cursos) VALUES ('$this->usuario', '$this->noticias', '$this->cardapios', '$this->cursos')";
      $resultado = pg_query($sql);
      return $resultado;
    }

    public function Listar($value='')
    {
      # code...
    }

    public function Atualizar($value='')
    {
      # code...
    }

    public function Excluir($value='')
    {
      # code...
    }

    public function Editar($value='')
    {
      # code...
    }

    public function loadPermissions($id)
    {
      $sql       = "SELECT * FROM permissaoteste pt WHERE pt.user_id = $id";
      $resultado = pg_query($sql);

      while ($registro = pg_fetch_assoc($resultado))
      {
        $object = new Permissions();
        $object->id = $registro['id_perm'];
        $object->noticias = $registro['noticias'];
        $object->cardapios = $registro['cardapios'];
        $object->cursos = $registro['cursos'];

        $retorno = $object;
      }
      return $retorno;
    }

  }
?>
