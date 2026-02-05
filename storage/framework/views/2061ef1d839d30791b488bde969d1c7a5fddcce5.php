<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Nova empresa de <?php echo e($customer->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <?php if(!request()->segment(0) || strtolower(request()->segment(0)) == 'administrativo'): ?>
                        <a href="<?php echo e(route('env_adm')); ?>">Inicio</a>
                    <?php elseif(!request()->segment(0) || strtolower(request()->segment(0)) == 'dashboard'): ?>
                        <a href="<?php echo e(route('env_ctm')); ?>">Inicio</a>
                    <?php else: ?>
                        <a href="#">Inicio</a>
                    <?php endif; ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Nova Loja</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Formulário de Cadastro</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="#">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo e(route('empresas.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="cnpj">Cliente</label>
                            <input type="hidden" name="user_id" value="<?php echo e($customer->id); ?>" />
                            <input type="text" value="<?php echo e($customer->name); ?>" class="form-control" readonly />
                        </div>

                        <div class="form-group">
                            <label for="cnpj">Documento</label>
                            <input type="text" value="<?php echo e(old('cnpj','')); ?>" class="form-control" name="cnpj" placeholder="Documento" />
                            <?php if($errors->has('cnpj')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('cnpj')); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="fantasia">Nome Fantasia</label>
                            <input type="text" value="<?php echo e(old('fantasia','')); ?>"  class="form-control" name="fantasia" placeholder="Nome Fantasia" />
                            <?php if($errors->has('fantasia')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('fantasia')); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social</label>
                            <input type="text" value="<?php echo e(old('razao_social','')); ?>"  class="form-control" name="razao_social" placeholder="Razão social" />
                            <?php if($errors->has('razao_social')): ?>
                                <small class="form-text text-danger"><?php echo e($errors->first('razao_social')); ?></small>
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