<nav class = mb-5>
    <ul class=" nav nav-tabs justify-content-end">
        <li class="nav-item">
            <a class="nav-link <?=($op == "inicio")? "active" : ""?>" href="<?=site_url("cliente")?>">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "solicitacao")? "active" : ""?>" href="<?=site_url("cliente/solicitacoes")?>">Solicitações</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "perfil")? "active" : ""?>" href="<?=site_url("cliente/perfil")?>">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?=site_url("homepage/logout")?>">Sair</a>
        </li>
    </ul>
</nav>