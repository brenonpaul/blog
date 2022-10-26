<?php
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

 require_once "header.php";

//session_destroy();
?>
    <main class="container d-flex flex-column align-items-center p-3">
    <?php 
        foreach ($rowPost as $key => $value) {  
    ?>
    
        <div class="card w-75 m-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?= $value['nome'] ?><span class="fs-6 fw-light"> (autor)</span></h5>

                    <?php 
                    if($value['idUsuario'] == $_SESSION['idUsuario']) {
                    ?>
                        <a href="../controller/post.php?action=excluirPost&idPost=<?php echo $value['postId'] ?>">apagar</a>
                    <?php 
                    }
                    ?>

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