emailDuplicado = "";
idUsuarioGlobal = "";

function abrirModalExclui(idUsuario) {
    idUsuarioGlobal = idUsuario;
    document.getElementById("modalConfirmaExcluiA").style = "display:block";
}

function fecharModalExclui() {
    document.getElementById("modalConfirmaExcluiA").style = "display: none";
}

function verificaConfirmacao () {
    input = document.getElementById("confirmarExclusaoA");
    confirma = document.getElementById("botaoConfirmaExcluiA");

    if(input.value.toLowerCase() == "confirmar") {
        confirma.style="display: block;";
    } else {
        confirma.style="display: none;";
    }
}

function confirmaExclusao() {
    document.getElementById("formAlteraA_" + idUsuarioGlobal).action = "../controller/usuario.php?action=excluir";
    document.getElementById("submitAlteraExcluiA_" + idUsuarioGlobal).click();
}

function verificaSenha(idUsuario) {
    let senha = document.getElementById("senha_" + idUsuario).value;
    let confirmarSenha = document.getElementById("confirmarSenha_" + idUsuario).value;

    if(confirmarSenha == "") {
        document.getElementById("confirmarSenha_" + idUsuario).style="border: none;";
    } else if (senha != confirmarSenha){
        document.getElementById("confirmarSenha_" + idUsuario).style="border: solid 2px #b11818;";
        return false;
    } else {
        document.getElementById("confirmarSenha_" + idUsuario).style="border: solid 2px #00c37e;";
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

function alterar(idUsuario) {
    document.getElementById("submitAlteraExcluiA_" + idUsuario).click();
}