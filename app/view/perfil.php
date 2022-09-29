<?php
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>
    <main class="container text-center">
        <form method="post" action="../controller/usuario.php?action=alterar">
            <h3 class="mb-5"><?= $nomePagina; ?></h3>
            <hr>
            <label class="form-label">Id de Usuário</label>
            <input type="text" name="idUsuario" class="form-control w-25 m-auto" value="<?=$_SESSION['idUsuario']?>">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control w-25 m-auto" value="<?=$_SESSION['nome']?>">
            <label class="form-label">Sexo</label>
            <input type="text" name="sexo" class="form-control w-25 m-auto" value="<?=$_SESSION['sexo']?>">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control w-25 m-auto" placeholder="Informe sua senha" required>
            <label class="form-label">Confirmar Senha</label>
            <input type="password" name="confirmarSenha" class="form-control w-25 m-auto" placeholder="Informe sua senha" required>
            <button type="submit" class="btn btn-outline-dark mt-2">Editar</button>
            <br>
            <a href="../controller/usuario.php?action=excluir"><button type="button" class="btn btn-outline-danger mt-3">Excluir Conta</button></a>
        </form>
    </main>
</body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/home.js"></script>
</html>