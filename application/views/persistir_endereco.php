<main class = "container">
    <header class = "row text-center">
        <h1 class = "col-12"><?=$titulo?></h1>
    </header>
    <form>
        <fieldset>
            <legend>Dados endereço</legend>
            <div class = "form-row">
                <div class="form-group col-3">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" id="cep" placeholder = "Informe CEP">
                    <div id = "invf-cep" class="invalid-feedback">CEP não informado</div>
                </div>
                <div class="form-group col-3">
                    <label for="num">Número</label>
                    <input class="form-control" type="text" id="num">
                    <div id = "invf-num" class="invalid-feedback">Número não informado</div>
                </div>
                <div class="form-group col-6">
                    <label for="logradouro">Logradouro</label>
                    <input class="form-control" type="text" id="logradouro" placeholder = "Informe Logradouro">
                    <div id = "invf-logradouro" class="invalid-feedback">Logradouro não informado</div>
                </div>
            </div>
            <div class = "form-row">
                <div class="form-group col-3">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" id="bairro" placeholder = "Informe Bairro">
                    <div id = "invf-bairro" class="invalid-feedback">Bairro não informado</div>
                </div>
                <div class="form-group col-3">
                    <label for="cidade">Cidade</label>
                    <input class="form-control" type="text" id="cidade" placeholder = "Informe Cidade">
                    <div id = "invf-cidade" class="invalid-feedback">Cidade não informado</div>
                </div>
                <div class="form-group col-3">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" id="estado" placeholder = "Informe Estado">
                    <div id = "invf-estado" class="invalid-feedback">Estado não informado</div>
                </div>
                <div class="form-group col-3">
                    <label for="pais">Pais</label>
                    <input class="form-control" type="text" id="pais" placeholder = "Informe Pais">
                    <div id = "invf-pais" class="invalid-feedback">Pais não informado</div>
                </div>
            </div>
        </fieldset>
        <div class="feedback" role="alert"></div>
        <div class = "row mb-4 justify-content-end">
            <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#enderecos')?>">Voltar</a>
            <button type="submit" class=" ml-3 mr-3 btn btn-primary"><?=$desc?></button>
        </div>
    </form>
</main>
<script src = "<?=base_url()?>js/cadastrar_endereco.js"></script>
