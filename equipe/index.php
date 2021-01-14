<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
if(!$_SESSION['logado'] == 1)
{
  header('Location: login.php');
exit();
}else{
    header('Location: painel.php');
}
?>
