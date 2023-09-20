<?php

    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

    function salvaString($string, $arquivo){
    $arq = fopen($arquivo, "w");
    fwrite($arq, $string);
    fclose($arq);
}
    
    salvaString($email, "email.txt");
    salvaString($senha, "senhaHash.txt");

    echo "Salvamos suas informaçoes  meu faixa";

?>