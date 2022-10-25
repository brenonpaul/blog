
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

function login() {
    $usuario = new Usuario;
    $query = $usuario->loginUsuario($_POST['nome'], $_POST['senha']);
    
    if ($query && mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_assoc($query);
        
        session_start();
        // var_dump($row);die();
        $_SESSION['idUsuario'] = $row['usuario_id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['sexo'] = $row['sexo'];
        
        header("Location: redirect.php?action=home");
    } else {
        session_start();
        $_SESSION['nome'] = $_POST['nome'];

        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Usuário ou senha incorretos";

        header("Location: redirect.php?action=telaLogin");
    }

}

function logoff() {
    session_start();
    session_destroy();
    header("Location: redirect.php?action=telaLogin");
}

function verificaEmail($email = NULL) {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }

    $consulta = new Consulta;
    $verificacao = $consulta->consultaDuplicidadeEmail($email);

    if (isset($_GET['email'])) {
        echo json_encode(['duplicidade' => $verificacao]);
    } else {
        return $verificacao;
    }
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

function excluir() {
    session_start();
    $usuario = new Usuario;
    // print_r();die();
    $exclusao = $usuario->excluirUsuario($_SESSION['idUsuario']);


    if ($exclusao) {
        $_SESSION['categoria'] = "Sucesso!";
        $_SESSION['mensagem'] = "Usuário excluído.";
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Usuário não foi excluído.";
    }

        header("Location: redirect.php?action=telaLogin");
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>