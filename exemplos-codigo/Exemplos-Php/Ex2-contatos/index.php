<?php

class Contato
{
  public $nome;
  public $email;
  public $telefone;

  function __construct($nome, $email, $telefone)
  {
    $this->nome = $nome;
    $this->email = $email;
    $this->telefone = $telefone;
  }
}

function carregaContatosDeArquivo()
{
  $arrayContatos = null;
  
  // Abre o arquivo contatos.txt para leitura
  $arq = fopen("contatos.txt", "r");
  if ( !$arq )
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $contato = fgets($arq); 
    
    // Separa dados na linha utilizando o ';' como separador
    list($nome, $email, $telefone) = array_pad(explode(';', $contato), 3, null);

    // Cria novo objeto representado o contato e adiciona no final do array
    $novoContato = new Contato(
      htmlspecialchars($nome), 
      htmlspecialchars($email), 
      htmlspecialchars($telefone)
    );
    $arrayContatos[] = $novoContato;
  }
      
  // Fecha o arquivo
  fclose($arq);
  
  return $arrayContatos;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Dinâmica</title>
    
    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body>

<div class="container">
  
  <h3>Contatos Carregados do Arquivo <i>contatos.txt</i></h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
      </tr>
    </thead>
    
    <tbody>
		<?php
    $arrayContatos = carregaContatosDeArquivo();	
    if ($arrayContatos != NULL)
    {
      foreach ($arrayContatos as $contato)
      {        
        echo <<<HTML
        <tr>
          <td>$contato->nome</td>
          <td>$contato->email</td>
          <td>$contato->telefone</td>
        </tr>
        HTML;
      }
    }		
		?>
    </tbody>
  </table>
</div>

</body>
</html>