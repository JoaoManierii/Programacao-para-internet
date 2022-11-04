window.onload = function () { //o evento load ocorre qdo a página inteira e carregada
    buttons = document.querySelectorAll("nav button"); // seleciona todos os botoes dentro do elemento nav
    for (let button of buttons) { // laco de botao para botoes, cria a variavel locak button
        button.onclick = () => openTab(button.dataset.tabname); //passa como argumento o valor do atributo personalizado criado no HTML
    }
    openTab("BCC"); //define o codigo acima primariamente para o valor criado no HTML
}

function openTab(tabName) { // define o codigo da funcao tabName
    const lastTabActive = document.querySelector(".tabActive"); // seleciona a classe "tabActive" definido no html e atribui uma variavel (LastTabActive) buscando no documento 
    if (lastTabActive !== null) // se a ultima tabela ativa for diferente de nula o if executa a instrucao abaixo
    lastTabActive.className = " "; //deixa valido para quando o proximo click for executado o codigo acima ocorra

    const query1 = ".tabs > section[data-tabname = '" + tabName + "']"; // seleciona o elemento section que tem o atributo personalizado com o atributo igual ao que foi passado como argumento
    const query2 = "nav button[data-tabname='" + tabName + "']"; // seleciona o elemento button que tem o atributo personalizado com o atributo igual ao que foi passado como argumento

    document.querySelector(query1).className="tabActive"; //seleciona em todo documento a query 1 verificando se a tab esta ativa
    document.querySelector(query2).className="buttonActive";//seleciona em todo documento a query 2 verificando se o button esta ativo
}