

<?php require_once 'layouts/encabezado.php'; ?>

<?php if(isset($data['errores'])): ?>
<div class="alert alert-danger">
   <?php echo $data['errores']; ?>
</div>
<?php endif; ?>

  <body class="text-center">
     <div class="wrapper">
         <div class="logo">
             <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
         </div>
         <div class="text-center mt-4 name">
             Twitter
         </div>
         <form class="p-3 mt-3" method="post" action="<?php echo RUTA . 'login/verifica/'; ?>">
             <div class="form-field d-flex align-items-center">
                 <span class="far fa-user"></span>
                 <input type="text" name="user" id="user" placeholder="Username" value = "<?php if(isset($data['user'])){echo $data['user'];}   ?>">
             </div>
             <div class="form-field d-flex align-items-center">
                 <span class="fas fa-key"></span>
                 <input type="password" name="password" id="password" placeholder="Password" value = "<?php if(isset($data['password'])){echo $data['password'];}   ?>">
             </div>
             <button class="btn mt-3">Login</button>
         </form>
         <a href="<?php echo RUTA; ?>login/registrar/">Registrarse</a><br>
         <a href="<?php echo RUTA; ?>login/olvido/">¿Olvidaste la clave de acceso?</a>

     </div>

<?php require_once 'layouts/footer.php'; ?>
