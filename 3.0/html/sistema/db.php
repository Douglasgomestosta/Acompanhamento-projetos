<?php
$servername = "localhost";
$username = "douglas";
$password = "usuario26823352";
$dbname = "acompanhamento";
$versao = "BETA 1.0";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    header('Location: errodb.php');
    exit();
}
?>