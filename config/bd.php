<?php

//Conectar com o Banco de Dados
define('DATABASE', 'crud');
define('USER', 'root');
define('HOST', 'localhost');
define('PASSWORD', '');



class MySql
{
    private static $pdo;
    public static function conectar()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO('mysql:host' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
            } catch (Exception $e) {
                echo 'erro ao conectar';
            }
        }
        return self::$pdo;
    }
}


class Usuario
{

    public static function logar($login, $senha)
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `crud`.`usuarios` WHERE login = ? AND 
senha =?");
        $sql->execute(array($login, $senha));
        if ($sql->rowCount() == 1) { //verifica se encontrou uma linha com o login e senha passados   
            header('location:main.php');
            die();
        } else {
            Usuario::alert('erro', 'Usuário ou senha incorretos!');
        }
    }

    public static function alert($tipo, $mensagem) //alert de confirmação de operação - atualizar
    {
        if ($tipo == "sucesso") {
            echo '<div class="box-alert sucesso"> <i class="fas fa-check"></i>' . $mensagem . '</div>';
        } else if ($tipo == "erro") {
            echo '<div class="box-alert erro"><i class="fas fa-times"></i>' . $mensagem . '</div>';
        }
    }

    public static function usuarioExiste($login)
    {
        $sql = Mysql::conectar()->prepare("SELECT `id` FROM `crud`.`usuarios` WHERE login=?");
        $sql->execute(array($login));
        if ($sql->rowCount() == 1) {
            return true;
        } else return false;
    }

    public static function cadastrarUsuario($login, $senha, $nome)
    {
        $sql = MySql::conectar()->prepare("INSERT INTO `crud`.`usuarios` VALUES (null,?,?,?)");
        $sql->execute(array($login, $senha, $nome));
    }

    public static function listarUsuarios()
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `crud`.`usuarios` ORDER BY `id` ASC");
        $sql->execute();
        return $sql->fetchAll();
    }
    /*
    Método especifico para selecionar apenas um registro

    */
    public static function select($tabela, $query = '', $arr = '')
    {
        if ($query != false) {
            $sql = MySql::conectar()->prepare("select * from `crud`.`$tabela` WHERE $query");
            $sql->execute($arr);
            return $sql->fetch();
        }
    }

    public static function redirect($url)
    { {
            echo '<script>location.href="' . $url . '"</script>';
            die();
        }
    }

    public static function atualizarUsuario($login, $senha, $nome, $id)
    {
        $sql = MySql::conectar()->prepare("UPDATE `crud`.`usuarios` SET login=?, senha=?, nome=? WHERE id=?");
        if ($sql->execute(array($login, $senha, $nome, $id))) {
            return true;
        } else {
            return false;
        }
    }
    public static function deletarUsuario($id)
    {
        $sql = MySql::conectar()->prepare("DELETE FROM  `crud`.`usuarios` WHERE id=?");
        $sql->execute(array($id));
    }
}
