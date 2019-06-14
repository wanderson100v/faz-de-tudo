<main class = "container">

<header class = "row justify-content-center mb-3">
    <h1>Cadastro Passo 2 : MEI</h1>
</header>
<div class = 'row'>
    <form class = "col-6"  action = "<?=site_url("mei/criar")?>" method = "POST">            
        <fieldset>
            <legend>Informações de Cliente</legend>
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
            <fieldset class=' form-group'>
                <legend>Contato*</legend>
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
        </fieldset>  
        <fieldset class=' form-group'>
            <legend>Dados de Acesso</legend>
            <div class=' form-group'>
                <label for="login">Login*</label>
                <input type="text" class="form-control" class="form-control" name="login" id="login" required>
            </div>
            <div class='form-group'>
                <label for="senha">Senha*</label>
                <input type="password" class="form-control" name="senha" id="senha" required>
            </div>
            <div class='form-group'>
                <label for="conSenha">Confirmar senha*</label>
                <input type="password" class="form-control" name="conSenha" id="conSenha" required>
            </div>
        </fieldset>
        <button class = "btn btn-primary" type = "submit" onclick="cadastroClienteMei('cliente')">Finalizar cadastro</button>      
        <div class="alert alert-<?=$estado?>" role="alert">
            <?=$msg?>
        </div>
    </form>
    <div class = col-6>
        <h1 class = "text-hide" style = 'background-image : url("<?=base_url()?>res/img/mei-img.png");  background-repeat: no-repeat; text-center width: 250px; height: 250px;'>
            Icone MEI
        </h1>
        <p>
            Com uma conta de micro empreendedor individual (MEI), você poderá definir cidades que 
            trabalha e serviços que presta, assim clientes poderão solicitar seus serviços.
            Nada impede também de um solicitar serviços de outros MEIs. Ou seja você terá acesso 
            a todas as funcionalidades que um cliente comum tem. Como também fornecer seus serviços
            a terceiros.
        </p>
    </div>
</div>
</main>
<script src = "<?=base_url()?>js/tipo-cliente.js"></script>
<script src = "<?=base_url()?>js/tipo-contato.js"></script>