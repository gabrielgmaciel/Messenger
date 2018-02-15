<?php
$host="127.0.0.1:3306";
$user="root";
$pass="";
$bd="gnove";

$conexao = mysqli_connect("$host", "$user","$pass","$bd") or
die("Nao foi possivel conectar-se ao seridor de Banco de Dados.");
?>