window.onload = function () { //o evento load ocorre qdo a página inteira e carregada
    const modal = document.querySelector(".modal"); //seleciona a classe "modal" definida no html e atribui uma variavel buscando no documento inteiro pela (document.)obs: const declara uma variavel imutavel e definida
    const buttonClose = modal.querySelector(".buttonClose"); //busca o botao dentro da div e seleciona a classe "buttonClose" obs: const declara uma variavel imutavel e definida

    buttonClose.addEventListener("click", function (){ // busca o evento click na variavel "buttonClose" e executa o conteudo
        modal.style.display = 'none'; //modifica o display via CSS da classe modal
    });

    const buttonOpenModal = document.getElementById("btnOpenModal"); //seleciona o ID "btnOpenModal" definida no html e atribui uma variavel buscando no documento inteiro pela (document.) obs: const declara uma variavel imutavel e definida
    buttonOpenModal.addEventListener("click", function() { // busca o evento click na variavel "buttonOpenModal" e executa o conteudo
        modal.style.display = 'block'; //modifica o display via CSS da classe modal
    })
}