var tabuleiro;
var board;
var aviso;
var jogador;

function inicia() {
    tabuleiro = new Array(3);
    board = document.getElementById('board');
    aviso = document.getElementById('aviso');
    jogador = 1;

    for (let i = 0; i < 3; i++)
        tabuleiro[i] = new Array(3);

    for (let i = 0; i < 3; i++)
        for (let j = 0; j < 3; j++)
            tabuleiro[i][j] = 0;

    criarTabuleiro();
}

function criarTabuleiro() {
    for (let i = 0; i < 3; i++) {
        var row = document.createElement('tr');
        for (let j = 0; j < 3; j++) {
            var cell = document.createElement('td');
            cell.addEventListener('click', function () {
                marcarCelula(i, j);
            });
            row.appendChild(cell);
        }
        board.appendChild(row);
    }
}

function marcarCelula(lin, col) {
    if (tabuleiro[lin][col] === 0) {
        tabuleiro[lin][col] = jogador;
        exibe();
        jogador = jogador === 1 ? -1 : 1;
        checa();
    }
}

function exibe() {
    var cells = board.getElementsByTagName('td');
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            var index = i * 3 + j;
            if (tabuleiro[i][j] === 1) {
                cells[index].className = 'marked-x';
                cells[index].textContent = 'X';
            } else if (tabuleiro[i][j] === -1) {
                cells[index].className = 'marked-o';
                cells[index].textContent = 'O';
            } else {
                cells[index].className = '';
                cells[index].textContent = '';
            }
        }
    }
}

function reiniciarJogo() {
    for (let i = 0; i < 3; i++)
        for (let j = 0; j < 3; j++)
            tabuleiro[i][j] = 0;

    exibe();
    jogador = 1;
    aviso.textContent = '';
}


function jogar() {
    aviso.innerHTML = 'Vez do jogador: ' + ((jogador) % 2 + 1);
    lin = parseInt(document.getElementById("lin").value) - 1;
    col = parseInt(document.getElementById("col").value) - 1;

    if (tabuleiro[lin][col] == 0)
        if (jogador % 2)
            tabuleiro[lin][col] = 1;
        else
            tabuleiro[lin][col] = -1;
    else {
        aviso.innerHTML = 'Campo ja foi marcado!'
        jogador--;
    }

    jogador++;
    exibe();
    checa();
}

function checa() {
    var soma;

    //Linhas
    for (let i = 0; i < 3; i++) {
        soma = 0;
        soma = tabuleiro[i][0] + tabuleiro[i][1] + tabuleiro[i][2];

        if (soma == 3 || soma == -3)
            aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Linha " + (i + 1) + " preenchida!";
    }

    //Colunas
    for (let i = 0; i < 3; i++) {
        soma = 0;
        soma = tabuleiro[0][i] + tabuleiro[1][i] + tabuleiro[2][i];

        if (soma == 3 || soma == -3)
            aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Coluna " + (i + 1) + " preenchida!";
    }

    //Diagonal
    soma = 0;
    soma = tabuleiro[0][0] + tabuleiro[1][1] + tabuleiro[2][2];
    if (soma == 3 || soma == -3)
        aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";

    //Diagonal
    soma = 0;
    soma = tabuleiro[0][2] + tabuleiro[1][1] + tabuleiro[2][0];
    if (soma == 3 || soma == -3)
        aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";
}

