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
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar" style="background-color: #5271ff !important">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">
                <img
                    src="../img/logo.png"
                    id="logo"
                    alt="logo"
                    style="height: 60px; width: 260px; padding-top: px" />
            </a>
        </div>
    </nav>

    <?php
    require("conexao.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";

    $r = mysqli_query($c, $sql);

    while ($produto = mysqli_fetch_assoc($r)) {

    ?>
    
        <div class="container">
            <form action="./CRUD/requisicao_edit.php" method="post">
                <h3 style="text-align: center; margin-top: 2em">Editar Produtos</h3>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" value="<?php echo $produto["nome"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="<?php echo $produto["preco"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo $produto["descricao"]; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $produto["qtd"]; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $produto["id"]; ?>">
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    <?php
    }
        mysqli_close($c);
    ?>
</body>
</html>