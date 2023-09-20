const form = document.getElementById('loginForm');

form.addEventListener('submit', function (event) {
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
   
    let valido = true;

    if (emailInput.value.trim() === '') {
        emailInput.classList.add('is-invalid');
        valido = false;
    } else {
        emailInput.classList.remove('is-invalid');
    }

    if (senhaInput.value.trim() === '') {
        senhaInput.classList.add('is-invalid');
        valido = false;
    } else {
        senhaInput.classList.remove('is-invalid');
    }

    if (!valido) {
        event.preventDefault();
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger mt-3';
        alertDiv.textContent = 'Preencha os campos corretamente';
        form.appendChild(alertDiv);
    }
});

