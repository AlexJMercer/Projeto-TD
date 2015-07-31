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
      private $inSession = true;



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
         $sql = "INSERT INTO usuarios (nome, email, senha, usertype, login)
                 VALUES ('$this->nome', '$this->email', '$this->senha', '$this->type', '$this->login')";
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
            $object->nome = $reg["nome"];
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
                  set nome='$this->nome',
                      email='$this->email',
                      senha='$this->senha',
                      type='$this->type',
                      login='$this->login'
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
            $object->nome = $reg["nome"];
            $object->email = $reg["email"];
            $object->type = $reg["type"];
            $object->login = $reg['login'];

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
            $object->nome = $reg["nome"];
            $object->email = $reg["email"];
            $object->type = $reg["usertype"];
            $object->login = $reg['login'];

            $return = $object;
         }
         return $return;
      }

      public function codificaSenha($senha)
      {
         // Altere aqui caso você use, por exemplo, o MD5:
         // return md5($senha);
         return sha1($senha);
      }

      public function logar($login, $senha, $type)
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.login=$login, usuarios.senha=$senha, usuarios.usertype=$type";
         $result = pg_query($sql);
         $cont = pg_num_rows($result);

         if ($cont==1 && $type==3)
         {
            session_start();
            $_SESSION['login']=$login;
            $_SESSION['logon']=true;
         }
      }
}
?>
