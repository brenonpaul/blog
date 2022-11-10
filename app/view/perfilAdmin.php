<?php
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>
    <main class="container text-center">
        <form method="post" action="../controller/usuario.php?action=alterarUsuarioAdmin">
            <h3 class="mb-5"><?= $nomePagina; ?></h3>
            <hr>
            <label class="form-label">Id de Usuário</label>
            <input type="text" name="novaIdUsuario" class="form-control w-25 m-auto" value="<?=$usuario['usuario_id']?>">
            <input type="hidden" name="antigaIdUsuario" value="<?=$usuario['usuario_id']?>">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control w-25 m-auto" value="<?=$usuario['nome']?>">
            <label class="form-label mt-3">Sexo</label>
            <div class="mb-3  w-25 m-auto">
                <select name="sexo" class="form-select w-50 m-auto">
                    <?php 
                    if($usuario['sexo'] == "F") {
                    ?>
                        <option value="F" selected>Feminino</option>
                    <?php 
                    } else {
                    ?>
                        <option value="F">Feminino</option>
                    <?php   
                    }
                    
                    if($usuario['sexo'] == "M") {
                    ?>
                        <option value="M" selected>Masculino</option>
                    <?php 
                    } else {
                    ?>
                        <option value="M">Masculino</option>
                    <?php   
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-2">Editar</button>
            <br>
            <a href="../controller/usuario.php?action=excluir&idUsuario=<?=$usuario['usuario_id']?>"><button type="button" class="btn btn-outline-danger mt-3">Excluir Conta</button></a>
        </form>
    </main>
</body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/home.js"></script>
</html>