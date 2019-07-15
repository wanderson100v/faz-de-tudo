<div id = "topo" class = "container">
    <script>var cliente = <?=$cliente?></script>
    <header class = "row mb-5">
        <h1>Perfil Cliente</h1>
    </header>
    <main class = "row">
        <nav id = "menu" class="col-3 text-center mr-0" style = "display: none;" > 
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

                <header>
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
                            Tipo : <?=$cliente['tipo']?><br>
                            Nome : <?=$cliente['nome']?><br>
                            <?=($cliente['tipo'] == 'Físico')?
                                'CPF : '.$cliente['cpf_cnpj'].'<br>'.
                                'Data de Nascimento : '.$cliente['nasc'].'<br>'.
                                'Sexo : '.$cliente['sexo'].'<br>'
                                : 
                                'CNPJ : '.$cliente['cpf_cnpj'].'<br>'
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
                            Login : <?=$cliente['usuario']['login']?><br>
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
                    foreach($cliente['usuario']['enderecos'] as $endereco)
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
                    foreach($cliente['usuario']['contatos'] as $contato)
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
            <a type="button" class="btn btn-primary btn-sm  mb-5" href = "<?=site_url('contato/persistir')?>">Adicionar Contato</a>
        </section>
        <div class ="fixed-bottom m-2 col-1" >
            <a href ="#topo" class =" btn btn-outline-primary">Topo</a>
        </div>      
    </main>
</div>
<script src = "<?=base_url()?>js/menu-lateral.js"></script>