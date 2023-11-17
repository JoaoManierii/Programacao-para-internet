<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "conexao.php";

    $moeda_origem = $_POST['moeda_origem'];
    $moeda_destino = $_POST['moeda_destino'];
    $valor = $_POST['valor'];

    
    echo "Valor convertido: RESULTADO";
}
?>
