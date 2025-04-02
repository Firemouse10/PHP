<?php 
include("conexao.php");


$sql = "INSERT INTO dados (nome, endereco, cidade, estado) VALUES ('$nome', '$endereco', '$cidade', '$estado') 
    INSERT INTO dados (nome, endereco, cidade, estado) VALUES ('$nome', '$endereco', '$cidade', '$estado')";
            $resultado = mysqli_query($c, $sql);

            if (!$resultado) {
                echo "Erro ao registrar dados: " . mysqli_error($c);
            } else {
                echo "Dados registrados com sucesso!";
            }
?>