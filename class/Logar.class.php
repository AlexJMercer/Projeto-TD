<?php
include_once 'Carrega.class.php';
/**
 *
 */
class Logar
{
  private $login;
  private $senha;
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

  public function Logon($login='', $senha='')
  {
    $sql    = "SELECT * FROM usuarios WHERE usuarios.email ='$login' AND usuarios.senha ='$senha'";
    $result = pg_query($sql);
    $usr    = pg_num_rows($result);

    if ($usr = 1)
    {
      session_start();
      while ($reg = pg_fetch_assoc($result))
      {
        $_SESSION['id']           = $reg['id_user'];
        $_SESSION['nome']         = $reg['nome'];
        $_SESSION['email']        = $reg['email'];
        $_SESSION['tipo_usuario'] = $reg['type_id'];
        $_SESSION['senha']        = $reg['senha'];
      }
      //header('location:/Categoria/CategoriaObj.php');
      //print_r($_SESSION);
      //var_dump($_SESSION);
    }
  }
}
 ?>
