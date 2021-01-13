<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
if($_SESSION['logado'] == 1)
{
  header('Location: painel.php');
exit();
}
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
  <center>
  <div style="width:80%;" id="home">
    <br><br>

<div style="background-color:#30303083; border-width:2px; border-color:black; border:solid 1px; border-radius:10px;">
<h3>Faça Login</h3>

<input type="email" id="email" class="form-control" placeholder="seuemail@email.com" required="" autofocus="" name="email">
  <br>
  <input type="password" id="senha" class="form-control" required="" autofocus="" name="chave">
  <br>

  <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="login()" id="botaocontinuar">Fazer login.</button>

</div>
<h4>Sistema de acompanhamento de projetos, feito por Douglas Gomes Tosta</h4>
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
    function login(){
        var email = document.getElementById('email');
        var senha = document.getElementById('senha');
        email = email.value;
        senha = senha.value;
        var url = "../sistema/login.php"; //url para enviar a requisição

        var xhttp = new XMLHttpRequest();
xhttp.open("POST", url, true);
var params = 'email=' + email+"&senha="+senha;
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhttp.send(params);

xhttp.onreadystatechange = function() {
    if (xhttp.readyState == XMLHttpRequest.DONE) {
        if(xhttp.responseText == "1")
        {
            window.location.href = "painel.php";
        }else{
            alert("E-mail ou senha invalidos.");
        }
    }
}



    }
    </script>

  </body>
</html>


