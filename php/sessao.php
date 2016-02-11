<?php

session_start();

if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['tipo']))
{
   header('Location:index.php');
   exit;
}
