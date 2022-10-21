<?php
require('config/bd.php');
if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    Usuario::deletarUsuario($idExcluir);
        Usuario::alert('sucesso', 'Usuário deletado com sucesso!');
        Usuario::redirect('listar');
} else {
    Usuario::alert('erro', 'Erro ao deletar usuário!');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuários</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    
</body>
</html>