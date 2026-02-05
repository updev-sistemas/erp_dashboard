<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel Administrativo - <?php echo e(config('app.name', 'Neway')); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(url('assets/media/image/favicon.png')); ?>"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo e(url('vendors/bundle.css')); ?>" type="text/css">

    <?php echo $__env->yieldContent('head'); ?>

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo e(url('assets/css/app.min.css')); ?>" type="text/css">
</head>
<body <?php if(trim($__env->yieldContent('bodyClass'))): ?> class="<?php echo $__env->yieldContent('bodyClass'); ?>" <?php endif; ?>>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
    <div class="sidebar" id="user-menu">
        <div class="py-4 text-center" >
            <figure class="avatar avatar-lg mb-3 border-0">
                <img src="<?php echo e(url('assets/media/image/user/women_avatar1.jpg')); ?>" class="rounded-circle" alt="image">
            </figure>
            <h5 class="d-flex align-items-center justify-content-center"><?php echo e(auth()->user()->name); ?></h5>
            <div>
                <strong> </strong>
            </div>
        </div>
        <div class="card mb-0 card-body ">
            <div class="mb-4">
                <div class="list-group list-group-flush">

                    <?php if(auth()->user()->isAdministratorUser()): ?>
                        <?php $__env->startComponent('components.head_adm'); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>

                    <?php if(auth()->user()->isCustomerUser()): ?>
                        <?php $__env->startComponent('components.head_ctm'); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>

                    <a class="list-group-item p-l-r-0 d-flex" href="<?php echo e(route('profile_view')); ?>">Alterar Informações</a>

                    <a class="list-group-item p-l-r-0 d-flex" href="<?php echo e(route('password_view')); ?>">Alterar Senha</a>

                    <a href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="list-group-item p-l-r-0 text-danger">
                        Encerrar Sessão
                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>

            <div class="mb-4">
                <h6>Estamos nas redes :)</h6>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="https://web.facebook.com/orbitautomacao" class="btn btn-sm btn-floating btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/orbitautomacao/" class="btn btn-sm btn-floating btn-instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.orbitautomacao.com.br/" class="btn btn-sm btn-floating btn-dribbble">
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://api.whatsapp.com/send?phone=5598988846360&text=olá, estou usando o app Neway Dashboard." class="btn btn-sm btn-floating btn-whatsapp">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">

    <!-- begin::header -->
    <div class="header d-print-none">

        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>
            <div class="header-logo">
                <a href="<?php echo e(url('/')); ?>">
                    <img class="logo" src="<?php echo e(url('assets/media/image/logo.png')); ?>" alt="logo">
                </a>
            </div>
        </div>

        <div class="header-body">

            <div class="header-body-left">
                <div class="page-title">
                    <h4><?php echo $__env->yieldContent('pageTitle'); ?></h4>
                </div>
            </div>
            <div class="header-body-right">

                <ul class="navbar-nav">

                    <!-- begin::header fullscreen -->
                    <li  class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>
                    <!-- end::header fullscreen -->



                    <!-- begin::user menu -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="User menu" data-sidebar-target="#user-menu">
                            <span class="mr-2 d-sm-inline d-none"><?php echo e(auth()->user()->name); ?></span>
                            <figure class="avatar avatar-sm">
                                <img src="<?php echo e(url('assets/media/image/user/women_avatar1.jpg')); ?>" class="rounded-circle"
                                     alt="avatar">
                            </figure>
                        </a>
                    </li>
                    <!-- end::user menu -->

                </ul>

                <!-- begin::mobile header toggler -->
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
                <!-- end::mobile header toggler -->
            </div>
        </div>

    </div>
    <!-- end::header -->

    <div class="content-wrapper">
        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-menu-body">
                <div class="navigation-menu-group">
                    <div id="ecommerce" style="padding-top:20px;">
                        <?php if(auth()->user()->isAdministratorUser()): ?>
                            <?php if($show ?? false): ?>
                                <?php $__env->startComponent('components.menu_customer_adm', ['payload' => $payload, 'demonstrative' => $demonstrative, 'enterprise' => $enterprise]); ?>
                                <?php echo $__env->renderComponent(); ?>
                            <?php else: ?>
                                <?php $__env->startComponent('components.menu_adm'); ?>
                                <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(auth()->user()->isCustomerUser()): ?>
                            <?php if($show ?? false): ?>
                                <?php $__env->startComponent('components.menu_enterprise_ctm', ['payload' => $payload, 'demonstrative' => $demonstrative, 'enterprise' => $enterprise]); ?>
                                <?php echo $__env->renderComponent(); ?>
                            <?php else: ?>
                                <?php $__env->startComponent('components.menu_ctm'); ?>
                                <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content">

                <?php if(session()->has('SUCCESS')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sucesso!</strong> <?php echo session()->get('SUCCESS'); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('ERROR')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?php echo session()->get('ERROR'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if(session()->has('WARN')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> <?php echo session()->get('WARN'); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>

            </div>

            <!-- begin::footer -->
            <footer class="content-footer">
                <div>© <?php echo e(date('Y')); ?> Orbit Automação  - <a target="_blank">Tecnologia</a></div>
                <div>
                    <nav class="nav">
                        <a href="https://www.orbitautomacao.com.br/" class="nav-link">Fale conosco</a>
                        <a href="https://www.orbitautomacao.com.br/" class="nav-link">Precisa de ajuda ?</a>
                    </nav>
                </div>
            </footer>
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
<script src="<?php echo e(url('vendors/bundle.js')); ?>"></script>

<!-- App scripts -->
<script src="<?php echo e(url('assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/functions.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/moment.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
