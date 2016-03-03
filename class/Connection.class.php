<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Connection
  {
    private $id;
    private $noticia;
    private $data;
    private $titulo;
    private $texto;
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

    function getAllCursos()
    {
      $sql       = "SELECT * FROM cursos Order by nome";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object        = new Connection();
         $object->id    = $row['id_curso'];
         $object->curso = $row['nome'];
         array_push($resultado, array("Id"=>$object->id, "Nome do Curso"=>$object->curso));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getCardapios()
    {
      $sql="";
      $res= pg_query($sql);
      $resultado = array();
    }

    function getAllEventos()
    {
      $sql = "SELECT * FROM eventos";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object         = new Connection();
         $object->id     = $row['id_event'];
         $object->evento = $row['evento'];
         array_push($resultado, array("Id"=>$object->id, "evento"=>$object->evento));
      }

      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getEventosById($id='')
    {
       # cod
    }

    function getAllSetores()
    {
      $sql = "SELECT * FROM setores";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object        = new Connection();
         $object->id    = $row['id_set'];
         $object->setor = $row['setor'];
         $object->texto = $row['texto'];
         array_push($resultado, array("Id"=>$object->id, "setor"=>$object->setor,"texto"=>$object->texto));
      }

      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    function getAllMonitoriasByCurso()
    {
       # code...
    }

    function getMonitoriaById($id='')
    {
       # code...
    }

    function getAllCategorias()
    {
      $sql = "SELECT * FROM categorias";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
          $object            = new Connection();
          $object->id        = $row['id'];
          $object->categoria = $row['categoria'];
          array_push($resultado, array("Id"=>$object->id, "categoria"=>$object->categoria));
      }

      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    function getProcessoSeletivo()
    {
       # code...
    }



    function getAllNoticias()
    {
      $sql = "SELECT * FROM noticias";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
         $object          = new Connection();
         $object->id      = $row['id_not'];
         $object->noticia = utf8_encode($row['titulo']);
         $object->data    = date('d/m/Y', strtotime($row['data']));
         array_push($resultado, array("id"=>$object->id, "Texto"=>$object->noticia, "Data"=>$object->data));
      }
       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function getObjNoticiaById($id='')
    {
      $sql       = "SELECT * FROM noticias Where id_not = $id";
      $res       = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_assoc($res))
      {
        $object          = new Connection();
        $object->noticia = utf8_encode($row['texto']);
        $object->data    = date('d/m/Y', strtotime($row['data']));
        array_push($resultado, array("Texto"=>$object->noticia, "Data"=>$object->data));
      }

      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

    }

    function getAllEstagios($id='')
    {
      $sql = "SELECT * FROM noticias n, categorias_noticias cn WHERE n.id_not=cn.not_id AND cn.cat_id = $id ";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $object         = new Connection();
        $object->id     = $row['id_not'];
        $object->titulo = $row['titulo'];
        $object->data   = date('d/m/Y', strtotime($row['data']));
        array_push($resultado,
        array('id'=>$object->id,'Descricao'=>$object->titulo,'Data'=>$object->data));
      }

       echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

    }

    function getAllAssistencias()
    {
      $sql = "SELECT * FROM assistencias";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $object         = new Connection();
        $object->id     = $row['id_assist'];
        $object->assist = $row['assist'];
        $object->texto  = $row['texto'];
        array_push($resultado,
        array('id'=>$object->id,'Nome'=>$object->assist,'Descricao'=>$object->texto));
      }

       echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

    }
  }

?>
