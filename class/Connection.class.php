<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Connection
  {
    //private $id;
    //private $;
    //private $;
    //private $;
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

       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT);

    }

    function getNoticiaById($id='')
    {
      $sql = "SELECT * FROM noticias Where id_not = $id";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $date = date('d/m/Y', strtotime($row[2]));
        array_push($resultado,
        array('id'=>$row[0],'Descricao'=>$row[1],'Data'=>$date));
      }

       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT);

    }
  }

?>
