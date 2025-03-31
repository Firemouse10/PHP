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
      <a href="../../index.php" class="navbar-brand">
        <img
          src="../../img/logo.png"
          id="logo"
          alt="logo"
          style="height: 60px; width: 260px; padding-top: px" />
      </a>
    </div>
  </nav>


  <div class="container" style="width: 80%;">
    <div class="row">
      <div class="col-12" style="text-align: center; padding-top: 30px;">
        <?php include("../conexao.php");

        $id = $_GET['id'];
        $sql = "SELECT * FROM produtos WHERE id = $id";

        $r = mysqli_query($c, $sql);

        while ($produto = mysqli_fetch_assoc($r)) {
          echo "<div class='alert alert-success' role='alert'>";
          echo "<h3 class='alert-heading'>ID: " . $produto["id"] . "</h3>";
          echo "<p class='mb-0'>Nome: " . $produto["nome"] . "</p>";
          echo "<p class='mb-0'>Descrição: " . $produto["descricao"] . "</p>";
          echo "<p class='mb-0'>Quantidade: " . $produto["qtd"] . "</p>";
          echo "<p class='mb-0'>Preço: " . $produto["preco"] . "</p>";
          echo "</div>";
        }
        mysqli_close($c);

        ?>
      </div>
    </div>
  </div>

  <style>
    .alert {
      background-color: #5271ff;
      color: white;
      padding: 20px;
      margin-bottom: 20px;
    }

    .alert-success {
      border-left: 5px solid #0f9d58;
    }
  </style>

</body>

</html>