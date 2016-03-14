<?php


echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

$n = new Connection();
echo "<pre>";
//$n->getAllCardapios(5);
//$n->getAllNoticias();
$n->ShowNoticiaById(1);
/*$t = $n->showNoticia(1);
$resultado = array();
if ($t != null)
{
  $texto       = $t->texto;
  $autor       = $t->autor;
  $categoria   = $t->categoria;
  $imagem      = $t->imagem;
  $titulo      = $t->titulo;
  $linha_apoio = $t->linha_apoio;
  $id          = $t->id;
  $status      = $t->status;
  $url         = $t->url;

  array_push($resultado, array("Texto"=>$texto, "Imagem"=>$imagem, "linha de apoio"=>$linha_apoio, "Autor"=>$autor, "Categorias"=>$categoria, "url"=>$url));

  echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
}*/

echo "</pre><br>";




?>
