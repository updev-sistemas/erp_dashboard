<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Lista de Clientes Atendidos
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
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Clientes Atendidos</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="<?php echo e(route('clientes.create')); ?>">Novo Cliente</a></div>
            </div>
            <hr />
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-4 text-center" scope="col">Nome</th>
                            <th class="col-lg-1 text-center" scope="col">Lojas</th>
                            <th class="col-lg-3 text-center" scope="col">Email</th>
                            <th class="col-lg-2 text-center" scope="col">Ultimo Acesso</th>
                            <th class="col-lg-2 text-center" scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr title="Cliente <?php echo e(\App\Utils\Enumerables\UserStatusEnum::getStatus($obj->id_status)); ?>">
                            <td>
                                <i class="fa fa-circle text-<?php echo e(\App\Utils\Enumerables\UserStatusEnum::getStatusLabel($obj->id_status)); ?>"></i>
                                <?php echo e($obj->name); ?>

                            </td>
                            <td class="text-center"><?php echo e($obj->enterprises()->count()); ?></td>
                            <td><?php echo e($obj->email); ?></td>
                            <td>
                                <?php if(is_null( $obj->last_access_date)): ?>
                                    Sem Registro
                                <?php else: ?>
                                    <?php echo e($obj->last_access_date->format('d/M/y H:i:s')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn btn-primary" href="<?php echo e(route('view_list_enterprise',['id' => $obj->id])); ?>"><i class="fa fa-eye"></i>&nbsp; Visualizar Lojas</a>
                                <a class="btn btn-sm btn btn-warning" href="<?php echo e(route('clientes.edit',['id' => $obj->id])); ?>"><i class="fa fa-pencil"></i>&nbsp; Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"><?php echo $collection->links(); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>