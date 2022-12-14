<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Dinâmica</title>
    
    <!-- 2: Bootstrap CSS -->
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
  </head>
<body>
		<?php
        $CEP = $_POST["CEP"];
        $Logadouro = $_POST["Logadouro"];	
        $Bairro = $_POST["Bairro"];
        $Cidade = $_POST["Cidade"];
        echo <<<HTML 
    <table>
      <tr>
        <td>$CEP</th>
        <td>$Logadouro</th>
        <td>$Bairro</th>
        <td>$Cidade</th>
      </tr>
    </table>
    HTML;
		?>
</body>
</html>