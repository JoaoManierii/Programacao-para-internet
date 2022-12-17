<?php

class Contato
{
  public $email;
  function __construct($email)
  {

    $this->email = $email;
;
  }

  public function AddToFile($arquivo)
  {
    // abre o arquivo para escrita de conteúdo no final
    $arq = fopen($arquivo, "a");
    fwrite($arq, "\n{$this->email}");
    fclose($arq);
  }
}

function carregaContatosDeArquivo()
{
  $arrayContatos = null;

  // Abre o arquivo email.txt para leitura
  $arq = fopen("email.txt", "r");
  if (!$arq)
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $contato = fgets($arq);

    // Separa dados na linha utilizando o ';' como separador
    list($email) = array_pad(explode(';', $contato), 1, null);

    // Cria novo objeto representado o contato e adiciona no final do array
    $novoContato = new Contato($email);
    $arrayContatos[] = $novoContato;
  }

  // Fecha o arquivo
  fclose($arq);
  return $arrayContatos;
}

?>