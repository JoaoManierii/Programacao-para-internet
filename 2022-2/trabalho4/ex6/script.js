window.onload = function () {//o evento load ocorre qdo a página inteira e carregada
    document.forms.formCadastro.onsubmit = validaForm; // quando o formulario for submetido a funcao eh chamada
}

function validaForm (e) { // essa funcao verifica se todos os campos sao preenchidos, se for ela devolve valido
    let form = e.target; // declara a variavel 
    let formValido = true; // declara a variavel 

    const spanUsuario = form.usuario.nextElementSibling; //declara a constante spanUsuario
    const spanSenha = form.senha.nextElementSibling;//declara a constante spanSenha
    const spanEmail = form.email.nextElementSibling;//declara a constante spanEmail

    spanUsuario.textContent = ""; //inicia os spans como vazios 
    spanSenha.textContent = "";//inicia os spans como vazios 
    spanEmail.textContent = "";//inicia os spans como vazios 

    if (form.usuario.value === "") { //verifica se o campo do formulario foi preenchido ou nao, se nao foi emite o alerta na tela 
        spanUsuario.textContent = 'O usuario deve ser preenchido';
        formValido = false;
    }

    if (form.senha.value === "") {//verifica se o campo do formulario foi preenchido ou nao, se nao foi emite o alerta na tela 
        spanSenha.textContent = 'A senha deve ser preenchida';
        formValido = false;
    }

    if (form.email.value === "") {//verifica se o campo do formulario foi preenchido ou nao, se nao foi emite o alerta na tela 
        spanEmail.textContent = 'O email deve ser preenchido';
        formValido = false;
    }

    return formValido; // se nao cair em nenhum dos lacos condicionais o formulario eh considerado valido 
}