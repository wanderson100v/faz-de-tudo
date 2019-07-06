<div id = "topo" class = "container">
    <header class = "row mb-5">
        <h1>Perfil Administrador</h1>
    </header>
    <main class = "row">
        <nav class="col-3 text-center mt-5px"  > 
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
                <a class="btn btn-primary w-100 mt-1"href="#geral">Informações Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary w-100 mt-1"href="#contatos">Contatos</a>
                </li>
            </ul>
        </nav>
        <section  class = "col-8 border-left">
            <article id = "geral" class = "border-top">
                <header class = "mt-3">
                    <h3 class = "text-center">Informações gerais</h3>
                </header>
                <div class = 'row pl-2'> 
                    <h5 class = "mr-2">Dados Administrador</h5>
                </div>
                <p>
                    Gral de acesso : <?=$adm['grau_acesso']?><br>
                </p>
                <div class = 'row pl-2'> 
                    <h5 class = "mr-2">Dados de acesso</h5>
                    <a href ="<?=site_url('usuario/editar')?>">
                        <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de acesso" />
                    </a>
                </div>
                <p>
                    Login : <?=$adm['usuario']['login']?><br>
                    Senha : ********<br>
                </p>
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
                                <td>".$contato['tipo']."</td>
                                <td>".$contato['descricao']."</td>
                                <td>
                                    <a href=".site_url("contato/persistir/".$contato['id'])." class =\"btn editar\">Editar</a>
                                    <a href=".site_url("contato/excluir/".$contato['id'])."  class =\"btn excluir\">Excluir</a>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </article>
            <a type="button" class="btn btn-primary btn-sm" href = "<?=site_url('contato/persistir')?>">Adicionar Contato</a>
        </section>
        <a href ="#topo" class="m-2 col-1 fixed-bottom btn btn-outline-primary">Subir</a>
    </main>
</div>