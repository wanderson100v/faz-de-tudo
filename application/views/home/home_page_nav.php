<nav class="navbar navbar-expand-lg p-0 border-bottom navbar-dark bg-dark mb-5 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class ="col-md1 d-inline-block align-top" src="<?=base_url()?>/res/img/logo-pequeno.png" alt="Logo do site">
            Faz de Tudo
        </a>
        <ul class="navbar-nav ml-auto">  
            <li class="nav-item">
                <a class="nav-link <?=($op == "inicio")? "active" : ""?>" href="<?=site_url("homepage")?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($op == "cadastro")? "active" : ""?>" href="<?=site_url("homepage/cadastrar")?>">Cadastre-se</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($op == "login")? "active" : ""?>" href="<?=site_url("homepage/logar")?>">Entrar</a>
            </li>
        </ul>
    </div>
</nav>
    
