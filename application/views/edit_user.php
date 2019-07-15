<main class = "container">
    <header class = "row text-center">
        <h1 class = 'col-12'><?=$titulo?></h1>
    </header>
    <section class = 'row justify-content-center'>
        <form class ='col-8'>
            <fieldset>
                <input type="hidden" name = "id" id ="id" value = "<?=$usuario['id']?>">
                <legend>Dados usuário</legend>
                <div class=' form-group'>
                    <label for="login">Login*</label>
                    <input value = "<?=$usuario['login']?>" type="text" class="form-control" class="form-control" name="login" id="login" required>
                    <div id = "invf-login" class="mb-2 invalid-feedback">Login não informado</div>
                </div>
                <div class='form-group'>
                    <label for="senha">Senha atual*</label>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                    <div id = "invf-senha" class="mb-2 invalid-feedback">Para auteração de dados de acesso a senha deve ser informada</div>
                </div>
                <div class='form-group'>
                    <label for="novaSenha">Nova senha</label>
                    <input type="password" class="form-control" name="novaSenha" id="novaSenha">
                </div>
                <div class='form-group'>
                    <label for="conSenha">Confirmar nova senha</label>
                    <input type="password" class="form-control" name="conSenha" id="conSenha">
                    <div id = "invf-con-senha" class="mb-2 invalid-feedback">Nova senha e sua confirmação estão diferentes</div>
                </div>
            </fieldset>
            <div class="feedback" role="alert"></div>
            <div class = "row mb-3 justify-content-end">
                <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#geral')?>">Voltar</a>
                <button type="submit" class=" ml-3 mr-3 btn btn-primary">Editar</a>
            </div>
        </form>
    </section>
</main>
<script src = "<?=base_url()?>js/editar_usuario.js"></script>
