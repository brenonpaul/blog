<?php 
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

 require_once "header.php";
?>
<main class="container d-flex flex-column align-items-center p-3">
    <?php 
        foreach ($rowUsuario as $key => $value) {  
    ?>
    
        <div class="card w-75 m-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?= $value['nome'];?>
                        <?php
                        if($value['tipoUsuario'] == 1 && $_SESSION['tipoUsuario'] == 1) {
                        ?>
                            <span class="fs-6 fw-light"> (administrador)</span>
                        <?php 
                        }
                        ?>
                    </h5>
                    <div class="d-flex">
                        <h5><?= ($value['sexo'] == 'M' ? "Masculino" : "Feminino") ?></h5>

                        <?php
                        if($_SESSION['tipoUsuario'] == 1) {
                        ?>
                            <a href="redirect.php?action=adminEditarUsuario&nome=<?=$value['nome']?>" class="fs-6 fw-light ms-3"> editar</a>
                        <?php 
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    <?php 
        } 
    ?>
    </main>
</body>
</html>