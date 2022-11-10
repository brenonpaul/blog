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
<body>
<nav class="navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../controller/redirect.php?action=home">Home</a>
        </li>
        <li class="nav-item pe-2 ps-2">
          <a class="nav-link active" href="../controller/redirect.php?action=novaPostagem">Nova postagem</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active" href="../controller/redirect.php?action=perfil">Perfil</a>
        </li>
        <li class="nav-item ms-5">
          <form action="../controller/redirect.php" class="input-group mb-3 ps-3">
            <input type="text" name="nome" class="form-control ms-5" placeholder="busque outras pessoas" aria-describedby="basic-addon2">
            <input type="hidden" name="action" value="pesquisaUsuario">
            <div class="input-group-append">
              <button type="submit" class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
          </form>
        </li>
      </ul>
      <a href="../controller/usuario.php?action=logoff"><button type="button" class="btn btn-outline-light">Sair</button></a>
    </div>
  </div>
</nav>
