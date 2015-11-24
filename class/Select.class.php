<?php

  include_once 'Carrega.class.php';
/**
 *
 */
class Select
{

    public $id;
    public $semestre;
    public $sala;
    //public $;
    //public $;
    //public $;
    //public $;
    //public $;
    //public $;
    public $bd;


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

    public function semestreSelect($semestre="")
    {
      $sql = "SELECT * from semestre Order by id_sem";
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
         $this->id = $a['id_sem'];
         $this->semestre = $a['semestre'];

         if ($semestre==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->semestre}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->semestre}</option>";
         }
       }
     }
    }

    public function localSelect($local="")
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

         if ($semestre==$this->id)
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
