<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title><?php echo $data['title']; ?></title>

    <!-- Bootstrap core CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">

  </head>

  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo RUTA; ?>login/">Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
               <?php if(isset($data['admon']) && $data['admon'] ): ?>
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                     <li class="nav-item"> <a href="<?php echo RUTA.'adminUsuarios'; ?>" class="nav-link" >Usuarios</a>  </li>
                  </ul>
               <?php endif; ?>
            </div>
         </div>
      </nav>
