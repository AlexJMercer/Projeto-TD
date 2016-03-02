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

    function getAllNoticias()
    {
      $sql = "SELECT * FROM noticias";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $date = date('d/m/Y', strtotime($row['data']));
        array_push($resultado,
        array('id'=>$row['id_not'],'Descricao'=>$row['resumo'],'Data'=>$date));
      }

       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }

    function getNoticiaById($id='')
    {
      $sql = "SELECT * FROM noticias Where id_not = $id";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $date = date('d/m/Y', strtotime($row['data']));
        array_push($resultado,
        array('Descricao'=>$row['texto'],'Data'=>$date));
      }

       echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

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
