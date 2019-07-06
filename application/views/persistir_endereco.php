<main class = "container">
    <header class = "row">
        <div class = "mr-3">
            <a type = "button" class=" text-center btn btn-primary" href = "<?=site_url($_SESSION['tipo']'./painel/perfil#enderecos')?>">Voltar</a>
        </div>
        <h1><?=$titulo?></h1>
    </header>
    <form>
        <fieldset>
            <legend>Dados endereço</legend>
            
            <div class = "form-row">
                <div class="form-group col-3">
                    <label for="cepId">CEP</label>
                    <input class="form-control" type="text" id="cepId" placeholder = "Informe CEP">
                </div>
                <div class="form-group col-3">
                    <label for="numId">Número</label>
                    <input class="form-control" type="text" id="numId" placeholder = "Informe Número">
                </div>
                <div class="form-group col-6">
                    <label for="logrId">Logradouro</label>
                    <input class="form-control" type="text" id="logrId" placeholder = "Informe Logradouro">
                </div>
            </div>
            <div class = "form-row">
                <div class="form-group col-3">
                    <label for="bairroId">Bairro</label>
                    <input class="form-control" type="text" id="bairroId" placeholder = "Informe Bairro">
                </div>
                <div class="form-group col-3">
                    <label for="cidadeId">Cidade</label>
                    <input class="form-control" type="text" id="cidadeId" placeholder = "Informe Cidade">
                </div>
                <div class="form-group col-3">
                    <label for="estadoId">Estado</label>
                    <input class="form-control" type="text" id="estadoId" placeholder = "Informe Estado">
                </div>
                <div class="form-group col-3">
                    <label for="paisId">Pais</label>
                    <input class="form-control" type="text" id="paisId" placeholder = "Informe Pais">
                </div>
            </div>
        </fieldset>
        <div class = "row justify-content-end">
            <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo']'./painel/perfil#enderecos')?>">Cancelar</a>
            <a type="submit" class=" ml-3 mr-3 btn btn-primary"><?=$desc?></a>
        </div>
        
    </form>
</main>
