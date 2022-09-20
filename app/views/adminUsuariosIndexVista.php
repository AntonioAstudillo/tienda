<?php require_once 'layouts/encabezado.php'; ?>

<div class="container">
   <h2 class="text-center mt-3"><?php echo $data['subtitulo']; ?></h2>

   <div class="card p-5 bg-light">
      <div class="justify-content-center text-center">
         <a class="btn btn-success" href="<?php echo RUTA . 'adminUsuarios/alta' ?>">Dar de alta un usuario</a>
      </div>
   </div>


</div>
<?php require_once 'layouts/footer.php'; ?>
