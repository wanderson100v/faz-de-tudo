<main class = "container">
    <header class = "row">
        <div class = "mr-3">
            <a type = "button" class=" text-center btn btn-primary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#contatos')?>">Voltar</a>
        </div>
        <h1><?=$titulo?></h1>
    </header>
    <form>
        <fieldset>
            <legend>Dados contato</legend>
            <div class="custom-control custom-radio custom-control-inline">
                    <input checked onclick="auterarParaEmail()" type="radio" id="email" name="tipoContato"  value= "E-mail" class="custom-control-input">
                    <label class="custom-control-label" for="email">E-mail</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input onclick="auterarParaTelefone()" type="radio" id="telefone" name="tipoContato" value = "Telefone" class="custom-control-input">
                    <label class="custom-control-label" for="telefone">Telefone</label>
                </div>
                <div class="col-7 custom-control custom-control-inline"> 
                    <input type="email" id="descContato" placeholder="Digite contato" class="form-control" required>
                </div>
            </fieldset>
        <div class = "row justify-content-end">
            <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#contatos')?>">Cancelar</a>
            <a type="submit" class=" ml-3 mr-3 btn btn-primary"><?=$desc?></a>
        </div>
    </form>
</main>
<script src = "<?=base_url()?>js/tipo-contato.js"></script>
