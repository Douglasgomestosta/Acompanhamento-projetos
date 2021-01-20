<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
require '../../sistema/db.php'; 
require '../../sistema/FUNCTIONS.php'; 
$projeto = $_POST['projeto'];
if(!is_numeric($projeto)){echo "0";exit();}
if(!$_SESSION['logado'] == 1) {echo "0";exit();}
$id = $_SESSION['id'];
$conn->query("UPDATE `cargahoraria` SET `fim` = current_timestamp WHERE `idfuncionario` = $id AND `fim` IS NULL;");
echo "1";
?>