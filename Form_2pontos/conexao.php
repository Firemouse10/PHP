<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "form_2pontos";
$c = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$c){
    die("conexao falhou".mysqli_connect_error());
}
?>