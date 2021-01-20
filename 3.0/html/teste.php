<?php
include('sistema/db.php');
require("sistema/FUNCTIONS.php");
$id = "1";

//fim mostrar se está trabalhando
$horastrabalhadas = 0;
$resultado = $conn->query('SELECT * FROM `cargahoraria` WHERE `idpedido` = ' . $id);
if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
    $inicio = $row['inicio'];
    $fim = $row['fim'];
    if(empty($fim)){
  $fim = date("Y-m-d h:i:sa");
    }
    $datacomparada = compararhoras($inicio, $fim);
    echo "$datacomparada <br>";
    $horastrabalhadas = $horastrabalhadas + $datacomparada;
  
    }
  }
  echo $horastrabalhadas;
  //pegar toda a hora trabalhada no projeto