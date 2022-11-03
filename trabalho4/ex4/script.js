window.onload = function () { //o evento load ocorre qdo a página inteira e carregada
    const botaoAdicionar = document.querySelector("button"); //seleciona o botao definido no html e atribui uma variavel buscando no documento inteiro pela (document.)obs: const declara uma variavel imutavel e definida
    botaoAdicionar.addEventListener("click", adicionaInteresse); //adciona um interesse se tiver um click, usando a variavel criada "botaoAdicionar"

    const campoInteresse = document.querySelector("#interesse"); //
    campoInteresse.addEventListener("keyup", e => { //cria um evento na variavel campo de interesse quando o usuario pressionar e soltar uma tecla
        if (e.key === "Enter") // se a tecla pressionada e soltada for igual a tecla "Enter"
            adicionaInteresse(); // se o if for validado adcionara o interesse
    });
}


function adicionaInteresse() { // declaracao da funcao 
    const campoInteresse = document.querySelector("#interesse"); //seleciona o ID interesse definido no html e atribui uma variavel (campoInteresses) buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida
    const listaInteresses = document.querySelector("ol"); // seleciona o ol (Lista Ordenda)  definido no html e atribui uma variavel (listaInteresses) buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida
     
    const novoLi = document.createElement("li"); // cria o elemento na li definida no html e atribui uma variavel (novoLi) buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida
    const novoSpan = document.createElement("span"); //  cria o elemento na span definida no html e atribui uma variavel (novoSpan) buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida
    const novoBotao = document.createElement("button"); //   cria o elemento no button definido no html e atribui uma variavel (novoBotao) buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida

    novoSpan.textContent = campoInteresse.value; // Passa o valor adicionado pelo o usuario no campo de interesse para a nova Span
    novoBotao.textContent = '✖'; // Cria um novo botao de remover quando o novo interesse for adicionado

    novoLi.appendChild(novoSpan); //  acrescenta uma nova lista filha no novoSpan
    novoLi.appendChild(novoBotao);  // acrescenta uma nova lista filha no novoBotao
    listaInteresses.appendChild(novoLi); // acrescenta uma nova listaDeInteresseFilha filha na novalista


    novoBotao.onclick = function () { //declara a funcao novoBotao para remover as coisas da lista de interesse
        listaInteresses.removeChild(novoLi); // remove a filha da nova lista da lista de interesse
    } 
    campoInteresse.value = ''; //deixa o proximo campo de interesse para ser preenchivel
}