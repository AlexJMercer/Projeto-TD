<?php
 /*define('HOST','mysql.hostinger.com.br');
 define('USER','hartw');
 define('PASS','000');
 define('DB','teste');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');*/


 $servidor='localhost';
$porta='5432';
$bd='todentro';
$usuario='postgres';
$senha='senha5';

$conexao=pg_connect("host=$servidor port=$porta dbname=$bd user=$usuario password=$senha");


if(!$conexao){
die("Não foi possível estabelecer conexão.");
}
?>
