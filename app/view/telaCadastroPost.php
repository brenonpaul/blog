<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Blog do Povo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">
    <h1 class="text-center text-light mt-5 mb-5"><?= $nomePagina; ?></h1>
    <main class="bg-light w-50 text-center m-auto rounded p-2">
        <?php 
        if(isset($post)) {
        ?>
            <form method="POST" action="../controller/post.php?action=editarPost">
        <?php
        }else {
        ?>
            <form method="POST" action="../controller/post.php?action=cadastrarPost">
        <?php
        }
        ?>
            <div class="mb-3">
                <label class="form-label">Escreva sua postagem</label>

                <?php
                if(isset($post)) {
                ?>
                    <input type="text" value="<?= $post['descricao'] ?>" name="descricao" class="form-control w-50 m-auto " wrap="hard" style="height: 85px">
                <?php 
                }else {
                ?>
                    <input type="text" name="descricao" class="form-control w-50 m-auto " wrap="hard" style="height: 85px">
                <?php
                }
                ?>

            </div>
            <input type="hidden" name="idUsuario" value="<?= $_SESSION['idUsuario' ]?>">
            <?php 
            if(!isset($post)) {
            ?>
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            <?php
            }else {
            ?>
                <input type="hidden" name="postId" value="<?= $post['postId']?>">
                <button type="submit" class="btn btn-outline-success">Editar</button>
            <?php
            }
            ?>

        </form>
    </main>
    <?php 

    ?>
</body>
</html>