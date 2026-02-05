<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(url('vendors/range-slider/css/ion.rangeSlider.min.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Vendas por usuários de <?php echo e($enterprise->fantasia); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <?php if(auth()->user()->isAdministratorUser()): ?>
                        <a href="<?php echo e(route('env_adm')); ?>">Inicio</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('env_ctm')); ?>">Inicio</a>
                    <?php endif; ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Vendedores</li>
            </ol>
        </nav>
    </div>
        <div class="container-fluid">
            <?php if(isset($payload->lucrosPresumidos->relatorioVendas->vendasUsuarios)): ?>
                <div class="row">
                <?php $__currentLoopData = collect($payload->lucrosPresumidos->relatorioVendas->vendasUsuarios); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <figure class="avatar mr-3">
                                        <span ></span>
                                        <img src="<?php echo e(url('assets/media/image/user/usuario.png')); ?>">

                                    </figure>
                                </div>
                                <div>
                                    <a><?php echo e($user->usuario ?? 0); ?></a>
                                    <p class="text-muted">Usuário</p>
                                </div>
                            </div>
                            <div class="card border shadow-none">
                                <div class="card-body pt-2 pb-2 text-muted">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Total em vendas:</span>
                                            <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($user->totalvendas ?? 0)); ?>

                                                </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Comissões:</span>
                                            <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($user->comissoes ?? 0)); ?>

                                                </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Quantidade de vendas:</span>
                                            <span><?php echo e($user->quantidadevendas ?? 0); ?></span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Vendas Canceladas:</span>
                                            <span><?php echo e($user->vendascanceladas  ?? 0); ?></span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Produtos vendidos:</span>
                                            <span><?php echo e($user->quantidadeprodutos ?? 0); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
            <h3>Aguardando dados.</h3>
            <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function fillCadastros()
        {
            const clientes = '<?php echo $payload->cadastros->clientes ?? 0; ?>';
            const produtos = '<?php echo $payload->cadastros->produtos ?? 0; ?>';
            const fornecedores = '<?php echo $payload->cadastros->fornecedores ?? 0; ?>';
            const usuarios = '<?php echo $payload->cadastros->usuarios ?? 0; ?>';


            $("#CadastroNumeroClientes").html(clientes);
            $("#CadastroNumeroProdutos").html(produtos);
            $("#CadastroNumeroFornecedores").html(fornecedores);
            $("#CadastroNumeroUsuarios").html(usuarios);
        }

        fillCadastros();

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>