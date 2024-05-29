let btnCreate = document.getElementById('btnCreate');
let popup = document.querySelector('#popup-create-todo');
let form = document.querySelector('#popup-create-todo > div > form');
let btnCancelar = document.querySelector('#button-cancel');

btnCreate.addEventListener('click', () => {
    popup.style.display = 'block';
    form.style.display = 'flex';
});

btnCancelar.addEventListener('click', () => {
    popup.style.display = 'none';
    form.style.display = 'none';
});