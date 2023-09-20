window.onload = (event) => {
    dono = document.getElementById('dono');

    dono.addEventListener('click', () => {
        dono.innerHTML = 'Dono do curriculo';
    })
    document.querySelectorAll('h2').forEach(e => {
        e.addEventListener('click', () => {
            e.innerHTML = 'Obrigado';
        })
    });
};

