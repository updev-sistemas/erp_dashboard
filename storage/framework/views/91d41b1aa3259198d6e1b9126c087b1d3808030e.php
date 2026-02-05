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
                <li class="breadcrumb-item active" aria-current="page">Dados</li>
                <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <h4>Atualização de Informações</h4>
                    <br />
                    <form action="<?php echo e(route('profile_change')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="<?php echo e(old('name',$target->name)); ?>" class="form-control" name="name" placeholder="Nome" />
                            <?php if($errors->has('name')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo e(old('email',$target->email)); ?>"  class="form-control" name="email" placeholder="Email" />
                            <?php if($errors->has('email')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('email')); ?></small>
                            <?php endif; ?>
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