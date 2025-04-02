<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "conexao.php";
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $quatidade = $_POST["quantidade"];
        $preco = $_POST["preco"];

        $sql = "UPDATE produtos SET
                nome='$nome', descricao='$descricao', qtd='$quatidade', preco='$preco' WHERE id='$id'";
        $r = mysqli_query($c, $sql);
        if($r){
            echo "Registro alterado";
            header("refresh:0, url=../index.php");
        }

    ?>
</body>
</html>