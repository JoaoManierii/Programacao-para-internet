<?php

require "contatos.php";

// coleta os dados do formulário
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

// cria um novo contato e acrescenta no arquivo de texto
$novoContato = new Contato($email);
$novoContato->AddToFile("email.txt");

require "senha.php";

$novaSenha = new Senha($senha);
$novaSenha-> carregaString("senhaHash.txt");


// redireciona o navegador para a página de listagem de contatos
header("location: listaContatos.php");

?>