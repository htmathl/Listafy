let btnUpdate = document.getElementById('btnUpdate');
let btnU = document.querySelectorAll('.btnUs');
let updateTodo = document.getElementById('updateTodo');
let buttonCancelUpd = document.getElementById('button-cancel-upd');

btnU.forEach((btn) => {
    btn.addEventListener('click', () => {
        updateTodo.style.display = 'block';
    });
});

function updateForm(titulo, conteudo, id) {
    document.getElementById('updateTitle').value = titulo;
    document.getElementById('updateContent').value = conteudo;
    document.getElementById('notaId').value = id;
    // Scroll para o formulário para melhorar a UX
    document.querySelector('.updateTodo').scrollIntoView({ behavior: 'smooth' });
}

buttonCancelUpd.addEventListener('click', () => {
    updateTodo.style.display = 'none';
});
