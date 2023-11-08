<?php

require "conexao.php";
$pdo = new PDO('mysql:host=sql112.infinityfree.com;dbname=if0_34794607_meu_banco', 'if0_34794607', 'jlvEaytnSLlWZ');


try {

    $sql = <<<SQL
  SELECT cpf, nome, senha
  FROM usuarios 
  SQL;

    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Lista Usuario</title>
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Senha</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                while ($row = $stmt->fetch()) {
                    $cpf = htmlspecialchars($row['cpf']);
                    $nome = htmlspecialchars($row['nome']);
                    $senha = htmlspecialchars($row['senha']);
                    echo <<<HTML
              <tr>
                <td>$cpf</td>
                <td>$nome</td>
                <td>$senha</td>
              </tr>
            HTML;
                }
                ?>
            </tbody>
        </table>

        <button id="limparTabela" class="btn btn-danger">Limpar Tabela</button>

        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="cadastro.php" class="btn btn-primary">Cadastro</a>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "paging": true,
                "ordering": true,
                "searching": true
            });

            $("#limparTabela").on("click", function () {

                $('#example').DataTable().clear().draw();

            });
        });
    </script>
</body>

</html>