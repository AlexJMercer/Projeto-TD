<?php
include_once 'Carrega.class.php';
/**
 *
 */
class Local
{
  private $id;
  private $local;
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
      $sql = "INSERT INTO local (local) VALUES ('$this->local')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql = "SELECT * FROM local"
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj = new Local();
        $obj->id = $reg["id"];
        $obj->local = $reg["local"];

        $return[] = $obj;
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
        $sql = "UPDATE local set local = '$this->local' WHERE id = '$this->id'";
        $return = pg_query($sql);

        return $return;
    }

    public function localSelect($id ="")
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
          $this->local = $a['local'];

          if ($id==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->local}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->local}</option>";
          }
        }
      }
    }


}
?>
