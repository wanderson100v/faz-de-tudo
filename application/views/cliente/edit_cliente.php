<main class = "container">
    <header class = "row">
        <div class = "mr-3">
            <a type = "button" class=" text-center btn btn-primary" href = "<?=site_url('cliente/painel/perfil#geral')?>">Voltar</a>
        </div>
        <h1><?=$titulo?></h1>
    </header>
    <form>
        <fieldset>
        <fieldset class = 'form-group'>
                <legend>Tipo</legend>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked onclick="alterarFisico()" type="radio" id="fisico" name="tipo"  value= "Físico"class="custom-control-input">
                    <label class="custom-control-label" for="fisico">Físico</label>
                </div>        
                <div class="custom-control custom-radio custom-control-inline">
                    <input onclick="alterarJuridico()" type="radio" id="juridico" name="tipo"  value= "Jurídico"class="custom-control-input">
                    <label class="custom-control-label" for="juridico">Jurídico</label>
                </div>
            </fieldset>
            <fieldset id = "sexoFs"class='form-group'>
                <legend>Sexo</legend>    
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="masc" name="sexo"  value= "M"class="custom-control-input">
                    <label class="custom-control-label" for="masc">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="fem" name="sexo" value = "F" class="custom-control-input">
                    <label class="custom-control-label" for="fem">Feminino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="outro" name="sexo" velue = "O" class="custom-control-input">
                    <label class="custom-control-label" for="outro">Outro</label>
                </div>
            </fieldset>
            <div class='form-group'>
                <label for="nome">Nome*</label>
                <input type="text" class="form-control" name="nome" id ="nome" required>
            </div>   
            <div class='form-group'>
                <label for="cpfCnpj">CPF*</label>
                <input type="text" class="form-control" name="cpfCnpj" id ="cpfCnpj" required>
            </div> 
            <div class='form-group'>
                <label for="nasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="nasc" id="nasc">
            </div>
        </fieldset>
        <div class = "row justify-content-end">
            <a type="button" class="btn btn-secondary" href = "<?=site_url('cliente/painel/perfil#geral')?>">Cancelar</a>
            <a type="submit" class=" ml-3 mr-3 btn btn-primary">Editar</a>
        </div>
    </form>
</main>
<script src = "<?=base_url()?>js/tipo-cliente.js"></script>
