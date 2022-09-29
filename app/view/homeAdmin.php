<?php
if (!isset($_SESSION['tipoUsuario']) || (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] != 0)) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";
require_once ('../model/Consulta.php');

//session_destroy();
?>

<div id="modalAviso" class="modalAviso">
    <div class="modalConteudo">
        <div class="modalHeader" id="modalHeader">
            <span class="closeModal" onclick="fecharModal();">&times;</span>
            <h2 id="tituloModalAviso"><?= $categoria ?></h2>
        </div>
        <div class="modalBody">
            <p id="textoModalAviso"><?= $mensagem ?></p>
        </div>
    </div>
</div>

<section id="containerHomeA">
    <div id="modalConfirmaExcluiA">
        <div id="boxModalExcluiA">
            <span class="closeModalExcluiA" onclick="fecharModalExclui();">&times;</span>
            <b>ATENÇÃO:</b> 
            
            Deseja mesmo excluir sua conta? A ação não poderá ser desfeita.
            Caso deseje continuar, digite "confirmar".

            <input type="text" name="confirmarExclusao" id="confirmarExclusaoA" placeholder="..." onkeyup="verificaConfirmacao();">
            <button type="button" class="botaoAlterar-pushableA" id="botaoConfirmaExcluiA" onclick="confirmaExclusao();">
                <span class="botaoAlterar-shadowA"></span>
                <span class="botaoAlterar-edgeA" id="botaoExcluir-edgeA"></span>
                <span class="botaoAlterar-frontA" id="botaoExcluir-frontA">
                    EXCLUIR CONTA
                </span>
            </button>
        </div>
    </div>

    <div id="boxHomeA">
        <h1 id="tituloHomeA">Lista de usuários:</h1>
        <?php 
        
        $consulta = new Consulta;
        $query = $consulta->consultaUsuarios();

        if($query && mysqli_num_rows($query) != 0 ) {
            while($row = mysqli_fetch_assoc($query)) {
            ?>
        <div id="usuario_<?= $row['idUsuario'] ?>" class="usuario">
            <form method="POST" action="../controller/usuario.php?action=alterar" id="formAlteraA_<?=$row['idUsuario']?>">
                <input type="text" name="nome" class="inputAlteraA" value="<?=$row['nome']?>">
                <input type="email" name="email" id="email" class="inputAlteraA" onchange="verificaEmail();" value="<?=$row['email']?>">
                <input type="password" name="senha" id="senha_<?=$row['idUsuario']?>" class="inputAlteraA" onkeyup="verificaSenha()" placeholder="Senha">
                <input type="password" name="confirmarSenha" id="confirmarSenha_<?=$row['idUsuario']?>" class="inputAlteraA" onkeyup="verificaSenha('<?=$row['idUsuario']?>')" placeholder="Confirmar Senha">
                <input type="hidden" name="idUsuario" value="<?=$row['idUsuario']?>">
                <input type="hidden" name="homeAdmin" value="1">
                <input type="submit" id="submitAlteraExcluiA_<?=$row['idUsuario']?>" class="submitAlteraExcluiA">

                    <button type="button" class="botaoAlterar-pushableA" id="botaoExcluiA" onclick="abrirModalExclui('<?=$row['idUsuario']?>');">
                        <span class="botaoAlterar-shadowA"></span>
                        <span class="botaoAlterar-edgeA" id="botaoExcluir-edgeA"></span>
                        <span class="botaoAlterar-frontA" id="botaoExcluir-frontA">
                            &times;
                        </span>
                    </button>

                    <button type="button" class="botaoAlterar-pushableA" id="botaoAlteraA" onclick="alterar('<?=$row['idUsuario']?>');">
                        <span class="botaoAlterar-shadowA"></span>
                        <span class="botaoAlterar-edgeA"></span>
                        <span class="botaoAlterar-frontA" id="botaoAlterar-frontA">
                            A
                        </span>
                    </button>
            </form>
        </div>
        <?php
            }
        }
        ?>
    </div>
</section>
</body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/homeAdmin.js"></script>
</html>