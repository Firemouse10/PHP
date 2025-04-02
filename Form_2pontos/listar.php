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
        <?php
            include "conexao.php";
            
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

            $sql = "SELECT * FROM dados";
            $resultado = mysqli_query($c, $sql);

            if (!$resultado) {
                echo "Erro ao consultar dados: " . mysqli_error($c);
            } else {
                echo "<div class='container mt-5'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Cidade</th>";
                echo "<th>Estado</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while($linha = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td>" . $linha['nome'] . "</td>";
                    echo "<td>" . $linha['endereco'] . "</td>";
                    echo "<td>" . $linha['cidade'] . "</td>";
                    echo "<td>" . $linha['estado'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }

            mysqli_close($c);
        ?>

        <div class="container mt-5">
            <a href="./index.html" class="btn btn-secondary">Voltar</a>
        </div>
    </body>
</html>
