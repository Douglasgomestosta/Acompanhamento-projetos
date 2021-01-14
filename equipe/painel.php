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
        <div id="conteudofuncionalidades">
        <div class="spinner-grow text-success" role="status" id="carregandomodal"></div>
        </div>
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
   <button type="button" class="btn btn-danger">Encerrar trabalho.</button>
   <h5 style="color:white;">Você já trabalhou xx horas esse mês</h5>
   <?php
    }
  }else{
    ?>
    <h4 style="color:white;">Não está trabalhando no momento</h4>
    <button type="button" class="btn btn-success" onclick="modaliniciotrabalho()">Iniciar trabalho.</button>
    <h5 style="color:white;">Você já trabalhou xx horas esse mês</h5>
    <?php
  }
?>



    </div>
    <div class="col-6">
    <h5 style="color:white;">Gerenciamento:</h5>
    <button type="button" class="btn btn-primary">Adicionar novo projeto</button>

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
  document.getElementById("conteudofuncionalidades").innerHTML= ' <div class="spinner-grow text-success" role="status" id="carregandomodal"></div>';

  $('#modaliniciartrabalho').modal('hide');
}
</script>
    
  </body>
</html>


