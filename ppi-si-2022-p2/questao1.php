<?php

	require "conexaoMysql.php";
	$pdo = mysqlConnect();

	$nome = $_POST["func_nome"] ?? "";
	$cpf = $_POST["func_cpf"] ?? "";
	$email = $_POST["func_email"] ?? "";

	$admissao = $_POST["func_admissao"] ?? "";
	$salario = $_POST["func_salario"] ?? "";

	$nome = htmlspecialchars($nome);
	$cpf = htmlspecialchars($cpf);
	$email = htmlspecialchars($email);
	$admissao = htmlspecialchars($admissao);
	$salario = htmlspecialchars($salario);

	$sqlpessoa = <<<SQL
		INSERT INTO pessoa(nome, cpf, email)
		VALUES(?, ?, ?)
	SQL;

	$sqlfuncionario = <<<SQL
		INSERT INTO funcionario(data_admissao, salario, cod_pessoa)
		VALUES(?, ?, ?)
	SQL;

	try{

		$pdo->beginTransaction();

		$stmt = $pdo->prepare($sqlpessoa);
		if(!$stmt->execute([$nome, $cpf, $email]))
			throw new Exception('Falha ao cadastrar pessoa');

		$cod_pessoa= $pdo->lastInsertId();

		$stmt = $pdo->prepare($sqlfuncionario);
        if(!$stmt->execute([$admissao, $salario, $cod_pessoa]))
            throw new Exception('Falha ao cadastrar funcionario');

		$pdo->commit();
		header("location: questao1.html");
        exit();

	}
	catch (Exception $e){
        $pdo->rollBack();
        exit('Falha inesperada: ' . $e->getMessage());
	}
?>