<?php include 'layouts/encabezado.php'; ?>

<!-- Aqui debe ir el contenido de la pagina -->
<div class="container">
   <h2 class="text-center"><?php echo $data['subtitulo']; ?></h2>

   <div class="alert <?php echo $data['color']; ?> mt-3"> <?php echo $data['texto']; ?></div>

   <a href="<?php echo RUTA . $data['url']; ?>" class="btn <?php echo $data['colorBoton']; ?> "><?php echo $data['textoBoton']; ?></a>
</div>


<!-- Aqui finaliza el contenido de la pagina -->

<?php include 'layouts/footer.php'; ?>
