<?php

   include_once 'Carrega.class.php';
   /**
    * Editado dia 29/07/2015
    */
   class Usuarios
   {
      private $cod;
      private $nome;
      private $email;
      private $senha;
      private $bd;
      private $type;

      public function __construct()
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

      public function inserir()
      {
         $sql = "INSERT INTO usuarios (nome, email, senha, type)
                 VALUES ('$this->nome', '$this->email', '$this->senha', '$this->type') ";
         $return = pg_query($sql);
         return $return;
      }

   }

 ?>
