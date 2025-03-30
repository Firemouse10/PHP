<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd";
$c = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$c){
    die("conexao falhou".mysqli_connect_error());
}
?>