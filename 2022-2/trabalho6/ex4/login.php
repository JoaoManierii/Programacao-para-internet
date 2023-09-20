<?php

    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

    function salvaString($string, $arquivo){
    $arq = fopen($arquivo, "w");
    fwrite($arq, $string);
    fclose($arq);
    }

    function carregaString($arquivo){
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
    }

    salvaString($email, "email.txt");
    salvaString($senha, "senhaHash.txt");

    $email = htmlspecialchars(carregaString("email.txt"));
    $senha = htmlspecialchars(carregaString("senhaHash.txt"));

    echo "Salvamos suas informaçoes meu faixa";

    echo <<<HTML
    <table> 
        <tr>
            <td> Email: $email </td> <br>
            <td> Senha: $senha </td>
        </tr>
    </table>

HTML;
    

?>