<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
require '../../sistema/db.php'; 
require '../../sistema/FUNCTIONS.php'; 
$projeto = $_POST['projeto'];
if(!is_numeric($projeto)){echo "0";exit();}
if(!$_SESSION['logado'] == 1) {echo "0";exit();}
$id = $_SESSION['id'];
$resultado = $conn->query("SELECT * FROM `pedidos` WHERE `id` = $projeto");
if ($resultado->num_rows > 0) {
while($row = $resultado->fetch_assoc()) {
if($row['status'] == "0"){
    $conn->query("INSERT INTO `atualizacoes` (`id`, `idpedido`, `nome`, `descricao`, `data`, `tipo`) VALUES (NULL, $projeto, 'Começou a ser produzido.', 'Seu projeto começou a ser produzido.', current_timestamp, '0');");
    $conn->query("UPDATE `pedidos` SET `status` = '1' WHERE `pedidos`.`id` = $projeto;");

}

$conn->query("INSERT INTO `cargahoraria` (`id`, `idfuncionario`, `idpedido`, `inicio`, `fim`) VALUES (NULL, '$id', '$projeto', current_timestamp, NULL);");

echo "1";
}
}else{echo "0";}
?>