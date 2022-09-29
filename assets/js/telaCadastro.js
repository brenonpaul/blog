emailDuplicado = "";

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

function verificaSenha() {
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    if(confirmarSenha == "") {
        document.getElementById("confirmarSenha").style="border: none;";
    } else if (senha != confirmarSenha){
        document.getElementById("confirmarSenha").style="border: solid 2px #b11818;";
        document.getElementById("botaoCadastro").style="display: none";
        return false;
    } else {
        document.getElementById("confirmarSenha").style="border: solid 2px #00c37e;";
        document.getElementById("botaoCadastro").style="display: block";
        return true;
    }
}

function cadastrar() {
    if (verificaSenha()) {
        if (emailDuplicado != document.getElementById("email").value){
            document.getElementById("submitCadastro").click();
        } else {
            emailDuplicado = document.getElementById("email").value;
            mensagem.innerHTML = "Este e-mail já está cadastrado! Por favor informe outro.";
            categoria.innerHTML = "Aviso";
            document.getElementById("modalHeader").style = "background-color: #b11818";
            modalAviso();
        }
    }
}