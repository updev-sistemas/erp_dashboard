<?php $__env->startSection('content'); ?>

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="<?php echo e(url('assets/media/image/logo.png')); ?>" alt="image">
        <img class="logo-dark" src="<?php echo e(url('assets/media/image/logo-dark.png')); ?>" alt="image">
    </div>
    <!-- ./ logo -->
   <br>
   <br>

    <!-- form -->
    <form id="relizaLogin" action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <input id="email" type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Seu E-mail" name="email" value="<?php echo e(old('email')); ?>" required autofocus />
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Sua senha" required name="password" />
        </div>
        <div class="form-group d-flex justify-content-between">    
        </div>
        <button id="btLogar" class="btn btn-primary btn-block" >
            <span id="carregar" ></span>
            Iniciar sessão
        </button>

        <hr>
        <p class="text-muted">Esqueceu a senha?</p>
        <a href="<?php echo e(route('password.request')); ?>" class="btn btn-outline-light btn-sm">Recuperar senha</a>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>