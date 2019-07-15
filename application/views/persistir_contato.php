<main class = "container">
    <header class = "row text-center">
        <h1 class = "col-12"><?=$titulo?></h1>
    </header>
    <section class = "row justify-content-center">
        <form class = "col-8">
        
            <fieldset class = "form-group">
                <legend>Tipo</legend>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input checked onclick="auterarParaEmail()" type="radio" id="email" name="tipoContato"  value= "E-mail" class="custom-control-input">
                        <label class="custom-control-label" for="email">E-mail</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input onclick="auterarParaTelefone()" type="radio" id="telefone" name="tipoContato" value = "Telefone" class="custom-control-input">
                        <label class="custom-control-label" for="telefone">Telefone</label>
                    </div>
            </fieldset>

            <div class = "form-row">
                <div class="col-7 form-group"> 
                    <input type="email" id="descContato" placeholder="Digite contato" class="form-control" required>
                    <div id = "invf-descContato" class="invalid-feedback"> Uma descrição para contato deve ser informada</div>
                </div>
            </div>

            <div class="feedback" role="alert"></div>
            <div class = "row mb-4 justify-content-end">
                <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#contatos')?>">Voltar</a>
                <button type="submit" class=" ml-3 mr-3 btn btn-primary"><?=$desc?></button>
            </div>
        </form>
    </section>
</main>
<script src = "<?=base_url()?>js/tipo-contato.js"></script>
<script src = "<?=base_url()?>js/cadastrar_contato.js"></script>
