window.onload = (event) => {
    document.querySelectorAll('h2').forEach(e => {
        e.addEventListener('click', () => {
            e.nextElementSibling.style.display = "none";
        });
        e.addEventListener('dblclick', () => {
            e.nextElementSibling.style.display = "block";
        })
    });
};