let mensagem = document.getElementById("textoModalAviso");
let categoria = document.getElementById("tituloModalAviso");

if (mensagem.innerHTML != "") {
    if (categoria.innerHTML == "Erro" || categoria.innerHTML == "Aviso") {
        document.getElementById("modalHeader").style = "background-color: #b11818";
    }
    modalAviso();
}

function modalAviso () {
    document.getElementById("modalAviso").style = "display: block";
}

function fecharModal() {
    document.getElementById("modalAviso").style = "display: none";
}

window.onclick = function(event) {
    if (event.target == document.getElementById("modalAviso")) {
        document.getElementById("modalAviso").style.display = "none";
    }
}