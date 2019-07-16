<div id = "topo" class = "container">
    <header class = "row mb-5">
        <h1>Perfil MEI</h1>
    </header>
    <main class = "row">
        <nav id = "menu" class="col-3 text-center mt-5px" style = "display: none;"> 
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
        <section id = 'perfil' class = "col-12 border-left">
            <article id = "geral" class = "border-top">
                
                <button id = "menu-btn" class ="btn btn-outline-primary mt-3" onclick = 'auternarMenu()'>
                    <img src = "<?=base_url()?>/res/img/menu-ico.png" width = '20' heght= '20' alt = "icone menu">
                </button>
                
                <header class = "mt-3">
                    <h3 class = "text-center">Informações gerais</h3>
                </header>
                
                <div class = 'container pl-2'>
                    <div class = "row"> 
                        <h5 class = "mr-2">Dados cliente</h5>
                        <a href = "<?=site_url("cliente/update")?>">
                            <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de cliente" />
                        </a>
                    </div>
                    <div id = "d-cliente-conteudo" class = 'row'>
                        <p>
                            Tipo : <?=$mei['cliente']['tipo']?><br>
                            Nome : <?=$mei['cliente']['nome']?><br>
                            <?=($mei['cliente']['tipo'] == 'Físico')?
                                'CPF : '.$mei['cliente']['cpf_cnpj'].'<br>'.
                                'Data de Nascimento : '.$mei['cliente']['nasc'].'<br>'.
                                'Sexo : '.$mei['cliente']['sexo'].'<br>'
                                : 
                                'CNPJ : '.$mei['cliente']['cpf_cnpj'].'<br>'
                            ?>
                        </p>
                    </div>
                </div>
                <div class = 'conteiner pl-2'>
                    <div class = 'row'> 
                        <h5 class = "mr-2">Dados de acesso</h5>
                        <a href ="<?=site_url('usuario/update')?>">
                            <img src="<?=base_url()?>/res/img/edit-ico.png" alt="Link para editar dados de acesso" />
                        </a>
                    </div>
                    <div id = "d-acesso-conteudo" class = 'row'>
                        <p>
                            Login : <?=$mei['cliente']['usuario']['login']?><br>
                            Senha : ********<br>
                        </p>
                    </div>
                <div>
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
                                <td ondblclick ='editarTd(this)' class = 'td-cep' >".$endereco['cep']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-num' >".$endereco['num']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-logradouro' >".$endereco['logradouro']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-bairro' >".$endereco['bairro']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-cidade' >".$endereco['cidade']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-estado' >".$endereco['estado']."</td>
                                <td ondblclick ='editarTd(this)' class = 'td-pais' >".$endereco['pais']."</td>
                                <td>
                                    <button onclick = \"editarEndereco(this,'".$endereco['id']."')\" class =\"btn editar\">Editar</button>
                                    <button onclick = \"excluirEndereco('".$endereco['id']."')\" class =\"btn excluir\">Excluir</button>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <a type="button" class="btn btn-primary btn-sm" href = "<?=site_url('endereco/create')?>"> Adicionar Endereço</a>
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
            <a type="button" class="btn btn-primary btn-sm mb-5" href = "<?=site_url('contato/create')?>">Adicionar Contato</a>
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