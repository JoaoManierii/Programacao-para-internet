<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        .cadastro {
            display: flex;
            gap: 10px;
            margin: 15px;
        } 
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Login</h1>
                <form action="" method="POST">

                    <label for="usuario">Usuário(CPF):</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ex:123"/>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Ex:123">

                    <div class="cadastro">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                        <a href="cadastro.php" class="btn">Nao tenho cadastro</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php
    session_start();
    if(isset($_POST["usuario"]) && isset($_POST["senha"])) {
        require_once "conexao.php";
        require_once "UsuarioEntidade.php";
        
        $conn = new Conexao();

        $sql = "SELECT * FROM usuarios WHERE cpf = ? and senha = ?";
        $stmt = $conn->conexao->prepare( $sql );

        $stmt->bindParam(1, $_POST["usuario"]);
        $stmt->bindParam(2, $_POST["senha"]);

        $resultado = $stmt->execute();

        if($stmt->rowCount() == 1) {

            $usuario = new UsuarioEntidade();
            
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $usuario->setCpf($rs->cpf);
                $usuario->setNome($rs->nome);
            }

            $_SESSION["login"] = "1";
            $_SESSION["usuario"] = $usuario;
            header("Location: home.php");
        }
        else {
            echo "Usuário ou senha inválidos";
        }
    }
?>
</body>
</html>