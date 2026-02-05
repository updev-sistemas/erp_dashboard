<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Empresa Registrada
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title"><?php echo e($enterprise->fantasia); ?></h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="<?php echo e(route('empresas.index')); ?>">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="cnpj">Documento</label>
                        <input type="text" value="<?php echo e($enterprise->cnpj); ?>" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="fantasia">Nome Fantasia</label>
                        <input type="text" value="<?php echo e($enterprise->fantasia); ?>"  class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="razao_social">Razão Social</label>
                        <input type="text" value="<?php echo e($enterprise->razao_social); ?>"  class="form-control"  readonly />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo e($enterprise->email); ?>"  class="form-control" readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>