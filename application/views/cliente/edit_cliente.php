<main class = "container">
    <header class = "row text-center">
        <h1 class = 'col-12'><?=$titulo?></h1>
    </header>
    <section class = 'row justify-content-center'>
        <form class = 'col-10'>

            <fieldset class = 'form-group'>
                <legend>Tipo</legend>
                <input type="hidden" name = "id" id ="id" value = "<?=$cliente['id']?>">
                <div class="custom-control custom-radio custom-control-inline">
                    <input <?=($cliente['tipo'] == 'Físico')? 'checked': ""?> onclick="alterarFisico()" type="radio" id="fisico" name="tipo"  value= "Físico" class="custom-control-input">
                    <label class="custom-control-label" for="fisico">Físico</label>
                </div>        
                <div class="custom-control custom-radio custom-control-inline">
                    <input <?=($cliente['tipo'] == 'Jurídico')? 'checked': ""?> onclick="alterarJuridico()" type="radio" id="juridico" name="tipo"  value= "Jurídico"class="custom-control-input">
                    <label class="custom-control-label" for="juridico">Jurídico</label>
                </div>
            </fieldset>

            <fieldset id = "sexoFs"class='form-group'>
                <legend>Sexo</legend>    
                <div class="custom-control custom-radio custom-control-inline">
                    <input <?=($cliente['sexo'] == 'M')? 'checked': ""?> type="radio" id="masc" name="sexo"  value= "M"class="custom-control-input">
                    <label class="custom-control-label" for="masc">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  <?=($cliente['sexo'] == 'F')? 'checked': ""?> type="radio" id="fem" name="sexo" value = "F" class="custom-control-input">
                    <label class="custom-control-label" for="fem">Feminino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  <?=($cliente['sexo'] == 'o')? 'checked': ""?> type="radio" id="outro" name="sexo" velue = "O" class="custom-control-input">
                    <label class="custom-control-label" for="outro">Outro</label>
                </div>
            </fieldset>

            <div class = "form-row">
                <div class='col-6 form-group'>
                    <label for="nome">Nome*</label>
                    <input value = "<?=$cliente['nome']?>" type="text" class="form-control" name="nome" id ="nome" required>
                    <div id = "invf-nome" class="invalid-feedback"> Um nome deve ser informado</div>
                </div>   
                <div class='col-6 form-group'>
                    <label for="cpfCnpj">CPF*</label>
                    <input value = '<?=$cliente['cpf_cnpj']?>' type="text" class="form-control" name="cpfCnpj" id ="cpfCnpj" required>
                    <div id = "invf-cpf" class="invalid-feedback">CPF não informado</div>
                <div id = "invf-cnpj" class="invalid-feedback">CNPJ não informado</div>
                </div> 
            </div>
            <div class = "form-row">
                <div class='col-4 form-group'>
                    <label for="nasc">Data de Nascimento</label>
                    <input value = '<?=$cliente['nasc']?>' type="date" class="form-control" name="nasc" id="nasc">
                </div>
            </div>
            <div class="feedback" role="alert"></div>
            <div class = "row mb-4 justify-content-end">
                <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#geral')?>">Voltar</a>
                <button type="submit" class=" ml-3 mr-3 btn btn-primary">Editar</button>
            </div>
        </form>
    </section>
</main>
<script src = "<?=base_url()?>js/tipo-cliente.js"></script>
<script src = "<?=base_url()?>js/editar_cliente.js"></script>
