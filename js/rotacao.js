let navTitle = document.querySelector('.nav-title > span');

let currentTime = new Date();
let currentHour = currentTime.getHours();
if(currentHour >= 0 && currentHour < 12) {
    navTitle.innerText = 'Bom dia';
} else if(currentHour >= 12 && currentHour < 18) {
    navTitle.innerText = 'Boa tarde';
} else {
    navTitle.innerText = 'Boa noite';
}