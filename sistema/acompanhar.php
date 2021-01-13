<?php
sleep(1);
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
        //ver data ultimo update
        $data = $row['ultimoupdate'];
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
        //fim data ultimo update
        //ver data prevista
        $data_prevista = $row['data_prevista'];
        $array=explode("-",$data_prevista);
      $mes = $array[1];
      $dia = $array[2];
      $ano = $array[0];
      $data_prevista =  "$dia/$mes/$ano";
      $diamesano = "$dia/$mes/$ano";
      if($diamesano == date("d/m/Y")){
        $data_prevista = "Ainda hoje";
      }
        //fim data prevista
//mostrar se está trabalhando ou não
$sqll = "SELECT * FROM `cargahoraria` WHERE `idpedido` = $id AND `fim` IS NULL ORDER BY `id` DESC limit 1";
$resultt = $conn->query($sqll);
if ($resultt->num_rows > 0) {
$trabalhando = "1";
}else{
  $trabalhando = "0";
}
//fim mostrar se está trabalhando
    ?>{"sucesso":"1", "titulo":"<?php echo $row['nome'];?>", "status":"<?php echo $row['status'];?>", "ultimoupdate":"<?php echo $data;?>", "dataprevista":"<?php echo $data_prevista;?>", "trabalhando":"<?php echo $trabalhando;?>"}<?php
    }
}else{
    echo "0";
}
?>