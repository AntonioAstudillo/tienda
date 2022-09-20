<?php include 'layouts/encabezado.php'; ?>

<!-- Aqui debe ir el contenido de la pagina -->
<h1 class="text-center mt-3 mb-3"><?php echo $data['subtitulo']; ?></h1>

<div class="container">
   <div class="card p-4 bg-light rounded">
      <form class="" action="<?php echo RUTA.'login/olvido/'; ?>" method="post">
         <div class="row justify-content-center">
            <div class="col-6">
               <div class="input-group">
                  <span class="input-group-text">Correo electronico</span>
                  <input type="email" aria-label="First name" name="correoR" class="form-control">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col text-center">
               <input type="submit" class="btn btn-primary mt-3" name="" value="Actualizar">
            </div>
         </div>

         <p class="text-center mt-3 text-success">Se te enviará un correo, favor de verificar tu bandeja de spam</p>

      </form>
   </div>
</div>

<!-- Aqui finaliza el contenido de la pagina -->

<?php include 'layouts/footer.php'; ?>
