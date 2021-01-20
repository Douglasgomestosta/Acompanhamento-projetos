<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
require '../sistema/db.php'; 
require '../sistema/FUNCTIONS.php'; 
if(!$_SESSION['logado'] == 1)
{
  header('Location: login.php');
exit();
}
$id = $_SESSION['id'];
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Acompanhamento de projetos</title>
  </head>
  <body>
  <img src="imagens/voltar.png" class="img-fluid" alt="Responsive image" style="width: 60px; " onclick="window.location.href='logout.php'">

  <center>
  <div style="width:80%;" id="home">



  <!-- Modal -->
<div class="modal fade" id="modaliniciartrabalho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar trabalho.</h5>
        
      </div>
      <div class="modal-body">
<h4>Em qual projeto você deseja iniciar o trabalho?</h4>
<select id="iniciarprojeto">
  <?php
  $resultado = $conn->query("SELECT * FROM `pedidos` WHERE `status` < 2");
  if ($resultado->num_rows > 0) {
  while($row = $resultado->fetch_assoc()) {
    $naoiniciado = " ";
    if($row['status'] == "0"){$naoiniciado = "(Não iniciado)";}
 echo '<option value="' . $row['id'] .'">' . $row['nome'] . $naoiniciado .'</option>';
  }
}else{
  echo "Nenhum projeto a ser iniciado!";
}
  ?>
</select>
<br><br>
<button type="button" class="btn btn-success" onclick="iniciartrabalho()">Iniciar trabalho!</button>

      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary" onclick="fecharmodal()">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!---Fim modal-->


  <div style="background-color:#2b2f3a; border-radius:10px;">
  <div class="container">
<div class="row">
    <div class="col-6">
    

<?php
  
    //pegar toda a hora trabalhada
$horastrabalhadas = 0;
$iniciodata = date("Y-m") . "-1";
$fimdata = date("Y-m") . "-31";
$resultado = $conn->query("SELECT * FROM `cargahoraria` WHERE `idfuncionario` = $id AND `inicio` > '$iniciodata' AND `fim` < '$fimdata'");
if ($resultado->num_rows > 0) {
    while($roww = $resultado->fetch_assoc()) {
    $inicio = $roww['inicio'];
    $fim = $roww['fim'];
    if(empty($fim)){
  $fim = date("Y-m-d h:i:sa");
    }
    $datacomparada = compararhoras($inicio, $fim);
    $horastrabalhadas = $horastrabalhadas + $datacomparada;
  
    }
  }
  //resultado está em $horastrabalhadas;

//fim mostrar toda a hora trabalhada

$sql = "SELECT * FROM `cargahoraria` WHERE `idfuncionario` = $id AND `fim` IS NULL ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$idprojeto = $row['idpedido'];
$resultado = $conn->query("SELECT * FROM `pedidos` WHERE `id` = " . $idprojeto);
while($roww = $resultado->fetch_assoc()) {
$nomeprojeto = $roww['nome'];
}
   ?>
   <h4 style="color:white;">Trabalhando no momento</h4>
   <p style="color:white;">Projeto: <?php echo $nomeprojeto; ?></p>
   <button type="button" class="btn btn-danger" onclick="finalizartrabalho()">Encerrar trabalho.</button>
   <h5 style="color:white;">Você já trabalhou <?php echo $horastrabalhadas; ?> horas esse mês</h5>
   <?php
    }
  }else{
    ?>
    <h4 style="color:white;">Não está trabalhando no momento</h4>
    <button type="button" class="btn btn-success" onclick="modaliniciotrabalho()">Iniciar trabalho.</button>

    <h5 style="color:white;">Você já trabalhou <?php echo $horastrabalhadas; ?> horas esse mês</h5>
    <?php
  }
?>



    </div>
    <div class="col-6">
    <h5 style="color:white;">Estatísticas:</h5>
    <?php
    $andamento = $conn->query("SELECT * FROM `pedidos` WHERE `status` = 1");
    $naoiniciados = $conn->query("SELECT * FROM `pedidos` WHERE `status` = 0");
    ?>
<h6 style="color:white;">Existem <?php echo $andamento->num_rows; ?> projeto(s) em andamento.</h6>
<h6 style="color:white;">Existem <?php echo $naoiniciados->num_rows; ?> projeto(s) ainda não iniciados.</h6>


    </div>
  </div>
  </div>


<h6 style="color:white;">Menu:</h6>
  <div class="container">
  <div class="row">
    <div class="col-sm">
      <a style="color:white;" href="#">TESTE1</a>
    </div>
    <div class="col-sm">
    <a style="color:white;" href="#">TESTE1</a>
    </div>
    <div class="col-sm">
    <a style="color:white;" href="#">TESTE1</a>
    </div>
  </div>
</div>




  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->



    <script type="text/javascript">
function modaliniciotrabalho(){
  $('#modaliniciartrabalho').modal('show');
}

    function fecharmodal(){
  $('#modaliniciartrabalho').modal('hide');
}
function iniciartrabalho(){
  var xhttp = new XMLHttpRequest();
  var url = "sistema/iniciartrabalho.php";
      xhttp.open("POST", url, true);
      var projeto = document.getElementById('iniciarprojeto');
var params = 'projeto=' + projeto.value;
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhttp.send(params);

xhttp.onreadystatechange = function() {
    if (xhttp.readyState == XMLHttpRequest.DONE) {
    if(xhttp.responseText == "1")
    {
      window.location.href = "painel.php";
    }else{
      alert("Houve um erro ao iniciar seu trabalho... tente novamente");
    }
    }
  }
}
function finalizartrabalho(){
  var xhttp = new XMLHttpRequest();
  var url = "sistema/finalizartrabalho.php";
      xhttp.open("POST", url, true);
      var projeto = document.getElementById('iniciarprojeto');
var params = 'projeto=' + projeto.value;
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhttp.send(params);

xhttp.onreadystatechange = function() {
    if (xhttp.readyState == XMLHttpRequest.DONE) {
    if(xhttp.responseText == "1")
    {
      window.location.href = "painel.php";
    }else{
      alert("Houve um erro ao iniciar seu trabalho... tente novamente");
    }
    }
  }
}
</script>
    
  </body>
</html>


