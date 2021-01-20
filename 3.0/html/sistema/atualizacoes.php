<?php
include('db.php');
$id = $_POST['id'];
if(!is_numeric($id)){ echo "0"; exit();}
$sql = "SELECT * FROM `pedidos` WHERE `id` = " . $id . " limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //ver se a chave de segurança foi escrita corretamente
        if($_POST['chave'] !== $row['codigosecreto'])
        {
            echo "0";
            exit();
        }
        //fim ver se a chave de segurança foi escrita corretamente
    }
}

$sql = "SELECT * FROM `atualizacoes` WHERE `idpedido` = 1 ORDER BY `data` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $primeiro = "1";
        ?>
        [
        <?php

    while($row = $result->fetch_assoc()) {
        //data
        $data = $row['data'];
        $array=explode("-",$data);
      $mes = $array[1];
      $dia = $array[2];
      $arrayy=explode(" ",$dia);
      $dia = $arrayy[0];
      $hora = $arrayy[1];
      $ano = $array[0];
      $data =  "$dia/$mes/$ano as $hora";
      $diamesano = "$dia/$mes/$ano";
      if($diamesano == date("d/m/Y")){
        $data = "Hoje as $hora";
      }

//fim data
        if($primeiro == "1"){$primeiro = "0";}else{
            ?>
            ,
            <?php
              }
            ?>
               {
     "nome": "<?php echo $row['nome']; ?>",
     "descricao": "<?php echo $row['descricao']; ?>",
     "data": "<?php echo $data; ?>",
     "tipo": "<?php echo $row['tipo']; ?>",

     "teste": ""
    }
            <?php
    }
    ?>
    <?php
    ?>
    ]
<?php
}

?>