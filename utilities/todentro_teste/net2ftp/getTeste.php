<?php


require_once('conecta.php');

$sql = "SELECT * FROM noticias";

//$res = mysqli_query($con,$sql);
$res = pg_query($conexao,$sql);
$resultado = array();


while($row = pg_fetch_array($res))
{
  $date = date('d/m/Y', strtotime($row[2]));
  array_push($resultado, array('id_Noticia'=>$row[0],'Descricao'=>$row[1],'Data'=>$date));
}

 echo json_encode(array("result"=>$resultado));

 pg_close($conexao);

?>
