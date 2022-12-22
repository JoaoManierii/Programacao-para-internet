<?php

    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    function carregaString($arquivo){
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
    }

  
    function validaEmail($email,$emaill){
        if($email==$emaill){
        return true;
        }
        else{
        return false;
        }
    }


    $loginarqv = carregaString("email.txt");
    $senhaarqv =carregaString("senhaHash.txt");
    

    if(password_verify($senha,$senhaarqv)and validaEmail($loginarqv,$login)){
        header("Location: novapagina.php");
        exit();
    }
    else{
        echo "Tu nao ta acertando o email ou a senha pae, foca ai e tenta dnv";
    } 
    
?>