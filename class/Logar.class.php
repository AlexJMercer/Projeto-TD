<?php

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

  public function Logar($login='', $senha='')
  {
    $sql    = "SELECT login, senha, usertype FROM usuarios WHERE usuarios.login ='$login' AND usuarios.senha ='$senha'";
    $result = pg_query($sql);
    $usr    = pg_num_rows($result);
  }
}
 ?>
