<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Eventos
  {
    private $id;
    private $evento;
    private $categoria;
    private $texto;
    private $dataInicio;
    private $dataFim;
    private $horarioInicio;
    private $horarioFim;
    private $imagem;
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

    public function Inserir()
    {
      $sql    = "INSERT INTO eventos (evento, dataInicio, dataFim, horarioInicio, horarioFim, event_cat, texto)
                  VALUES ('$this->evento', '$this->dataInicio', '$this->dataFim', '$this->horarioInicio', '$this->horarioFim', '$this->categoria', '$this->texto')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql    = "SELECT id_event, evento FROM eventos ORDER BY id_event DESC";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object         = new Eventos();
        $object->id     = $reg["id_event"];
        $object->evento = $reg["evento"];

        $return[] = $object;
      }
      return $return;
    }

    public function Atualizar()
    {
      $return = false;
      $sql    = "UPDATE eventos set evento = '$this->evento', event_cat = '$this->categoria', texto = '$this->texto' where id_event = $this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function Excluir()
    {
      $sql    = "DELETE from eventos where id_event = $this->id ";
      $return = pg_query($sql);
      return $return;
    }

    public function Editar($id='')
    {
      $sql    = "SELECT * FROM eventos WHERE id_event = $id";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object                = new Eventos();
        $object->id            = $reg["id_event"];
        $object->evento        = $reg['evento'];
        $object->categoria     = $reg['event_cat'];
        $object->dataInicio    = $reg['dataInicio'];
        $object->dataFim       = $reg['dataFim'];
        $object->horarioInicio = $reg['horarioInicio'];
        $object->horarioFim    = $reg['horarioFim'];
        $object->texto         = $reg['texto'];
        $object->imagem        = $reg['imagem'];

        $return = $object;
        //print_r($object);
      }
      return $return;
    }

    public function noImageUp()
    {
      $noImage  = "../../dist/img/todentro_logo.png";
      $sqlEvent = "SELECT CURRVAL('eventos_id_event_seq')";
      $last     = pg_query($sqlEvent);
      $idevent  = pg_fetch_array($last);
      $this->id = $idevent[0];
      $sql      = "UPDATE eventos set imagem = '$noImage' WHERE id_event = $this->id";
      $return   = pg_query($sql);
      return $return;
    }
  }
?>
