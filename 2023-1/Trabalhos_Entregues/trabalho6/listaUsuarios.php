<?php

require "conexao.php";
$pdo = new PDO('mysql:host=sql112.infinityfree.com;dbname=if0_34794607_meu_banco', 'if0_34794607', 'jlvEaytnSLlWZ');


try {

    $sql = <<<SQL
  SELECT cpf, nome, senha
  FROM usuarios 
  SQL;

    // Neste exemplo não é necessário utilizar prepared statements
    // porque não há possibilidade de injeção de SQL, 
    // pois nenhum parâmetro é utilizado na query SQL
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Lista Usuario</title>
</head>

<body>
    <script>
        new DataTable('#example');
    </script>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Senha</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Vulttur</td>
                <td>Joao</td>
                <td>123</td>
            </tr>
            <tr>
                <td>Meiota</td>
                <td>Ana</td>
                <td>1234</td>
            </tr>
            <tr>
                <td>Gaspar</td>
                <td>Ismael</td>
                <td>12345</td>
            </tr>
            <?php
            while ($row = $stmt->fetch()) {

                // Limpa os dados produzidos pelo usuário
                // com possibilidade de ataque XSS
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
        <tfoot>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Senha</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>