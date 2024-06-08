let btnCreate = document.getElementById('btnCreate');
let popup = document.querySelector('#popup-create-todo');
let popupContent = document.querySelector('#popup-create-todo > div');
let form = document.querySelector('#popup-create-todo > div > form');
let btnCancelar = document.querySelector('#button-cancel');

btnCreate.addEventListener('click', () => {
    popup.style.display = 'block';
    btnCreate.classList.add('.active');
});

btnCancelar.addEventListener('click', () => {
    popup.style.display = 'none'
    btnCreate.classList.remove('.active');
});