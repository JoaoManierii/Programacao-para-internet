<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Dinâmica</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <main>
    <?php
    $cep = $_POST["cep"];
    $logadouro = $_POST["logadouro"];	
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    
    echo <<<HTML
        <div class="row">
          <div class="col-sm">$cep</div>
          <div class="col-sm">$estado</div>
          <div class="col-sm">$cidade</div>
          <div class="col-sm">$bairro</div>
          <div class="col-sm">$logradouro</div>
        </div>
  HTML;
    ?>
  </main>
</body>

</html>