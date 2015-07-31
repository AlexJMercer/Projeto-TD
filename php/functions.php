<?php
public $erro;
public $cookie = true;
public $prefixoChaves = 'Usuario_';
public $lembrarTempo = 7;
public $caseSensitive = true;
public $filtraDados = true;
public $cookiePath = '/';

public function codificaSenha($senha)
{
   // Altere aqui caso você use, por exemplo, o MD5:
   // return md5($senha);
   return sha1($senha);
}

//funções de login para teste
function validaUsuario($login, $senha, $type)
{
   //Função para teste
   $senha = $this->__codificaSenha($senha);
   // Procura por usuários com o mesmo usuário e senha
   // Filtra os dados?
   if ($this->filtraDados)
   {
      $login = pg_escape_string($login);
      $senha = pg_escape_string($senha);
      $type = pg_escape_string($type);
   }

   // Os dados são case-sensitive?
   $binary = ($this->caseSensitive) ? 'BINARY' : '';

   $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE $binary usuarios.login = $login AND usuarios.senha = $senha ";
            $result = pg_query($sql);
            if ($result)
            {
                  $total = pg_result($result, 0, 'total');

                  // Limpa a consulta da memória
                  pg_free_result($result);
            }
            else
            {
                  // A consulta foi mal sucedida, retorna false
                  return false;
            }
         // Se houver apenas um usuário, retorna true
         return ($total == 1) ? true : false;
}

public function logaUsuario($login, $senha, $lembrar = false)
{
   //Verifica se o usuario existe
   if ($this->validaUsuario($login, $senha))
   {
      //inicia sessão
      if ($this->inSession AND !isset($_SESSION))
      {
         session_start();
      }

      if ($this->filtraDados)
      {
          $login = pg_escape_string($login);
          $senha = pg_escape_string($senha);
      }

      if ($this->login != false AND $this->senha != false)
      {
         if(!in_array($this->login, $this->dados)) {
             $this->dados[] = 'usuario';
         }

          // Consulta os dados
          $sql = "SELECT $login, $senha FROM usuarios
                  WHERE $this->login = login";
          $result = pg_query($sql);
          // Se a consulta falhou
          if (!$result)
          {
              // A consulta foi mal sucedida, retorna false
              $this->erro = 'A consulta dos dados é inválida';
              return false;
          }
          else
          {
              // Traz os dados encontrados para um array
              $dados = pg_fetch_assoc($result);
              // Limpa a consulta da memória
              pg_free_result($result);

              // Passa os dados para a sessão
              foreach ($dados AS $chave=>$valor)
              {
               $_SESSION[$this->prefixoChaves . $chave] = $valor;
              }
          }
      }

      if ($this->cookie)
      {
          // Monta uma cookie com informações gerais sobre o usuário: usuario, ip e navegador
          $valor = join('#', array($login, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));

          // Encripta o valor do cookie
          $valor = sha1($valor);
          setcookie($this->prefixoChaves . 'token', $valor, 0, '/');
      }
         // Fim da verificação, retorna true
         return true;
      }
      else
      {
      $this->erro = 'Usuário inválido';
      return false;
      }
   }

   public function usuarioLogado()
   {
      if ($this->iniciaSessao AND !isset($_SESSION))
      {
         session_start();
      }

      if (!isset($_SESSION[$this->prefixoChaves . 'logado']) OR !$_SESSION[$this->prefixoChaves . 'logado'])
      {
         return false;
      }

      // Faz a verificação do cookie?
      if ($this->cookie)
      {
         // Verifica se o cookie não existe
         if (!isset($_COOKIE[$this->prefixoChaves . 'token']))
         {
            return false;
         }
         else
         {
            // Monta o valor do cookie
            $valor = join('#', array($_SESSION[$this->prefixoChaves . 'usuario'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));

            // Encripta o valor do cookie
            $valor = sha1($valor);

         // Verifica o valor do cookie
            if ($_COOKIE[$this->prefixoChaves . 'token'] !== $valor)
            {
               return false;
            }
         }
      }
      // A sessão e o cookie foram verificados, há um usuário logado
      return true;
}

public function logout()
{
 // Inicia a sessão?
 if ($this->iniciaSessao AND !isset($_SESSION))
 {
      session_start();
 }

   // Tamanho do prefixo
   $tamanho = strlen($this->prefixoChaves);

 // Destroi todos os valores da sessão relativos ao sistema de login
 foreach ($_SESSION AS $chave=>$valor)
 {
      // Remove apenas valores cujas chaves comecem com o prefixo correto
      if (substr($chave, 0, $tamanho) == $this->prefixoChaves)
      {
          unset($_SESSION[$chave]);
      }
 }
 // Destrói a sessão se ela estiver vazia
 if (count($_SESSION) == 0)
 {
      session_destroy();
      // Remove o cookie da sessão se ele existir
      if (isset($_COOKIE['PHPSESSID']))
      {
          setcookie('PHPSESSID', false, (time() - 3600));
          unset($_COOKIE['PHPSESSID']);
      }
 }
 // Remove o cookie com as informações do visitante
 if ($this->cookie AND isset($_COOKIE[$this->prefixoChaves . 'token']))
 {
      setcookie($this->prefixoChaves . 'token', false, (time() - 3600), '/');
      unset($_COOKIE[$this->prefixoChaves . 'token']);
 }
 // Retorna SE não há um usuário logado
 return !$this->usuarioLogado();
}

public function lembrarDados($login, $senha)
{
 // Calcula o timestamp final para os cookies expirarem
 $tempo = strtotime("+{$this->lembrarTempo} day", time());

 // Encripta os dados do usuário usando base64
 // O rand(1, 9) cria um digito no início da string que impede a descriptografia
 $login = rand(1, 9) . base64_encode($login);
 $senha = rand(1, 9) . base64_encode($senha);

 // Cria um cookie com o usuário
 setcookie($this->prefixoChaves . 'lu', $usuario, $tempo, $this->cookiePath);
 // Cria um cookie com a senha
 setcookie($this->prefixoChaves . 'ls', $senha, $tempo, $this->cookiePath);
}

public function verificaDadosLembrados()
{
   // Os cookies de "Lembrar minha senha" existem?
   if (isset($_COOKIE[$this->prefixoChaves . 'lu']) AND isset($_COOKIE[$this->prefixoChaves . 'ls']))
   {
     // Pega os valores salvos nos cookies removendo o digito e desencriptando
     $usuario = base64_decode(substr($_COOKIE[$this->prefixoChaves . 'lu'], 1));
     $senha = base64_decode(substr($_COOKIE[$this->prefixoChaves . 'ls'], 1));

     // Tenta logar o usuário com os dados encontrados nos cookies
     return $this->logaUsuario($usuario, $senha, true);
   }

   // Não há nenhum cookie, dados inválidos
   return false;
}

public function limpaDadosLembrados()
{
 // Deleta o cookie com o usuário
 if (isset($_COOKIE[$this->prefixoChaves . 'lu']))
 {
      setcookie($this->prefixoChaves . 'lu', false, (time() - 3600), $this->cookiePath);
      unset($_COOKIE[$this->prefixoChaves . 'lu']);
 }
 // Deleta o cookie com a senha
 if (isset($_COOKIE[$this->prefixoChaves . 'ls']))
 {
      setcookie($this->prefixoChaves . 'ls', false, (time() - 3600), $this->cookiePath);
      unset($_COOKIE[$this->prefixoChaves . 'ls']);
 }
}
?>
