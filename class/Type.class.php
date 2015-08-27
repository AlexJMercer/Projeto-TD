<?php
include_once 'Carrega.class.php';

/**
 *
 */

class Type
{
   private $id;
   private $type;
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

   public function typeSelect($type ="")
   {
      $sql = "SELECT * from usertype Order by id";
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
         $this->type = $a['type'];
         if ($type==$this->id)
         {
           print "<option selected value='{$this->idd}'>{$this->type}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->type}</option>";
         }
       }
     }
   }

   /* Exemplo redbeans
   public function typeSelect($type = 0)
   {
      $select = R::findAll('usertype', 'order by id asc');

      foreach ($select as $object)
      {
        if($type==$object->id)
        {
          echo  "<option selected value='$object->id'>$object->type</option>";
        }
        else
        {
          echo  "<option value='$object->id'>$object->type</option>";
        }
      }
    }*/
}
?>
