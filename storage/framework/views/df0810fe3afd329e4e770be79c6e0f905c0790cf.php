<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(url('/')); ?>">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h4>Atualização de Senha</h4>
            <br />
            <form action="<?php echo e(route('password_change')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="name">Senha Atual</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha atual" />
                    <?php if($errors->has('password')): ?>
                        <small class="form-text text-danger"><?php echo e($errors->first('password')); ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Nova Senha</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Nova Senha" />
                    <?php if($errors->has('new_password')): ?>
                        <small class="form-text text-danger"><?php echo e($errors->first('new_password')); ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Confirmar Senha</label>
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirmar Senha" />
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>