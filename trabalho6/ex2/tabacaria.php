<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ex1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <main>
    <?php
    $produtos = array("Vape","Pod","Mod","Tabaco","Juriti","Caximbo","Malboro","Seda","Palheiro","Charuto");

    $descricao = array(
        "Vape"      =>  "Vapezera dos crias",
        "Pod"       =>  "Aquela nicotina braba",
        "Mod"       =>  "Cigarro de Ferro",
        "Tabaco"         =>  "Fumante raiz",
        "Juriti"       =>  "Pra relazar joga a fumaca pro ar",
        "Caximbo"        =>  "Seculo XV fellings",
        "Malboro"          =>  "Estilo Cachorro, caro porem estiloso",
        "Seda"     =>  "Cada qual com seu cada qual",
        "Palheiro"   =>  "Direto de minas so",
        "Charuto"           =>  "De vilao"
    );

        $n = $_GET["qde"];
        $ls = [];

        for ($i = 1 ; $i<$n+1;$i++) {
            $num = rand(0,9);
            $tp = $produtos[$num];

            echo <<<HTML
                <table class="table table-striped table-dark">
                    <div class="row" >
                        <div class="col-2">$i</div>
                        <div class="col">$tp</div>
                        <div class="col">$descricao[$tp]</div>
                    </div>
                </table>
            HTML;
        }
            ?>
  </main>
</body>

</html>