<?php include 'layouts/encabezado.php'; ?>


<?php if(isset($data['errores'])): ?>
<div class="alert alert-danger">
   <?php echo $data['errores'][0]; ?>
</div>

<?php endif; ?>

<!-- Aqui debe ir el contenido de la pagina -->
<h1 class="text-center mt-3 mb-3"><?php echo $data['subtitulo']; ?></h1>
<div class="container">
   <div class="card p-4 bg-light rounded">
      <form class="" action="<?php echo RUTA.'login/cambiaClave/1'; ?>" method="post">
         <div class="row justify-content-center">
            <div class="col-6">
               <div class="input-group">
                  <span class="input-group-text">Ingresa clave:</span>
                  <input type="password" aria-label="First name" name="clave1" class="form-control">
                  <input type="hidden" name="idUser" value="<?php echo $data['data']; ?>">
               </div>
            </div>
         </div>

         <div class="row justify-content-center">
            <div class="col-6">
               <div class="input-group">
                  <span class="input-group-text">Repite la clave:</span>
                  <input type="password" aria-label="First name" name="clave2" class="form-control">
               </div>
            </div>
         </div>

         <div class="row text-center d-flex justify-content-cente">
            <div class="col-6">
               <input type="submit" class="btn btn-primary mt-3" name="" value="Cambiar">
            </div>
            <div class="col-6">
               <a class="btn btn-info mt-3" href="<?php echo RUTA . '/login/'; ?>">Regresar</a>
            </div>
         </div>


      </form>
   </div>
</div>

<!-- Aqui finaliza el contenido de la pagina -->

<?php include 'layouts/footer.php'; ?>
