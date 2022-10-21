<?php 
require('config/bd.php');
if (isset($_POST['acao'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logar = Usuario::logar($login,$senha);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar Sistema</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <form method="POST">
        <div class="login">
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="usuario" name="login" placeholder="Usuário" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit" name="acao" class="btn btn-primary">Entrar</button>
    </form>
    </div>        <!-- /#login -->
</body>
<script src="js/bootstrap.js"></script>

</html>