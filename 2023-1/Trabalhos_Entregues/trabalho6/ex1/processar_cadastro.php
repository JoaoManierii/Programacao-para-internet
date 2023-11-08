<?php
session_start();

if(isset($_POST["cpf"]) && isset($_POST["nome"]) && isset($_POST["senha"])) {
    require_once "conexao.php"; 
    $conn = new Conexao();

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];


    $verifica_sql = "SELECT cpf FROM usuarios WHERE cpf = ?";
    $verifica_stmt = $conn->conexao->prepare($verifica_sql);
    $verifica_stmt->bindParam(1, $cpf);
    $verifica_stmt->execute();

    if($verifica_stmt->rowCount() > 0) {
        echo "CPF já está em uso. Por favor, escolha outro.";
    } else {

        $inserir_sql = "INSERT INTO usuarios (cpf, nome, senha) VALUES (?, ?, ?)";
        $inserir_stmt = $conn->conexao->prepare($inserir_sql);
        $inserir_stmt->bindParam(1, $cpf);
        $inserir_stmt->bindParam(2, $nome);
        $inserir_stmt->bindParam(3, $senha);

        if($inserir_stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário. Tente novamente.";
        }
    }
} else {
    echo "Todos os campos são obrigatórios.";
}
echo '<br><a href="login.php">Voltar para a tela de login</a>';
?>
