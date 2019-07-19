<main class = "container mb-3">
    <div class = "row">
        <header class = "container pl-0 mb-3">
            <h1>Cidades</h1>
            <h6>Listagem de cidades que a empresa atua no momento</h6>
        </header>
    </div>
    <section class = "row">
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
            foreach($cidades as $cidade)
            {
                echo "<tr>
                        <th scope='row'>".$cidade['id']."</th>
                        <td ondblclick ='editarTd(this)'class = 'td-nome' >".$cidade['nome']."</td>
                        <td>
                            <button onclick = \"editarCidade(this,'".$cidade['id']."')\" class =\"btn editar\">Editar</button>
                            <button onclick = \"excluirCidade('".$cidade['id']."')\" class =\"btn excluir\">Excluir</button>
                        </td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
    <section class = 'row justify-content-center border mt-4'>
        <h4 class = 'col-12  text-center pt-2 pb-2 bg-light mb-3'>Nova Cidade</h4>
        <form class = 'col-4'>
            <div class = "form-row">
                <div class="form-group col-8">
                    <label for="cidade">Cidade</label>
                    <input class="form-control" type="text" id="cidade" placeholder = "Noma da Cidade">
                    <div id = "invf-cidade" class="invalid-feedback">O Nome da cidade está vazio</div>
                </div>
                <div class="form-group col-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" id="estado" placeholder = "Sigla">
                    <div id = "invf-estado" class="invalid-feedback">Sigla não informada</div>
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
<script src = "<?=base_url()?>js/cidades.js"></script>
<script src = "<?=base_url()?>js/alerta.js"></script>