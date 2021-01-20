<?php
session_start();
include('db.php');
include('functions.php');
$email = $_POST['email'];
$senha = $_POST['senha'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "0"; exit();}
$senha = md5($senha);
$sql = "SELECT * FROM `funcionarios` WHERE `email` LIKE '$email' limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
if($row['senha'] == $senha){
  $_SESSION['logado'] = "1";
        $_SESSION['id'] = $row['id'];
        echo "1";

}else{
  echo "0";
}
    }
  }
?>