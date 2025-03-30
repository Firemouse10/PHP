<?php  
require "conexao.php";// puxa a conexao do banco de dados

$n = $_POST["nome"];
$sql ="SELECT * FROM login WHERE nome LIKE '$n%'";

$r = mysqli_query($c, $sql);

while($usu = mysqli_fetch_assoc($r)){
    echo "ID: ".$usu["id"]."<br>";
    echo "Nome: ".$usu["nome"]."<br>";
    echo "Email: ".$usu["email"]."<br>";
    echo "Senha: ".$usu["senha"]."<br> <br>";
    
}
    mysqli_close($c);

    
?>