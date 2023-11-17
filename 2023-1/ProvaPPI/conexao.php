<?php
class Conexao {
    public $conexao;

    function __construct() {
        if (!isset($this->conexao)) {
            try {
                $this->conexao = new PDO('mysql:host=sql112.infinityfree.com;dbname=if0_34794607_meu_banco', 'if0_34794607', 'jlvEaytnSLlWZ');
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    function fecharConexao(){
        if (isset($this->conexao)) {
            $this->conexao = null;
        }
    }
}
?>