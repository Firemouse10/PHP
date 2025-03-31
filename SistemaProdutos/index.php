<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <a href="../SistemaProdutos/index.php" class="navbar-brand">
        <img
          src="./img/logo.png"
          id="logo"
          alt="logo"
          style="height: 60px; width: 260px; padding-top: px" />
      </a>

      <a href="../SistemaProdutos/php/cadastrar.php"><button
          type="button"
          class="btn btn-success"
          style="
              margin-left: 500px;
              height: 42px;
              background-color: #027610 !important;
            ">
          CADASTRAR NOVO PRODUTO
        </button></a>


      <form class="d-flex" role="search" style="width: 25em" onkeyup="filterTable()" method="post">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Pesquisar"
          aria-label="Search"
          id="searchInput" />
        <button
          class="btn btn-primary"
          type="button"
          style="background-color: rgb(23, 32, 195)">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="20"
            fill="currentColor"
            class="bi bi-search"
            viewBox="0 0 16 16"
            style="margin-bottom: 4px">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
          </svg>
        </button>
      </form>

      <script>
        function filterTable() {
          var input, filter, table, tr, td, i, j, txtValue;
          input = document.getElementById("searchInput");
          filter = input.value.toUpperCase();
          table = document.querySelector("table");
          tr = table.getElementsByTagName("tr");

          for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
              if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                  break;
                }
              }
            }
          }
        }
      </script>
    </div>
  </nav>

  <main style="width: 100%">
    <h4
      style="
          margin-top: 0.5em;
          display: flex;
          justify-content: center;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        ">
      Listagem de Produtos
    </h4>
    <style>
      .container {
        margin-left: 0;
        max-width: 100%;
      }
    </style>
    <div class="container mt-4">
      <table class="table table-responsive table-bordered table-hover" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
        <thead class="thead-dark" style="background-color: #5271ff; color: white;">
          <tr>
            <th style="padding: 7px;">Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require("../SistemaProdutos/php/conexao.php");

          $query = "SELECT * FROM produtos";
          $result = mysqli_query($c, $query);

          if (!$result) {
            die("Erro: " . mysqli_error($c));
          }

          while ($produto = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td>" . $produto['qtd'] . "</td>";
            echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
            echo "<td>" . $produto['descricao'] . "</td>";
            echo "<td class='d-flex justify-content-around'>";
            echo "<a href='php/CRUD/ver.php?id=" . $produto["id"] . "' class='btn btn-sm btn-secondary'>VER</a>";
            echo "<a href='php/editar.php?id=" . $produto["id"] . "' class='btn btn-sm btn-warning'>EDITAR</a>";
            echo "<a href='php/CRUD/excluir.php?id=" . $produto["id"] . "' class='btn btn-sm btn-danger'>EXCLUIR</a>";
            echo "</td>";
            echo "</tr>";
          }

          mysqli_close($c);
          ?>
        </tbody>
      </table>
    </div>

  </main>

  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>