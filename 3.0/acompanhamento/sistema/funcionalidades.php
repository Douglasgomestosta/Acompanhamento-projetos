<?php
include('db.php');
require("FUNCTIONS.php");
$id = $_POST['id'];
if(!is_numeric($id)){ echo "0"; exit();}
$sql = "SELECT * FROM `pedidos` WHERE `id` = " . $id . " limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();
        //ver se a chave de segurança foi escrita corretamente
        if($_POST['chave'] !== $dados['codigosecreto'])
        {
            echo "0";
            exit();
        }
    
}


$sql = "SELECT * FROM `funcionalidades` WHERE `idprojeto` = $id ORDER BY `id` ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "[";
    $primeiro = "1";
    while($row = $result->fetch_assoc()) {
        if($primeiro == "1"){ $primeiro = "0";}else{echo ",";}
            
        ?>
        {
     "nome": "<?php echo $row['nome']; ?>",
     "data": "<?php echo $data;?>",
     "teste": ""
    }
        <?php

    }
    echo "]";
}
?>