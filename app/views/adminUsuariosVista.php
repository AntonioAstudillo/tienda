<?php require_once 'layouts/encabezado.php'; ?>

<div class="container">
   <p class="h1 text-center mt-3">Alta de un usuario administrador</p>
   <div class="card p-4 mt-3">
      <form>
         <div class="mb-4">
           <label for="nombre" class="form-label">Nombre:</label>
           <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre">
         </div>
         <div class="mb-4">
            <label for="correo" class="form-label">Usuario:</label>
            <input type="email" class="form-control" id="correo" placeholder="Escribe tu usuario(tu correo electrónico)">
         </div>
         <div class="mb-4">
            <label for="clave1" class="form-label">Clave acceso</label>
            <input type="password" class="form-control" id="clave1" placeholder="Escribe tu clave de acceso(sin especios en blanco)">
         </div>
         <div class="mb-4">
            <label for="clave2" class="form-label">Verifica la clave acceso</label>
            <input type="password" class="form-control" id="clave2" placeholder="Verifica la clave de acceso(Sin espacios en blanco)">
         </div>
            <input type="submit" class="btn btn-outline-success" name="" value="Enviar">
            <a href="<?php echo RUTA .'adminUsuarios' ?>" class="btn btn-outline-primary">Regresar</a>

      </form>
   </div>
</div>

<?php require_once 'layouts/footer.php'; ?>
