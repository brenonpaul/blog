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
                <h5 class="card-title"><?= $value['nome'] ?><span class="fs-6 fw-light"> (autor)</span></h5>
                <hr>
                <p class="card-text"><?= $value['descricao'] ?></p>
            </div>
        </div>

    <?php 
        } 
    ?>
    </main>
</body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/home.js"></script>
</html>