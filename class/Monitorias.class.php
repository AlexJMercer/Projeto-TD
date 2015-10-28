<?php
include_once 'Carrega.class.php';
/**
 *
 */
 class Monitorias
 {

   private $id;
   private $sala;
   private $disciplina;
   private $info;
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
      $sql="INSERT INTO monitorias (curso_m, disciplina_m, sala_m, info)
                  VALUES ('$this->curso', '$this->disciplina', '$this->sala', '$this->info')";
      $return = pg_query($sql);
      return $return;
   }

   public function ListarEspecify($curso="")
   {
     $sql = "SELECT * FROM monitorias as m, cursos as c WHERE m.curso_m=c.id_curso AND m.curso_m=$curso";
     $result = pg_query($sql);
     $return = null;

     while ($reg = pg_fetch_assoc($result))
     {
       $object = new Monitorias();
       $object->id = $reg["id_monit"];
       $object->curso =
     }
   }
 }
?>
