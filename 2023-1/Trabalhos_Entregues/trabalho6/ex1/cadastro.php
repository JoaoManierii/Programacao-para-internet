<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Cadastra usuario</title>
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
                <h1>Cadastro de Usuário</h1>
                <form action="processar_cadastro.php" method="POST">

                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required />


                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required />


                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required />

                    <div class="cadastro">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" />
                        <a href="login.php" class="btn">Já tenho cadastro</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>