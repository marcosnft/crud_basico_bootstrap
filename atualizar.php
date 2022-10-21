<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuários</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">


    <?php
    require('config/bd.php');
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $usuario = Usuario::select('usuarios', 'id = ?', array($id));
    } else {
        Usuario::alert('erro', 'Você precisa passar o parametro ID.');
        die();
    }
    ?>
    <div class="menu-lateral">
        <ul>
            <li><a href="main.php">Dashboard</a></li>
            <li><a href="criar.php">Criar</a></li>
            <li><a href="listar.php">Listar</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>

    <div class="conteudo">
        <h2> Atualizar Usuários </h2>
        <form method="post" enctype="multipart/form-data">

            <?php
            if (isset($_POST['acao'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];
                $nome = $_POST['nome'];
                if (Usuario::atualizarUsuario($login, $senha, $nome, $id)) {
                    Usuario::alert('sucesso', 'O usuario foi editado com sucesso!');
                    $usuario = Usuario::select('usuarios', 'id = ?', array($id));
                } else {
                    Usuario::alert('erro', 'Campos vázios não são permitidos.');
                }
            }
            ?>

            <div class="mb-3">
                <label for="login" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="login" value="<?php echo $usuario['login'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $usuario['senha'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome'] ?>" required>
            </div>
            <button type="submit" name="acao" class="btn btn-primary">Atualizar!</button>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
    </div> <!-- /.conteudo -->
    </body>
    <script src="js/bootstrap.js"></script>
    <script src="js/atualizar.js"></script>

</html>