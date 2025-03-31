
<?php
include "../conexao.php";

$sql = "UPDATE produtos SET nome = '$_POST[nome]',
quantidade = '$_POST[quantidade]',
preco = '$_POST[preco]',
descricao = '$_POST[descricao]' WHERE id = '$_POST[id]'";

$result = mysqli_query($c, $sql);


?>