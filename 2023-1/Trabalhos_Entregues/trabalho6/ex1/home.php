<?php
    require_once "UsuarioEntidade.php";
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
        header("Location: login.php");
    }
    else {
        $usuario = $_SESSION["usuario"];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendendo PHP</title>
</head>
<body>
    <h1>Ola, <?= $usuario->getNome();?>!!!</h1>
    <h2>Seu CPF é <?= $usuario->getCpf();?></h2>
    <h3>
     <a href="listaUsuarios.php">Veja aqui os usuarios cadastrados</a>
    </h3>
    <form action="" method="POST">
        <input type="submit" value="Sair"/>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_destroy();
            header("Location: login.php");
        }
    ?>
</body>
</html>