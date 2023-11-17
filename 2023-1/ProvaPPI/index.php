<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Conversor de Moedas</title>
</head>

<body>
    <h1>Conversor de Moedas</h1>

    <form action="conversor.php" method="post">
        <label for="moeda_idmoeda1">Moeda Origem:</label>
        <select name="moeda_idmoeda1" id="moeda_idmoeda1">
            <option value="">Selecione a moeda origem</option>
            <?php
            require_once "conexao.php";
            $conn = new Conexao();

            $consulta = $conexao->query('SELECT * FROM moeda');

            while ($moeda = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $moeda['simbolo'] . '">' . $moeda['nome'] . '</option>';
            }
            ?>
        </select>

        <label for="moeda_idmoeda2">Moeda Destino:</label>
        <select name="moeda_idmoeda2" id="moeda_idmoeda2">
            <option value="">Selecione a moeda destino</option>
            <?php
            $consulta = $conexao->query('SELECT * FROM moeda');

            while ($moeda = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $moeda['simbolo'] . '">' . $moeda['nome'] . '</option>';
            }
            ?>
        </select>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" required>

        <button type="submit">Converter</button>
    </form>
</body>

</html>