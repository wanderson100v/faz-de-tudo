<main class = "container mb-3">
    <div class = "row">
        <header class = "container pl-0 mb-3">
            <h1>Serviços</h1>
            <h6>Listagem de serviços padrões que a empresa presta</h6>
        </header>
    </div>
    <section class = "row">
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
            foreach($servicos as $servico)
            {
                echo "<tr>
                        <th scope='row'>".$servico['id']."</th>
                        <td ondblclick ='editarTd(this)' class = 'td-valor' >".$servico['valor']."</td>
                        <td ondblclick ='editarTd(this)' class = 'td-horas' >".$servico['horas']."</td>
                        <td ondblclick ='editarTd(this)' class = 'td-descricao' >".$servico['descricao']."</td>
                        <td>
                            <button onclick = \"editarServico(this,'".$servico['id']."')\" class =\"btn editar\">Editar</button>
                            <button onclick = \"excluirServico('".$servico['id']."')\" class =\"btn excluir\">Excluir</button>
                        </td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
    <section class = 'row justify-content-center border mt-4'>
        <h4 class = 'col-12  text-center pt-2 pb-2 bg-light mb-3'>Novo serviço</h4>
        <form class = 'col-8'>
            <div class = "form-row">
                <div class="form-group col-3">
                    <label for="valor">Valor</label>
                    <input class="form-control" type="number" id="valor" required placeholder = "Valor padrão a ser cobrado">
                    <div id = "invf-valor" class="invalid-feedback">O Valor padrão do serviço deve ser informado</div>
                </div>
                <div class="form-group col-3">
                    <label for="horas">Horas</label>
                    <input class="form-control" type="number" id="horas" required placeholder = "Média de horas padrão para conclusão">
                    <div id = "invf-horas" class="invalid-feedback">Quantidade de horas padrão deve ser informada</div>
                </div>
            </div>
            <div class = "form-row">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="3" cols = '100'maslenght= "255" required placeholder = "Descrição do serviço"></textarea>
                    <div id = "invf-descricao" class="invalid-feedback">Descrição do serviço deve ser informada</div>
                </div>
            </div>
            <div class = "row mb-4 justify-content-center">
                <button onclick = "limparCampos()" class="btn btn-secondary">Limpar campos</a>
                <button type="submit" class=" ml-3 mr-3 btn btn-primary">Cadastrar</button>
            </div>
        </form>
        <div class = "row fixed-bottom text-center justify-content-center">
            <div class="col-2 feedback" role="alert"></div>
        </div>
    </section>
</main>
<script src = "<?=base_url()?>js/editar_campo_td.js"></script>
<script src = "<?=base_url()?>js/servicos.js"></script>
<script src = "<?=base_url()?>js/alerta.js"></script>