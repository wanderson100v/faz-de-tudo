<main class = "container mb-3">
    <div class = "row">
        <header class = "container pl-0 mb-3">
            <h1>Cidades de atuação</h1>
        </header>
    </div>
    <section class = "row">
        <article class = "container col-6" >
            <h6>Listagem de cidades que a empresa atua no momento</h6>
            <table class ="table table-striped border" >
                <thead  class = "thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome/Estado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($cidades as $cidade)
                {
                    echo "<tr>
                            <th scope='row'>".$cidade['id']."</th>
                            <td>".$cidade['nome']."</td>
                            <td>
                                <button onclick = \"selecionarCidade('".$cidade['id']."')\" class =\"btn editar\">Selecionar</button>
                            </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </article>

        <article class = "container col-6" >
            <h6>Cidades que você atua como MEI</h6>
            <table class="table table-striped border" >
                <thead  class = "thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome/Estado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($cidadesMei as $cidadeMei)
                {
                    echo "<tr>
                            <th scope='row'>".$cidadeMei['id']."</th>
                            <td>".$cidadeMei['nome']."</td>
                            <td>
                                <button onclick = \"removerCidade('".$cidadeMei['id']."')\" class =\"btn excluir\">Remover</button>
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
<script src = "<?=base_url()?>js/cidades_mei.js"></script>
