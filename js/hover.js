let cores = {
    'target': '#faa700',
    'bell': '#ea4e43',
    'list': '#076097'
}


let botoes = document.querySelectorAll('.svgs');
let util = document.querySelectorAll('.utility');

for(let i = 0; i < 3; i++) {
    util[i].addEventListener('mouseover', () => {
        botoes[i].style.fill = cores[botoes[i].ariaLabel];
    });
    util[i].addEventListener('mouseout', () => {
        botoes[i].style.fill = '#0000005f';
    });
}
