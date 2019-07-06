<div id = "topo" class = "container">
    <header class = "row mb-5">
        <h1>Perfil MEI</h1>
    </header>
    <main class = "row">
        <nav class="col-3 text-center mt-5px"  > 
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
                <a class="btn btn-primary w-100 mt-1"href="#geral">Informações Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary w-100 mt-1"href="#enderecos">Endereços</a>
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
                    <h5 class = "mr-2">Dados cliente</h5>
                    <a href ="<?=site_url('cliente/editar')?>">
                        <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de cliente" />
                    </a>
                </div>
                <p>
                    Tipo : <?=$mei['cliente']['tipo']?><br>
                    Nome : <?=$mei['cliente']['nome']?><br>
                    Data de Nascimento : <?=$mei['cliente']['nasc']?><br>
                    Sexo : <?=$mei['cliente']['sexo']?><br>
                </p>
                <div class = 'row pl-2'> 
                    <h5 class = "mr-2">Dados de acesso</h5>
                    <a href ="<?=site_url('usuario/editar')?>">
                        <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de acesso" />
                    </a>
                    
                </div>
                <p>
                    Login : <?=$mei['cliente']['usuario']['login']?><br>
                    Senha : ********<br>
                </p>
            </article>
            <article id = "enderecos" class = "border-top mb-3">
                <header class = "mt-3">
                    <h3 class = "text-center">Endereços</h3>
                </header>
                <table class="table table-striped">
                    <thead class = "thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Número</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">País</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($mei['cliente']['usuario']['enderecos'] as $endereco)
                    {
                        echo "<tr>
                                <th scope='row'>".$endereco['id']."</th>
                                <td>".$endereco['cep']."</td>
                                <td>".$endereco['num']."</td>
                                <td>".$endereco['logradouro']."</td>
                                <td>".$endereco['bairro']."</td>
                                <td>".$endereco['cidade']."</td>
                                <td>".$endereco['estado']."</td>
                                <td>".$endereco['pais']."</td>
                                <td>
                                    <a href=".site_url("endereco/persistir/".$endereco['id'])." class =\"btn editar\">Editar</a>
                                    <a href=".site_url("endereco/excluir/".$endereco['id'])." class =\"btn excluir\">Excluir</a>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <a type="button" class="btn btn-primary btn-sm" href = "<?=site_url('endereco/persistir')?>"> Adicionar Endereço</a>
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
                    foreach($mei['cliente']['usuario']['contatos'] as $contato)
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