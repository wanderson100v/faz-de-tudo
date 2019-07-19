<main class = "container mb-3">
    <div class = "row">
        <header class = "container pl-0 mb-3">
            <h1>Serviços de atuação</h1>
        </header>
    </div>
    <section class = "row">
        <article class = "container col-6" >
            <h6>Listagem de serviços que a empresa presta</h6>
            <table class ="table table-striped border" >
                <thead  class = "thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Horas</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($servicos as $servico)
                {
                    echo "<tr>
                            <th scope='row'>".$servico['id']."</th>
                            <td>".$servico['valor']."</td>
                            <td>".$servico['horas']."</td>
                            <td>".$servico['descricao']."</td>
                            <td>
                                <button onclick = \"selecionarServico('".$servico['id']."')\" class =\"btn editar\">Selecionar</button>
                            </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </article>

        <article class = "container col-6" >
            <h6>Serviços que você presta</h6>
            <table class="table table-striped border" >
                <thead  class = "thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Horas</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($servicosMei as $servicoMei)
                {
                    echo "<tr>
                            <th scope='row'>".$servicoMei['id']."</th>
                            <td ondblclick ='editarTd(this)' class = 'td-valor' >".$servicoMei['valor']."</td>
                            <td ondblclick ='editarTd(this)' class = 'td-horas'>".$servicoMei['horas']."</td>
                            <td>".$servicoMei['descricao']."</td>
                            <td>
                                <button onclick = \"editarServicoMei(this,'".$servicoMei['id']."')\" class =\"btn editar\">Editar</button>
                                <button onclick = \"removerServicoMei('".$servicoMei['id']."')\" class =\"btn excluir\">Excluir</button>
                            </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </article>

    </section>

    <div class = "row fixed-bottom text-center justify-content-center">
        <div class="col-2 feedback" role="alert"></div>
    </div>
</main>
<script src = "<?=base_url()?>js/alerta.js"></script>
<script src = "<?=base_url()?>js/servicos_mei.js"></script>
<script src = "<?=base_url()?>js/editar_campo_td.js"></script>
