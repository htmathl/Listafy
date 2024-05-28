let btnCreate = document.getElementById('btnCreate');
let popup = document.querySelector('#popup');
let form = document.querySelector('#popup > div > form');

btnCreate.addEventListener('click', () => {
    popup.style.display = 'block';
    form.style.display = 'flex';

    
});