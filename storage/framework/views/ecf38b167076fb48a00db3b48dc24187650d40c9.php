<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Cliente Registrada
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title"><?php echo e($customer->name); ?></h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="<?php echo e(route('clientes.index')); ?>">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="fantasia">Nome</label>
                        <input type="text" value="<?php echo e($customer->name); ?>"  class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo e($customer->email); ?>"  class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="last_access_date">Ultimo Acesso</label>
                        <?php if(is_null( $customer->last_access_date)): ?>
                        <input type="text" value="Sem Registro" class="form-control" readonly />
                        <?php else: ?>
                        <input type="text" value="<?php echo e($customer->last_access_date->format('d/M/y H:i:s')); ?>" class="form-control" readonly />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>