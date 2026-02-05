<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(url('vendors/range-slider/css/ion.rangeSlider.min.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>
    Caixas Abertos de <?php echo e($enterprise->fantasia); ?>

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
                <li class="breadcrumb-item active" aria-current="page">Caixas Abertos</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php if(isset($payload->caixasAbertos)): ?>
                <?php $__currentLoopData = $payload->caixasAbertos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $caixa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                                        <a><?php echo e($caixa->usuario); ?></a>
                                        <p class="text-muted">Usuário</p>
                                    </div>
                                </div>

                                <div class="card border shadow-none">
                                    <div class="card-body pt-2 pb-2 text-muted">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Data abertura:</span>
                                                <span><?php echo e($caixa->dataabertura ?? ''); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Hora abertura:</span>
                                                <span><?php echo e($caixa->horaabertura ?? ''); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo inicial:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoinicial ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo atual:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoatual ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>PIX:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->pix ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>fechamento:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->fechamento ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Dinheiro 1:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->dinheiro1 ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Digital:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->digital ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Crédito:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->credito ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cheque:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cheque ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cashback:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cashback ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cartão:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cartao ?? 0)); ?></span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo atual:</span>
                                                <span><?php echo e(App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoatual ?? 0)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php else: ?>
            <h3>Aguardando dados.</h3>
           <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(function(){

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
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>