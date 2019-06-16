    <nav class = 'mb-5'>
        <ul class=" nav nav-tabs justify-content-end">
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
    </nav>
    
