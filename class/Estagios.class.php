<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Estagios
  {
    private $id;
    private $titulo;
    private $salario;
    private $condicoes;
    private $atividades;
    private $exigencias;
    private $info;
    private $curso;
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

    public function transacao($valor)
    {
      $sql     = $valor;
      $retorno = pg_query($sql);
      return $retorno;
    }

    public function Inserir()
   {

     $this->transacao("BEGIN");

     $sql    = "INSERT INTO estagios (titulo, salario, condicoes, atividades, exigencias, info_est)
                 VALUES ('$this->titulo', '$this->salario', '$this->condicoes', '$this->atividades', '$this->exigencias', '$this->info')";
     $return = pg_query($sql);

       if($return)
       {
         $sql_id_est = "SELECT CURRVAL('estagios_id_est_seq')";
         $last       = pg_query($sql_id_est);
         $idest      = pg_fetch_array($last);

         $this->id    = $idest[0];

         foreach ($this->curso as $value)
         {
           $sql2    = "INSERT INTO estagio_cursos (est_id, curso_id) VALUES ('$this->id', '$value')";
           $return2 = pg_query($sql2);
         }
         if ($return2)
         {
           $this->transacao("COMMIT");
         }
         else
         {
           $this->transacao("ROLLBACK");
         }
       }
       $this->transacao("ROLLBACK");
   }

    public function Listar()
    {
      $sql     = "SELECT * FROM estagios";
      $result  = pg_query($sql);
      $retorno = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object         = new Estagios();
         $object->id     = $reg['id_est'];
         $object->titulo = $reg['titulo'];

         $retorno[] = $object;
      }
      return $retorno;
    }

    public function Atualizar()
    {
      # code...
    }

    public function Excluir()
    {
      $sql     = "DELETE from estagios where id_est = $this->id";
      $retorno = pg_query($sql);
      return $retorno;
    }

    public function Editar($id='')
    {
      $sql1 = "SELECT * FROM estagios e, estagio_cursos ec WHERE e.id_est=ec.est_id AND e.id_est=$id";
      $sql2 = "SELECT c.id_curso FROM cursos c, estagio_cursos ec WHERE ec.est_id=$id AND c.id_curso=ec.curso_id";
    }

  }

?>
