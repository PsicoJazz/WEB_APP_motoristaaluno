<?php
session_start();
require 'conexao.php';


$query = "SELECT * FROM usuario ORDER BY nome";
$query_run = mysqli_query($conexao, $query);


if (!$query_run) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP Motorista/Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Motoristas
                <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Motorista</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Rota</th>
                    <th>Celular</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(mysqli_num_rows($query_run) > 0)
                  {
                     
                      while($usuario = mysqli_fetch_assoc($query_run))
                      {
                          ?>
                          <tr>
                              <td><?= htmlspecialchars($usuario['id']) ?></td>
                              <td><?= htmlspecialchars($usuario['nome']) ?></td>
                              <td><?= htmlspecialchars($usuario['rota']) ?></td>
                              <td><?= htmlspecialchars($usuario['celular']) ?></td>
                              <td>
                                  <a href="usuario-view.php?id=<?= $usuario['id'] ?>" class="btn btn-secondary btn-sm">
                                      <span class="bi-eye-fill"></span>&nbsp;Visualizar
                                  </a>
                                  <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm">
                                      <span class="bi-pencil-fill"></span>&nbsp;Editar
                                  </a>
                                  <form action="acoes.php" method="POST" class="d-inline">
                                      <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit"
                                              name="delete_usuario" value="<?= $usuario['id'] ?>"
                                              class="btn btn-danger btn-sm">
                                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                      </button>
                                  </form>
                              </td>
                          </tr>
                          <?php
                      }
                  }
                  else
                  {
                      ?>
                      <tr>
                          <td colspan="5" class="text-center alert alert-warning">
                              <strong>Nenhum motorista encontrado!</strong><br>
                              <small>Clique em "Adicionar Motorista" para cadastrar o primeiro.</small>
                          </td>
                      </tr>
                      <?php
                  }
                  ?>
                </tbody>
              </table>
              
              <?php if(mysqli_num_rows($query_run) > 0): ?>
              <div class="mt-3">
                  <small class="text-muted">
                      Total de motoristas cadastrados: <?= mysqli_num_rows($query_run) ?>
                  </small>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>