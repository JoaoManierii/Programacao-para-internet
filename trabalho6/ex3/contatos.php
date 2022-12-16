<?php

class Contato
{

  public $email;
  public $senha;

  function __construct($email, $senha)
  {

    $this->email = $email;
    $this->senha = $senha;
  }

  public function AddToFile($arquivo)
  {
    // abre o arquivo para escrita de conteúdo no final
    $arq = fopen($arquivo, "a");
    fwrite($arq, "\n{$this->email};{$this->senha}");
    fclose($arq);
  }
}

function carregaContatosDeArquivo()
{
  $arrayContatos = null;

  // Abre o arquivo contatos.txt para leitura
  $arq = fopen("email.txt", "r");
  if (!$arq)
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $contato = fgets($arq);

    // Separa dados na linha utilizando o ';' como separador
    list($email, $senha) = array_pad(explode(';', $contato), 2, null);

    // Cria novo objeto representado o contato e adiciona no final do array
    $novoContato = new Contato($email, $senha);
    $arrayContatos[] = $novoContato;
  }

  // Fecha o arquivo
  fclose($arq);
  return $arrayContatos;
}

?>