<div id = "topo" class = "container">
    <header class = "row mb-5">
        <h1>Perfil Administrador</h1>
    </header>
    <main class = "row">
        <nav id = "menu" class="col-3 text-center mt-5px" style = "display: none;"> 
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
                <a class="btn btn-primary w-100 mt-1"href="#geral">Informações Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary w-100 mt-1"href="#contatos">Contatos</a>
                </li>
            </ul>
        </nav>
        <section id = 'perfil' class = "col-12 border-left">
            <article id = "geral" class = "border-top">

                <button id = "menu-btn" class ="btn btn-outline-primary mt-3" onclick = 'auternarMenu()'>
                    <img src = "<?=base_url()?>/res/img/menu-ico.png" width = '20' heght= '20' alt = "icone menu">
                </button>

                <header class = "mt-3">
                    <h3 class = "text-center">Informações gerais</h3>
                </header>
                <div class = 'container pl-2'>
                    <h5 class = "row mr-2">Dados Administrador</h5>
                    <p>
                        Gral de acesso : <?=$adm['grau_acesso']?>
                    </p>
                </div>
                <div class = 'container pl-2 mb-2'>
                    <h5 class = "row ">Desativar conta</h5>
                    <a href="<?=site_url('adm/painel/perfil/usuario/remover')?>">Desativar conta de acesso</a>
                </div>
                <div class = 'conteiner pl-2'>
                    <div class = 'row'> 
                        <h5 class = "mr-2">Dados de acesso</h5>
                        <a href ="<?=site_url('adm/painel/perfil/usuario/editar')?>">
                            <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de acesso" />
                        </a>
                    </div>
                    <div class = 'row' id = "d-acesso-conteudo">
                        <p>
                            Login : <?=$adm['usuario']['login']?><br>
                            Senha : ********
                        </p>
                    </div>
                <div>
            </article>
            <article id = "contatos" class = "border-top">
                <header class = "mt-3">
                    <h3 class = "text-center">Contatos</h3>
                </header>
                <table class="table table-striped">
                    <thead  class = "thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($adm['usuario']['contatos'] as $contato)
                    {
                        echo "<tr>
                                <th scope='row'>".$contato['id']."</th>
                                <td class = 'td-tipo' >".$contato['tipo']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-descricao' >".$contato['descricao']."</td>
                                <td>
                                    <button onclick = \"editarContato(this,'".$contato['id']."')\" class =\"btn editar\">Editar</button>
                                    <button onclick = \"excluirContato('".$contato['id']."')\" class =\"btn excluir\">Excluir</button>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </article>
            <a type="button" class="btn btn-primary btn-sm mb-5" href = "<?=site_url('adm/painel/perfil/contato/criar')?>">Adicionar Contato</a>
        </section>
        <div class ="fixed-bottom m-2 col-1" >
            <a href ="#topo" class =" btn btn-outline-primary">Topo</a>
        </div> 
    </main>
    <div class = "row fixed-bottom text-center justify-content-center">
        <div class="col-2 feedback" role="alert"></div>
    </div>
</div>
<script src = "<?=base_url()?>js/menu-lateral.js"></script>
<script src = "<?=base_url()?>js/perfil.js"></script>
<script src = "<?=base_url()?>js/editar_campo_td.js"></script>
<script src = "<?=base_url()?>js/alerta.js"></script>