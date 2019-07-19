<main class = "container">
    <header class = "row mb-4 text-center">
        <h1 class = 'col-12' >Desativar conta</h1>
    </header>
    <div class = 'row justify-content-center'>
        <div class = "col-5">
            <form>            
                <fieldset>
                    <h6>Realmente deseja desativar sua conta?</h6>
                    <p class = "text-justify">
                        Ao desativar a conta você não tera mais acesso ao sistema.<br>
                        Se deseja desativar a conta permanentemente informe sua <br/>
                        senha de acesso abaixo e aperte o botão "confirmar", caso<br/>
                        contrário, precione o botão "cancelar".
                    <p>
                    <div class='form-group'>
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder = "Senha atual"  required>
                    </div>
                </fieldset>
                <div class = 'form-row justify-content-end mb-3'>
                    <a type="button" class="btn btn-secondary mr-3" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#geral')?>">cancelar</a>
                    <button class = "btn btn-primary" type = "submit">confirmar</button>
                </div>
                <div class="feedback" role="alert"></div>
            </form>
        </div>
    </div>
</main>
<script src = "<?=base_url()?>js/apagar_conta.js"></script>