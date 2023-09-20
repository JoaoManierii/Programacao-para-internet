const form = document.getElementById('loginForm');
const alertDiv = document.createElement('div');

form.addEventListener('submit', function (event) {
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
   
    if (emailInput.value.trim() === '') {
        event.preventDefault();
        alertDiv.className = 'alert alert-danger mt-3';
        alertDiv.textContent = 'Falta o email ai parceria';
        form.appendChild(alertDiv);
    } 

    if (senhaInput.value.trim() === '') {
        event.preventDefault();
        alertDiv.className = 'alert alert-danger mt-3';
        alertDiv.textContent = 'Falta a senha ai jao';
        form.appendChild(alertDiv);

    }

    if (senhaInput.value.trim() === '' && emailInput.value.trim() === '') {
        event.preventDefault();
        alertDiv.className = 'alert alert-danger mt-3';
        alertDiv.textContent = 'Preenche tudo ai, ta faltando coisa';
        form.appendChild(alertDiv);

    } 

});

