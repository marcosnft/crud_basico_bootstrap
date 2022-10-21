<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuários</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<?php
require('config/bd.php');
if (isset($_GET['excluir'])) {
  $idExcluir = intval($_GET['excluir']);
  Usuario::deletarUsuario('usuarios', $idExcluir);
  Usuario::redirect('atualizar');
}
$usuarios = Usuario::listarUsuarios();


?>

<body>
  <div class="menu-lateral">
    <ul>
      <li><a href="main.php">Dashboard</a></li>
      <li><a href="criar.php">Criar</a></li>
      <li><a href="listar.php">Listar</a></li>
      <li><a href="index.php">Logout</a></li>

    </ul>
  </div>
  <div class="conteudo">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Login</th>
          <th scope="col">Senha</th>
          <th scope="col">Nome</th>
          <th scope="col">#</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <?php
      foreach ($usuarios as $key => $value) {
      ?>
        <tr>
          <td><?php echo $value['id'] ?></td>
          <td><?php echo $value['login'] ?></td>
          <td><?php echo $value['senha'] ?></td>
          <td><?php echo $value['nome'] ?></td>
          <td><a class="btn btn-success" href="atualizar?id=<?php echo $value['id']; ?>">Editar</a></td>
          <td><a class="btn btn-danger" onclick="valida()" href="deletar?excluir=<?php echo $value['id']; ?>">Deletar</a>
        </td>  
        </tr>
      <?php } ?>
        <?php $excluir = $value['id'];?>
    </table>
  </div><!-- /#conteudo -->

</body>
<script src="js/bootstrap.js"></script>
<script>
  
  
  function valida() {
    if (!confirm("Deseja realmente excluir item selecionado?")) {
      return false;
    }
  }
</script>

</html>