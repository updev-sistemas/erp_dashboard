<ul>
    <li class="navigation-divider d-flex align-items-center">
        <img src="<?php echo e(url('assets/media/image/user/timer.png')); ?>">
        <i  id="ultimoUpdate1" title="Ultima atualizacao em <?php echo e($demonstrative->updated_at->format('d/m/Y H:i')); ?>" class="mr-2"><?php echo e($demonstrative->updated_at->format('d/m/Y H:i')); ?></i>
    </li>
    <li><a href="<?php echo e(route('env_ctm')); ?>"><strong>Filiais</strong></a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'visao_geral'): ?> class="active" <?php endif; ?> href="<?php echo e(route('view_enterprise', ['id' => $enterprise->id])); ?>">Visao Geral</a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'contas_a_pagar'): ?> class="active" <?php endif; ?>  href="<?php echo e(route('view_enterprise_cpv', ['id' => $enterprise->id])); ?>">Contas á pagar</a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'contas_a_receber'): ?> class="active" <?php endif; ?>  href="<?php echo e(route('view_enterprise_arv', ['id' => $enterprise->id])); ?>">Contas á receber</a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'caixas_abertos'): ?> class="active" <?php endif; ?>  href="<?php echo e(route('view_enterprise_cxa', ['id' => $enterprise->id])); ?>">Caixas Abertos</a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'minhas_vendas'): ?> class="active" <?php endif; ?> href="<?php echo e(route('view_enterprise_vds', ['id' => $enterprise->id])); ?>">Minhas vendas</a></li>
    <li><a <?php if(!request()->segment(4) || request()->segment(4) == 'vendedores'): ?> class="active" <?php endif; ?> href="<?php echo e(route('view_enterprise_vdd', ['id' => $enterprise->id])); ?>">Vendedores</a></li>


    <li><a  style="display: none;" class="active"  href="#"></a></li>

    <li class="navigation-divider"></li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/cliente.png')); ?>">
                </figure>
            </div>
            <div>
                <h6>Clientes</h6>
                <h4 id="numeroClientes" class="mb-0 font-weight-bold"><?php echo e($payload->cadastros->clientes ?? 0); ?></h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/produtos.png')); ?>">
                </figure>
            </div>
            <div>
                <h6>Produtos</h6>
                <h4 id="numeroProdutos" class="mb-0"><?php echo e($payload->cadastros->produtos ?? 0); ?></h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/fornecedor.png')); ?>">
                </figure>
            </div>
            <div>
                <h6>Fornecedores</h6>
                <h4 id="numeroFornecedores" class="mb-0"><?php echo e($payload->cadastros->fornecedores ?? 0); ?></h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="<?php echo e(url('assets/media/image/user/usuarios.png')); ?>">
                </figure>
            </div>
            <div>
                <h6>Usuários</h6>
                <h4 id="numeroUsuarios" class="mb-0"><?php echo e($payload->cadastros->usuarios ?? 0); ?></h4>
            </div>
        </a>
    </li>

</ul>
