<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="alert alert-success text-center" role="alert" style="width: 300px;">
        <?php
        require "../conexao.php";

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $qtd = $_POST['quantidade'];
        $preco = $_POST['preco'];

        $sql = "INSERT INTO produtos (nome, descricao, qtd, preco) VALUES ('$nome','$descricao', '$qtd','$preco')";

        $result = mysqli_query($c, $sql);

        if ($result) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar produto: " . mysqli_error($c);
        }
        mysqli_close($c);
        ?>
        <br>
        <a href="../../../SistemaProdutos/index.php" class="btn btn-primary mt-3">Voltar</a>
    </div>
</div>
</body>
</html>