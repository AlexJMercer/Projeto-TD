<?php
include_once 'Carrega.class.php';

/**
 *
 */

class Type
{
   private $cod;
   private $type;
   private $bd;


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
         $this->cod = $a['id'];
         $this->type = $a['type'];
         if ($type==$this->cod)
         {
           print "<option selected value='{$this->cod}'>{$this->type}</option>";
         }
         else
         {
           print "<option value='{$this->cod}'>{$this->type}</option>";
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
