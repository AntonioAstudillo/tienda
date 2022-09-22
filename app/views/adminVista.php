<?php require_once 'layouts/encabezado.php'; ?>
<?php if(isset($data['errores'])): ?>
<div class="alert alert-danger">
   <?php echo $data['errores'][0]; ?>
</div>
<?php endif; ?>

     <div class="wrapper text-center">
         <h1 class="text-center">Módulo Administrativo</h1>
         <form class="p-3 mt-3" method="post" action="<?php echo RUTA . 'admin/verifica/'; ?>">
             <div class="form-field d-flex align-items-center">
                 <span class="far fa-user"></span>
                 <input type="text" name="user" id="user" placeholder="Username" value = "<?php if(isset($data['user'])){echo $data['user'];}   ?>">
             </div>
             <div class="form-field d-flex align-items-center">
                 <span class="fas fa-key"></span>
                 <input type="password" name="password" id="password" placeholder="Password" value = "<?php if(isset($data['clave'])){echo $data['clave'];}   ?>">
             </div>
             <button class="btn mt-3">Login</button>
         </form>
     </div>

<?php require_once 'layouts/footer.php'; ?>
