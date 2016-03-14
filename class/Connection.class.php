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
    private $disciplina;
    private $categoria;
    private $semestre;
    private $local;
    private $info;
    private $sala;
    private $setor;
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
      $sql       = "SELECT * FROM cursos c WHERE c.inst_id=1 Order by nome";
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

    function getCursoById($id)
    {
      $sql       = "SELECT * FROM cursos c, instituto i WHERE c.inst_id =i.id_inst AND c.id_curso =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
        $object            = new Cursos();
        $object->id        = $row["id_curso"];
        $object->nome      = $row["nome"];
        $object->instituto = $row['instituto'];
        $object->texto     = $row["texto"];
        $object->logo      = $row["logo"];

        array_push($resultado, array("Id"=>$object->id, "Nome do Curso"=>$object->nome, "instituto"=>$object->instituto, "texto"=>$object->texto, "logo"=>$object->logo));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getCardapios()
    {
      $sql       ="";
      $res       = pg_query($sql);
      $resultado = array();
    }

    function getAllEventos()
    {
      $sql       = "SELECT * FROM eventos";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object                = new Eventos();
         $object->id            = $row['id_event'];
         $object->evento        = $row['evento'];
         $object->dataInicio    = $row['dataInicio'];
         $object->dataFim       = $row['dataFim'];
         $object->horarioInicio = $row['horarioInicio'];
         $object->horarioFim    = $row['horarioFim'];

         array_push($resultado, array("Id"=>$object->id, "evento"=>$object->evento, "dataInicio"=>$object->dataInicio, "dataFim"=>$object->dataFim, "horarioInicio"=>$object->horarioInicio, "horarioFim"=>$object->horarioFim));
      }

      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getEventosById($id='')
    {
      $sql    = "SELECT * FROM eventos e, categorias c WHERE c.id=e.event_cat AND e.id_event = $id";
      $res = pg_query($sql);
      $resultado = array();

      while ($row=pg_fetch_assoc($res))
      {
        $object            = new Connection();
        $object->id        = $reg["id_event"];
        $object->evento    = $reg['evento'];
        $object->categoria = $reg['categoria'];
        $object->texto     = $reg['texto'];
        $object->imagem    = $reg['imagem'];
        array_push($resultado, array("id"=>$object->id, "evento"=>$object->evento, "categoria"=>$object->categoria, "texto"=>$object->texto, "imagem"=>$object->imagem));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getAllCardapiosByDay($id='')
    {
      //$sql     = "SELECT * FROM cardapios c JOIN dia d ON d.id_dia=c.dia JOIN alimentos_cardapios ac ON ac.card_id =c.id_card";
      $sql     = "SELECT * FROM cardapios c, dia d, alimentos_cardapios ac WHERE d.id_dia=c.dia AND ac.card_id=c.id_card AND c.dia=$id";
      $sql2    = "SELECT a.alimento FROM alimentos a, cardapios c, alimentos_cardapios ac WHERE ac.card_id = c.id_card AND a.id_ali = ac.ali_id AND c.dia=$id";

      $res     = pg_query($sql);
      $res2    = pg_query($sql2);
      $retorno = null;

      while ($row = pg_fetch_assoc($res))
      {
         $obj       = new Cardapios();
         $obj->id   = $row["id_card"];
         $obj->dia  = $row["dia"];
         $obj->data = date('d/m/Y', strtotime($row["data"]));

         foreach (pg_fetch_assoc($res2) as $value)
         {
           $temp[] = $value;
         }
         $obj->alimento = $temp;

         //print_r($obj);
         $retorno = $obj;
         //array_push($resultado, array("id"=>$obj->id, "dia"=>$obj->dia, "data"=>$obj->data, "alimentos"=>$obj->alimento));
      }
      return $retorno;
     //echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function ShowAllCardapios($id='')
    {
      $cardapios = new Connection();
      $showAll   = $cardapios->getAllCardapiosByDay($id);
      $resultado = array();
      if ($showAll != null)
      {
        $id        = $showAll->id;
        $dia       = $showAll->dia;
        $data      = $showAll->data;
        $alimentos = $showAll->alimento;

        array_push($resultado, array("id"=>$id, "dia"=>$dia, "data"=>$data, "alimentos"=>$alimentos));

        echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
      }
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

    function getAllMonitoriasByCurso($id)
    {
      $sql       = "SELECT * FROM monitorias as m, disciplinas as d, cursos as c WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND m.curso_m =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
        $object             = new Monitorias();
        $object->id         = $row['id_monit'];
        $object->curso      = $row['nome'];
        $object->disciplina = $row['disciplina'];
        array_push($resultado, array("id"=>$object->id, "curso"=>$object->curso, "disciplina"=>$object->disciplina));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }


    function getMonitoriaById($id)
    {
      $sql    ="SELECT * FROM monitorias as m, disciplinas as d, cursos as c, local as l, semestre as s WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND s.id_sem =m.semestre_m AND l.id_lo =m.sala_m AND m.id_monit =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object             = new Monitorias();
         $object->id         = $row["id_monit"];
         $object->curso      = $row['nome'];
         $object->disciplina = $row['disciplina'];
         $object->semestre   = $row['semestre'];
         $object->sala       = $row['sala'];
         $object->info       = $row['info_m'];
         array_push($resultado, array("id"=>$object->id, "curso"=>$object->curso, "disciplina"=>$object->disciplina, "semestre"=>$object->semestre, "sala"=>$object->sala, "info"=>$object->info));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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

    }


    function getAllNoticias()
    {
      $sql = "SELECT * FROM noticias";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
         $object              = new Noticias();
         $object->id          = $row['id_not'];
         $object->titulo      = $row['titulo'];
         $object->linha_apoio = $row['linha_apoio'];
         $object->data        = date('d/m/Y', strtotime($row['data']));
         array_push($resultado, array("id"=>$object->id, "Texto"=>$object->titulo, "linha_apoio"=>$object->linha_apoio, "Data"=>$object->data));
      }
       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function getObjNoticiaById($id)
    {
      $sql    = "SELECT * FROM noticias n, imagens_noticias ino, usuarios u, categorias_noticias cn
                  WHERE n.id_not = ino.noticia AND n.autor = u.id_user AND cn.not_id = n.id_not AND n.id_not = $id";
      $sql2   = "SELECT c.id_cat FROM categorias c, categorias_noticias cn WHERE cn.not_id = $id AND c.id_cat = cn.cat_id";

      $res  = pg_query($sql);
      $res2 = pg_query($sql2);
      //$resultado = array();
      $retorno = null;

      while($row = pg_fetch_assoc($res))
      {
        $object         = new Noticias();
        $object->autor  = $row['nome'];
        $object->texto  = $row['texto'];
        $object->imagem = $row['imagem'];
        $object->data   = $row['data'];
        $object->hora   = $row['hora'];
        $object->url    = $row['url'];

        foreach (pg_fetch_assoc($res2) as $value)
        {
          $temp[] = $value;
        }
        $object->categoria = $temp;

        $retorno = $object;
        //print_r($object);
        //array_push($resultado, array("Texto"=>$object->texto, "Data"=>$object->data, "Imagem"=>$object->imagem, "Hora"=>$object->hora, "Autor"=>$object->autor, "Categorias"=>$object->categoria, "url"=>$object->url));
      }
      return $retorno;
      //echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }

    function ShowNoticiaById($id)
    {
      $noticia   = new Connection();
      $show      = $noticia->getObjNoticiaById($id);
      $resultado = array();
      if ($show != null)
      {
        $texto     = $show->texto;
        $autor     = $show->autor;
        $categoria = $show->categoria;
        $imagem    = $show->imagem;
        $data      = date('d/m/Y', strtotime($show->data));
        $hora      = date('H:i', strtotime($show->hora));
        $url       = $show->url;

        array_push($resultado, array("Imagem"=>$imagem, "hora"=>$hora, "data"=>$data, "Autor"=>$autor, "Categorias"=>$categoria, "url"=>$url, "Texto"=>$texto));

        echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
      }
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
