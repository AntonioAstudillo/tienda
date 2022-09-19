<?php include 'layouts/encabezado.php'; ?>
<h2 class="text-center mt-5 mb-3">Registro</h2>
<div class=" card container p-4">
   <form class="" action="<?php echo RUTA; ?>login/registrar/" method="post" autocomplete="off">
      <div class="form-group text-left mt-3">
         <label for="nombre">Nombre:</label>
         <input class="form-control mt-2" type="text" name="nombre" id="nombre" value = "<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" required placeholder="Escriba su nombre">
         <?php if(isset($data['errores']['nombre'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['nombre']; ?></p>
         <?php endif; ?>
      </div>
      <div class="form-group text-left mt-3">
         <label for="apellidoP">Apellido Paterno:</label>
         <input class="form-control mt-2" type="text" name="apellidoP" id="apellidoP" value = "<?php if(isset($_POST['apellidoP'])) echo $_POST['apellidoP']; ?>" required placeholder="Escriba su apellido paterno">
         <?php if(isset($data['errores']['apellidoP'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['apellidoP']; ?></p>
         <?php endif; ?>
      </div>
      <div class="form-group text-left mt-3">
         <label for="apellidoM">Apellido Materno:</label>
         <input class="form-control mt-2" type="text" name="apellidoM" id="apellidoM" value = "<?php if(isset($_POST['apellidoM'])) echo $_POST['apellidoM']; ?>"  placeholder="Escriba su apellido materno">
         <?php if(isset($data['errores']['apellidoM'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['apellidoM']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="correo">Email:</label>
         <input class="form-control mt-2" type="email" name="correo" id="correo" value = "<?php if(isset($_POST['correo'])) echo $_POST['correo']; ?>" required placeholder="Escriba su correo electronico">
         <?php if(isset($data['errores']['correo'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['correo']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="clave1">Contraseña:</label>
         <input class="form-control mt-2" type="password" name="clave1" id="clave1" value = "<?php if(isset($_POST['clave1'])) echo $_POST['clave1']; ?>"  required placeholder="Escriba su contraseña">
         <?php if(isset($data['errores']['clave1'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['clave1']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="clave2">Repetir contraseña:</label>
         <input class="form-control mt-2" type="password" name="clave2" id="clave2" value = "<?php if(isset($_POST['clave2'])) echo $_POST['clave2']; ?>"  required placeholder="Repita la contraseña">
         <?php if(isset($data['errores']['clave2'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['clave2']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="direccion">Dirección:</label>
         <input class="form-control mt-2" type="text" name="direccion" id="direccion" value = "<?php if(isset($_POST['direccion'])) echo $_POST['direccion']; ?>"  required placeholder="Escriba su dirección">
         <?php if(isset($data['errores']['direccion'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['direccion']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="colonia">Colonia:</label>
         <input class="form-control mt-2" type="text" name="colonia" id="colonia" value = "<?php if(isset($_POST['colonia'])) echo $_POST['colonia']; ?>"  required placeholder="Escriba su colonia">
         <?php if(isset($data['errores']['colonia'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['colonia']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="ciudad">Ciudad:</label>
         <input class="form-control mt-2" type="text" name="ciudad" id="ciudad" value = "<?php if(isset($_POST['ciudad'])) echo $_POST['ciudad']; ?>" required placeholder="Escriba su ciudad">
         <?php if(isset($data['errores']['ciudad'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['ciudad']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="estado">Estado:</label>
         <input class="form-control mt-2" type="text" name="estado" id="estado" value = "<?php if(isset($_POST['estado'])) echo $_POST['estado']; ?>"  required placeholder="Escriba su estado">
         <?php if(isset($data['errores']['estado'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['estado']; ?></p>
         <?php endif; ?>
      </div>

      <div class="form-group text-left mt-3">
         <label for="codigoP">Código Postal:</label>
         <input class="form-control mt-2" type="text" name="codigoP" id="codigoP" value = "<?php if(isset($_POST['codigoP'])) echo $_POST['codigoP']; ?>"  required placeholder="Escriba su código postal">
         <?php if(isset($data['errores']['codidoP'])): ?>
            <p class="text-danger text-left" role="alert"><?php echo $data['errores']['codidoP']; ?></p>
         <?php endif; ?>
      </div>


      <div class="form-group text-left mt-3">
         <label for="pais">País</label>
         <select class="form-select" name="pais" id="pais">
            <option value="Mexico">México</option>
            <option value="Peru">Perú</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Argentina">Argentina</option>
            <option value="Colombia">Colombia</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Chile">Chile</option>
            <option value="Venezuela">Venezuela</option>
         </select>
      </div>


      <div class="form-group text-left mt-5 text-center">
         <input class="btn btn-primary" type="submit" value="Guardar datos" role="button">
         <a class="btn btn-success" href="<?php echo RUTA; ?>login/">Regresar</a>
      </div>

   </form>
</div>



<?php include 'layouts/footer.php'; ?>
