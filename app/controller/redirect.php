<?php
require_once("../model/Consulta.php");

function telaLogin() {
    session_start();
    $nomePagina = "Blog do Povo | Login";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";

    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/telaLogin.php';
}

function telaCadastro() {
    session_start();
    $nomePagina = "Tela de Cadastro | Box";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";

    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/telaCadastro.php';
}

function home() { 
    session_start();
    $nomePagina = "Blog do Povo | Home";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";
    $post = new Consulta();
    $posts = $post->consultaPosts();
    $rowPost = array();
    $i = 0;
    while($row = mysqli_fetch_assoc($posts)) {
        $rowPost[$i]['descricao'] = $row['descricao'];
        $rowPost[$i]['nome'] = $row['nome'];
        $i++;
    }
       
    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/home.php';
}

function perfil() { 
    session_start();
    $nomePagina = "Seu Perfil | Home";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";
       
    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/perfil.php';
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>