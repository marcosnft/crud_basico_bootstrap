<?php
require ('config/bd.php');
$usuarios = MySql::conectar()->prepare("SELECT * FROM `crud`.`usuarios`");
$usuarios->execute();
$contador = $usuarios->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">

</head>

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
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Usuários Cadastrados:</h5>
                <p class="card-text"><?php echo $contador;?></p>
            </div>
           
        </div>
    </div><!-- /#conteudo -->
</body>
<script src="js/bootstrap.js"></script>

</html>