
<?php
require_once ('../model/Usuario.php');
require_once ('../model/Consulta.php');
require_once ('../model/Post.php');

function cadastrarPost() {
    $post = new Post;
    $cadastro = $post->cadastraPost($_POST['descricao'], $_POST['idUsuario']);
    
    session_start();
    if ($cadastro) {
        $_SESSION['categoria'] = "Sucesso!";
        $_SESSION['mensagem'] = "Usuário cadastrado!";
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Ocorreu um erro durante o cadastro.";
    }

    header("Location: redirect.php?action=home");
}

function alterar() {
    session_start();
    $usuario = new Usuario;

    if($_POST['senha'] == $_POST['confirmarSenha']) {
        $alteracao = $usuario->alteraUsuario($_POST['idUsuario'], $_POST['nome'], $_POST['sexo'], $_POST['senha']);
        if ($alteracao) {
            $_SESSION['categoria'] = "Sucesso!";
            $_SESSION['mensagem'] = "Usuário alterado!";

            $_SESSION['nome'] = $_POST['nome'] != NULL ? $_POST['nome'] : $_SESSION['nome'];
            $_SESSION['sexo'] = $_POST['sexo'] != NULL ? $_POST['sexo'] : $_SESSION['sexo'];
        } else {
            $_SESSION['categoria'] = "Erro";
            $_SESSION['mensagem'] = "Ocorreu um erro durante a alteração.";
        }
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "A confirmação de senha está incorreta!";
    }

    header("Location: redirect.php?action=perfil");
}

function excluirPost() {
    session_start();
    $post = new Post;
    // print_r();die();
    $exclusao = $post->excluirPost($_GET['idPost']);


    if ($exclusao) {
        $_SESSION['categoria'] = "Sucesso!";
        $_SESSION['mensagem'] = "Post excluído.";
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Post não foi excluído.";
    }

        header("Location: redirect.php?action=home");
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>