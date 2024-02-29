const input = document.querySelector('#cpf');

input.addEventListener('keypress', () => {
    let inputLength = input.value.length

    if (inputLength === 3 || inputLength === 7 ) {
        input.value += '.'
    } else if (inputLength === 11) {
        input.value += '-'
    }
})

function mostrarsenha() {
    var tipo = document.getElementById("senha");
    if (tipo.type == "password") {
        tipo.type = "text"
        check.innerHTML = "Ocultar";
    } else if (tipo.type == "text") {
        tipo.type = "password";
        check.innerHTML = "Mostrar";
    }
}

function mostrarsenha2() {
    var tipo = document.getElementById("senha2");
    var check = document.getElementById("check2")
    if (tipo.type == "password") {
        tipo.type = "text"
        check.innerHTML = "Ocultar"

    } else if (tipo.type == "text") {
        tipo.type = "password"
        check.innerHTML = "Mostrar"
    }
}

const cell = document.querySelector('#tel');

cell.addEventListener('keypress', () => {
    let cellLenght = cell.value.length

    if (cellLenght === 0) {
        cell.value += '('
    } else if (cellLenght === 3) {
        cell.value += ') '
    } else if (cellLenght === 10) {
        cell.value += '-'
    }
})