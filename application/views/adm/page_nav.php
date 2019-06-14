<nav class = mb-5>
    <ul class=" nav nav-tabs justify-content-end">
        <li class="nav-item">
            <a class="nav-link <?=($op == "inicio")? "active" : ""?>" href="<?=site_url("adm")?>">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "adms")? "active" : ""?>" href="<?=site_url("adm/administradores")?>">Administradores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "cidades")? "active" : ""?>" href="<?=site_url("adm/cidades")?>">Cidades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "servicos")? "active" : ""?>" href="<?=site_url("adm/servicos")?>">Servicos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($op == "perfil")? "active" : ""?>" href="<?=site_url("adm/perfil")?>">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?=site_url("homepage/logout")?>">Sair</a>
        </li>
    </ul>
</nav>