emailDuplicado = "";

function abrirModalExclui() {
    document.getElementById("modalConfirmaExclui").style = "display:block";
}

function fecharModalExclui() {
    document.getElementById("modalConfirmaExclui").style = "display: none";
}

function verificaConfirmacao () {
    input = document.getElementById("confirmarExclusao");
    confirma = document.getElementById("botaoConfirmaExclui");

    if(input.value.toLowerCase() == "confirmar") {
        confirma.style="display: block;";
    } else {
        confirma.style="display: none;";
    }
}

function confirmaExclusao() {
    document.getElementById("formAltera").action = "../controller/usuario.php?action=excluir";
    document.getElementById("submitAlteraExclui").click();
}

function verificaSenha() {
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    if(confirmarSenha == "") {
        document.getElementById("confirmarSenha").style="border: none;";
    } else if (senha != confirmarSenha){
        document.getElementById("confirmarSenha").style="border: solid 2px #b11818;";
        return false;
    } else {
        document.getElementById("confirmarSenha").style="border: solid 2px #00c37e;";
        return true;
    }
}

function verificaEmail() {
    var email = document.getElementById('email').value;
    const url = '../controller/usuario.php?action=verificaEmail&email=' + email;

    fetch(url)
    .then((resp) => resp.json())
    .then(function(data) {
        if(data.duplicidade) {
            emailDuplicado = document.getElementById("email").value;
            mensagem.innerHTML = "Este e-mail já está cadastrado! Por favor informe outro.";
            categoria.innerHTML = "Aviso";
            document.getElementById("modalHeader").style = "background-color: #b11818";
            modalAviso();
        }
    });
}

function alterar() {
    document.getElementById("submitAlteraExclui").click();
}