let btnCreate = document.getElementById('btnCreate');
let popup = document.querySelector('#popup-create-todo');
let form = document.querySelector('#popup-create-todo > div > form');

btnCreate.addEventListener('click', () => {
    popup.style.display = 'block';
    form.style.display = 'flex';

    
});