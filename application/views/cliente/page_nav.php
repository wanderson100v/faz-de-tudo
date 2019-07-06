<nav class="navbar navbar-expand-lg p-0 border-bottom navbar-dark bg-dark mb-5 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class ="col-md1 d-inline-block align-top" src="<?=base_url()?>/res/img/logo-pequeno.png" alt="Logo do site">
            Faz de Tudo
        </a>
        <ul class="navbar-nav ml-auto">  
            <li class="nav-item">
                <a class="nav-link <?=($op == "inicio")? "active" : ""?>" href="<?=site_url("cliente/painel/inicio")?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($op == "solicitacoes")? "active" : ""?>" href="<?=site_url("cliente/painel/solicitacoes")?>">Solicitações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($op == "perfil")? "active" : ""?>" href="<?=site_url("cliente/painel/perfil")?>">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="<?=site_url("homepage/logout")?>">Sair</a>
            </li>
        </ul>
    </div>
</nav>