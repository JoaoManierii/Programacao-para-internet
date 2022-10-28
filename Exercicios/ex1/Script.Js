document.addEventListener('DOMContentLoaded', function(){
    const nodesH1 = document.querySelectorAll("H1");
    for (let node of nodesH1)
    node.addEventListener("click", alteraConteudo) });

    function alteraConteudo(e) {
        e.target.texContent = "Obrigado";
    }