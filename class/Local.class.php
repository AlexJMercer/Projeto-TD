<?php
include_once 'Carrega.class.php';
/**
 *
 */
class Local
{
  private $id;
  private $sala;
  private $bd;

    public function __construct()
    {
      $this->bd = new BD();
    }

    public function __destruct()
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

    public function Inserir()
    {
      $sql = "INSERT INTO local (sala) VALUES ('$this->sala')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql = "SELECT * FROM local";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
        $obj = new Local();
        $obj->id = $reg["id"];
        $obj->sala = $reg["sala"];

        $return[] = $obj;
      }

      return $return;
    }

    public function Editar($id = "")
    {
      $sql = "SELECT * FROM local AS l WHERE l.id=$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
        $obj = new Local();
        $obj->id = $reg["id"];
        $obj->sala = $reg["sala"];

        $return = $obj;
      }

      return $return;
    }

    public function Excluir()
    {
      $sql = "DELETE * FROM local WHERE id=$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function Atualizar()
    {
        $return = false;
        $sql = "UPDATE local set sala = '$this->sala' WHERE id = '$this->id'";
        $return = pg_query($sql);

        return $return;
    }

    public function salaSelect($id ="")
    {
       $sql = "SELECT * from local Order by id";
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
          $this->sala = $a['sala'];

          if ($id==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->sala}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->sala}</option>";
          }
        }
      }
    }


}
?>
