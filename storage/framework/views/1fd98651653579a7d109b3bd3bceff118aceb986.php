<ul>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/women_avatar1.jpg')); ?>">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Página Inicial</h4>
            </div>
        </a>
        <ul>
            <li>
                <a class="active" href="<?php echo e(route('env_ctm')); ?>">Dashboard</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/usuarios.png')); ?>">
                </figure>
            </div>
            <div>
                <h4 class="mb-0 font-weight-bold">Perfil</h4>
            </div>
        </a>
        <ul>
            <li>
                <a href="<?php echo e(route('profile_view')); ?>">Alterar Informações</a>
            </li>
            <li>
                <a href="<?php echo e(route('password_view')); ?>">Alterar Senha</a>
            </li>
        </ul>
    </li>
</ul>
