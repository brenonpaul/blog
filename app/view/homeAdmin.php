<?php
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] == 0 || $_SESSION['tipoUsuario'] == null) {
    header("Location: ../controller/redirect.php?action=home");
}

 require_once "header.php";

?>
    <main class="container d-flex flex-column align-items-center p-3">
        <h2><?= $nomePagina ?></h2>
    <?php 
        foreach ($rowPost as $key => $value) {  
    ?>
    
        <div class="card w-75 m-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?= $value['nome'] ?><span class="fs-6 fw-light"> (autor)</span></h5>
                        <a href="../controller/post.php?action=excluirPost&idPost=<?php echo $value['postId'] ?>">apagar</a>
                        <a href="../controller/redirect.php?action=editarPost&idPost=<?php echo $value['postId'] ?>">Editar</a>
                </div>
                <hr>
                <p class="card-text"><?= $value['descricao'] ?></p>
            </div>
        </div>

    <?php 
        } 
    ?>
    </main>
</body>
</html>