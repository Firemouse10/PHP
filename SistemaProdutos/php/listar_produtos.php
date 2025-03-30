<?php
require "conexao.php";

// Consulta ao banco de dados
$sql = "SELECT nome, quantidade, preco, descricao FROM produtos";
$result = $conn->query($sql);

$produtos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

// Retornar os dados em formato JSON
echo json_encode($produtos);

$conn->close();
?>