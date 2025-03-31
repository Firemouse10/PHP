<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pt-BR</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="alert alert-success text-center" role="alert" style="width: 300px;">
            <?php
            require "../conexao.php";

            $id = $_GET["id"];
            $sqlDelete = "DELETE FROM produtos WHERE id = $id";
            $rDelete = mysqli_query($c, $sqlDelete);

            if ($rDelete) {
                echo "Produto deletado com sucesso!";
            } else {
                echo "Erro: " . mysqli_error($c);
            }
            mysqli_close($c);
            ?>
            <br>
            <a href="../../../SistemaProdutos/index.php" class="btn btn-primary mt-3">Voltar</a>
        </div>
    </div>
</body>

</html>