
<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motorista - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Visualizar usuário
                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
                  session_start();
                  require 'conexao.php';

                  // Busca os dados do usuário
                  $query = "SELECT * FROM usuario"; // Ajuste conforme necessário
                  $result = mysqli_query($conn, $query);

                  // Garantir que existe um resultado
                  $usuario = mysqli_fetch_assoc($result) ?? [];
                ?>
                <div class="mb-3">
                  <label>Nome</label>
                  <p class="form-control">
                    <?=$usuario['nome'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Rota</label>
                  <p class="form-control">
                    <?=$usuario['rota'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Celular</label>
                  <p class="form-control">
                    <?=$usuario['celular'];?>
                  </p>
                </div>
                <?php
                
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>