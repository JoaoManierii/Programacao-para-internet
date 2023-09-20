<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

    $salMin = $_GET['salMin'] ?? '';

    $salMin = htmlspecialchars($salMin);

    if($salMin == null)
        $salMin = 0;

    function buscaSalario($pdo, $salMin)
    {
        $sql = <<<SQL
            SELECT nome,email,salario
            FROM pessoa, funcionario
            WHERE pessoa.codigo = funcionario.cod_pessoa AND funcionario.salario > ?
        SQL;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$salMin]);
        $row = $stmt->fetch();
        if (!$row) return "";
        return $row;
  } 
  catch (Exception $e) {
    exit('Falha: ' . $e->getMessage());
  }
}

$funcionarios = buscaSalario($pdo, $salMin);

header('Content-type: application/json');

echo json_encode($funcionarios);
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title>Questao 2</title>
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>cpf</th>
					<th>email</th>
					<th>admissao</th>
					<th>salario</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row = $stmt->fetch()){
                        $nome = htmlspecialchars($nome);
                        $cpf = htmlspecialchars($cpf);
                        $email = htmlspecialchars($email);
                        $admissao = htmlspecialchars($admissao);
                        $salario = htmlspecialchars($salario);
						echo <<<HTML
							<tr>
								<td>$nome</td>
								<td>$cpf</td>
								<td>$email</td>
								<td>$admissao</td>
								<td>$salario</td>
							</tr>
						HTML;
					}
				?>
			</tbody>
		</table>
	</body>
</html>

