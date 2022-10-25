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
        <form method="POST" action="../controller/usuario.php?action=login">
            <div class="mb-3">
                <label class="form-label">Nome de Usuário</label>
                <input type="text" name="nome" class="form-control w-50 m-auto" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="senha" class="form-control w-50 m-auto">
            </div>
            <button type="submit" class="btn btn-outline-success">Logar</button>
            <p class="mt-2"><a href="redirect.php?action=telaCadastro">Ainda não possui conta?</a></p>
        </form>
    </main>
</body>
</html>