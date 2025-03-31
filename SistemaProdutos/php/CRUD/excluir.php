<?php
require "../conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM produtos WHERE id = $id";
$r = mysqli_query($c, $sql);

if ($r) {
    $produto = mysqli_fetch_assoc($r);
    if (!$produto) {
        die("Produto não encontrado.");
    }
} else {
    die("Erro: " . mysqli_error($c));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlDelete = "DELETE FROM produtos WHERE id = $id";
    $rDelete = mysqli_query($c, $sqlDelete);

    if ($rDelete) {
        echo "Produto deletado com sucesso!";
        header("refresh:5; url=../../../SistemaProdutos/index.php");
    } else {
        die("Erro: " . mysqli_error($c));
    }
    mysqli_close($c);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmar Exclusão</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar" style="background-color: #5271ff !important">

        <div class="container-fluid">
        <a href="../../index.php" class="navbar-brand">
            <img
            src="../../img/logo.png"
            id="logo"
            alt="logo"
            style="height: 60px; width: 260px; padding-top: px" />
        </a>
        </div>
        </nav>
        </nav>


        <div class="container mt-5">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Confirmação de Exclusão</h4>
                <p>Tem certeza que deseja excluir o produto <strong><?php echo htmlspecialchars($produto['nome']); ?></strong>?</p>
                <hr>
                <form method="post">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    <a href="index.php" class="btn btn-secondary" onclick="window.location.href='../../../SistemaProdutos/index.php'; return false;">Cancelar</a>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header("refresh:5; url=../../../SistemaProdutos/index.php");
        }
        ?>
    </body>
    </html>
    <?php
}
?>
