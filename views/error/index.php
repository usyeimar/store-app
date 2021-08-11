<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Animated</title>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>/public/css/error.css">
    <!-- Scripts -->
    <script src="<?php echo constant('URL') ?>/public/js/error.js"></script>
</head>
<body>
    <div class="circle move" data-value="-1"></div>
    <div class="circle move" data-value="-1"></div>
    <div class="circle move" data-value="-1"></div>
    <div class="circle move" data-value="-1"></div>

    <div class="stars">
        <img src="<?php echo constant('URL') ?>/public/images/Starts.png" alt="">
    </div>

    <div class="container">
        <p>Oops.Ha ocurrido un error</p>
        <h1>404</h1>
        <a href="<?php echo constant('URL') ?>">Regresar</a>
        <img src="<?php echo constant('URL') ?>/public/images/astronauta.png" alt="Astronaut_img">
    </div>
  
</body>
</html>