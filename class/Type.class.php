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

   function __construct()
   {
      $this->bd = new BD();
   }

   function __destruct()
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
}
 ?>
