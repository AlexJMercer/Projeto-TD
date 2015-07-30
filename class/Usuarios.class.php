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
         $sql = "INSERT INTO usuarios (username, email, senha, usertype)
                 VALUES ('$this->nome', '$this->email', '$this->senha', '$this->type')";
         $return = pg_query($sql);
         return $return;
      }

      public function listar()
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id Order by usuarios.id";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->cod = $reg["id"];
            $object->nome = $reg["username"];
            $object->email = $reg["email"];
            $object->type = $reg["type"];

            $return[] = $object;
         }
         return $return;
      }


      public function excluir()
      {
         $sql = "DELETE from usuarios where id=$this->cod";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $return = false;
         $sql = "UPDATE usuarios
                  set username='$this->nome',
                      email='$this->email',
                      senha='$this->senha',
                      type='$this->type'
                  where id=$this->cod";

         $return = pg_query($sql);
         return $return;
      }

      public function exibir($cod = "")
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id AND usuarios.id=$cod ";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->cod = $reg["id"];
            $object->nome = $reg["username"];
            $object->email = $reg["email"];
            $object->type = $reg["type"];

            $return = $object;
         }
         return $return;
      }

      public function editar($cod = "")
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id AND usuarios.id=$cod ";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->cod = $reg["id"];
            $object->nome = $reg["username"];
            $object->email = $reg["email"];
            $object->type = $reg["usertype"];

            $return = $object;
         }
         return $return;
      }

   }
?>
