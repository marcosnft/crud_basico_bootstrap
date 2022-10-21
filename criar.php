<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<?php
require('config/bd.php');
if (isset($_POST['acao'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    if ($login == '') {
        Usuario::alert('erro', 'O login está vazio');
    } else if ($nome == '') {
        Usuario::alert('erro', 'Preencha o nome!');
    } else if ($senha == '') {
        Usuario::alert('erro', ' A senha não pode ser vazia!');
    } else if (Usuario::usuarioExiste($login)) {
        Usuario::alert('erro', 'O login já existe, por favor selecione outro!');
    } else {
        $cadastro = Usuario::cadastrarUsuario($login, $senha, $nome);
        Usuario::alert('sucesso', 'Usuário ' . $login . ' cadastrado com sucesso!');
    }
}
?>

<body>
    <div class="menu-lateral">
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="criar.php">Criar</a></li>
            <li><a href="listar.php">Listar</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>
    <div class="conteudo">
        <form method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="login" placeholder="Usuário" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"required>
            </div>
            <button type="submit" name="acao" class="btn btn-primary">Cadastrar</button>
        </form>
    </div><!-- /#conteudo -->


</body>
<script src="js/bootstrap.js"></script>

</html>