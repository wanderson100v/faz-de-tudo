<main class = "container">

    <header class = "row justify-content-center mb-3">
        <h1>Cadastro Passo 2 : Cliente</h1>
    </header>
    <div class = 'row'>
        <form class = "col-6"  action = "<?=site_url("cliente/create")?>" method = "POST">            
            <fieldset>
                <legend>Informações Cliente</legend>
            
                <fieldset class = "form-group">
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
                    <input type="text" class="form-control" name="nome" id ="nome" placeholder = "Nome completo" required>
                    <div id = "invf-nome" class="invalid-feedback"> Um nome deve ser informado</div>
                </div>
                <div class='form-group'>
                    <label for="cpfCnpj">CPF*</label>
                    <input type="text" class="form-control" name="cpfCnpj" id ="cpfCnpj" required>
                    <div id = "invf-cpf" class="invalid-feedback">CPF não informado</div>
                    <div id = "invf-cnpj" class="invalid-feedback">CNPJ não informado</div>
                </div> 
                <div class='form-group'>
                    <label for="nasc">Data de Nascimento</label>
                    <input type="date" class="form-control" name="nasc" id="nasc">
                </div> 
            </fieldset>       
            
            <fieldset>
                <legend>Dados de Acesso</legend>
                <div class='form-group'>
                    <label for="login">Login*</label>
                    <input type="text" class="form-control" class="form-control" name="login" id="login"  placeholder = "Nome de usuário para acessar o sistema" required>
                </div>
                <div class='form-group'>
                    <label for="senha">Senha*</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder = "Senha para acesso ao sistema"  required>
                </div>
                <div class='form-group'>
                    <label for="conSenha">Confirmar senha*</label>
                    <input type="password" class="form-control" name="conSenha" id="conSenha"  placeholder = "Confirmação da senha anterior" required >
                    <div id = "invf-senha" class="invalid-feedback">A senha informada e sua confirmação são diferentes</div>
                </div>
                <div id = "invf-dacess" class="mb-2 invalid-feedback">Um ou mais campos para dados de acesso estão vazios</div>
            </fieldset>
            <button class = "btn btn-primary mb-3" type = "submit">Finalizar cadastro</button>
            <div class="feedback" role="alert"></div>
        </form>

        <div class = col-6>
            <h1 class = "text-hide" style = 'background-image : url("<?=base_url()?>res/img/cliente-img.png");  background-repeat: no-repeat; text-center width: 250px; height: 250px;'>
                Icone cliente
            </h1>
            <p>
                Com uma conta de Cliente você poderá solicitar serviços a MEIs. Definir endereços comuns 
                que solicita serviços e contatos para auxiliar nesse processo. Ou seja, clientes têm seu 
                conjunto de funcionalidades relacionadas a solicitação de serviços, cancelamento, conclusão,
                e visualização de histórico.
            </p>
        </div>
        
    </div>
</main>
<script src = "<?=base_url()?>js/tipo-cliente.js"></script>
<script src = "<?=base_url()?>js/cadastrar_cliente.js"></script>