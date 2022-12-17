<?php

class Senha
{
  public $senha;

  function __construct($senha)
  {
    $this->senha = password_hash($senha, PASSWORD_DEFAULT);
;
  }

  function salvaString($string, $arquivo)
  {
   $arq = fopen($arquivo, "senhaHash.txt");
   fwrite($arq, $string);
   fclose($arq);
  }
}
function carregaContatosDeArquivo()
{
  $arraySenha = null;

  // Abre o arquivo email.txt para leitura
  $arq = fopen("senhaHash.txt", "r");
  if (!$arq)
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $contato = fgets($arq);

    // Separa dados na linha utilizando o ';' como separador
    list($senha) = array_pad(explode(';', $contato), 1, null);

    // Cria novo objeto representado o contato e adiciona no final do array
    $novaSenha = new Senha($senha);
    $arraySenha[] = $novaSenha;
  }

  // Fecha o arquivo
  fclose($arq);
  return $arraySenha;
}

?>