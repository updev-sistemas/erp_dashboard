<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Lista de Lojas de <?php echo e($customer->name); ?>

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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?php echo e(route('clientes.index')); ?>">Clientes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lojas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Empresas Atendidas</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="<?php echo e(route('adm_create_enterprise_view', ['customer_id' => $customer->id])); ?>">Adicionar empresa</a></div>
            </div>
            <hr />
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th class="col-lg-2 text-center" scope="col">Cliente</th>
                        <th class="col-lg-1 text-center" scope="col">Documento</th>
                        <th class="col-lg-2 text-center" scope="col">Fantasia</th>
                        <th class="col-lg-3 text-center" scope="col">Razão Social</th>
                        <th class="col-lg-2 text-center" scope="col">Email</th>
                        <th class="col-lg-1 text-center" scope="col">Demonstrativo</th>
                        <th class="col-lg-1 text-center" scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a data-enterprise="<?php echo e($obj->fantasia); ?>"
                                   data-url="<?php echo e(route("api.demonstrative.register", ["id" => $obj->generate_token()])); ?>"
                                   data-key="<?php echo e($obj->generate_token()); ?>"
                                   title="Credencial de API"
                                   href="#"
                                   class="btn btnCredentialShow btn-sm btn-primary">
                                        <i class="fa fa-key"></i>
                                </a>
                            </td>
                            <td><?php echo e($customer->name); ?></td>
                            <td><?php echo e($obj->cnpj); ?></td>
                            <td><?php echo e($obj->fantasia); ?></td>
                            <td><?php echo e($obj->razao_social); ?></td>
                            <td><?php echo e($obj->email); ?></td>
                            <td><a class="btn btn-sm btn-block btn-success" href="<?php echo e(route('adm_view_enterprise', ['id' => $obj->id])); ?>"><i class="fa fa-money"></i></a></td>
                            <td><a class="btn btn-sm btn-warning" href="<?php echo e(route('empresas.edit',['id' => $obj->id])); ?>">Editar</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="8"><?php echo $collection->links(); ?></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div id="credentialShowModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_enterprise_name"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="name">Chave de Acesso <a id="modal_enterprise_copy_key" href="#"><i class="fa fa-paste"></i></a></label>
                            <input type="text" value="" id="modal_enterprise_key" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label for="texto">Url de Comando <a id="modal_enterprise_copy_url" href="#"><i class="fa fa-paste"></i></a></label>
                            <textarea readonly  class="form-control" id="modal_enterprise_url" rows="20"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dismiss btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script type="text/javascript">
        $(function(){

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text)
                    .then(function () {
                        alert('Copiado para área de transferência.')
                    }, function () {
                        alert('Falha ao copiar, faça manualmente!')
                    });
            }

            $('#modal_enterprise_copy_key').click(function(){
                var value = $('#modal_enterprise_key').val();
                copyToClipboard(value);
            });

            $('#modal_enterprise_copy_url').click(function(){
                var value = $('#modal_enterprise_url').val();
                copyToClipboard(value);
            });

            $('#btn-dismiss').click(function(){
                $('#modal_enterprise_name').html('EMPRESA');
                $('#modal_enterprise_key').val('...');
                $('#modal_enterprise_url').html('...');
            });

            $('.btnCredentialShow').click(function (e) {

                var name = $(this).data('enterprise');
                $('#modal_enterprise_name').html(name);

                var url = $(this).data('url');
                $('#modal_enterprise_url').html(url);

                var key = $(this).data('key');
                $('#modal_enterprise_key').val(key);

                $('#credentialShowModal').modal({
                    show:true
                });
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>