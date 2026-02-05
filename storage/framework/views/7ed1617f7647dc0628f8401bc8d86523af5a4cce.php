<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Novo Cliente
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Formulário de Cadastro</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="<?php echo e(route('clientes.index')); ?>">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo e(route('clientes.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" value="<?php echo e(old('name','')); ?>" class="form-control" name="name" placeholder="Nome" />
                                <?php if($errors->has('name')): ?>
                                    <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="<?php echo e(old('email','')); ?>"  class="form-control" name="email" placeholder="Email" />
                                <?php if($errors->has('email')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('email')); ?></small>
                                <?php endif; ?>
                            </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>