<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Neway Dashboard - Entrar</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo e(url('assets/media/image/favicon.png')); ?>"/>

        <!-- Plugin styles -->
        <link rel="stylesheet" href="<?php echo e(url('vendors/bundle.css')); ?>" type="text/css" />

        <!-- App styles -->
        <link rel="stylesheet" href="<?php echo e(url('assets/css/app.min.css')); ?>" type="text/css" />
    </head>
    <body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div class="form-wrapper">

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <!-- Plugin scripts -->
    <script src="<?php echo e(url('vendors/bundle.js')); ?>"></script>

    <!-- App scripts -->
    <script src="<?php echo e(url('assets/js/app.min.js')); ?>"></script>
    </body>
</html>
