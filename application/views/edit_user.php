<main class = "container">
    <header class = "row">
        <div class = "mr-3">
            <a type = "button" class=" text-center btn btn-primary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#geral')?>">Voltar</a>
        </div>
        <h1><?=$titulo?></h1>
    </header>
    <form>
        <fieldset>
            <legend>Dados usuário</legend>
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
        <div class = "row justify-content-end">
            <a type="button" class="btn btn-secondary" href = "<?=site_url($_SESSION['tipo'].'/painel/perfil#geral')?>">Cancelar</a>
            <a type="submit" class=" ml-3 mr-3 btn btn-primary">Editar</a>
        </div>
    </form>
</main>
<script src = "<?=base_url()?>js/tipo-contato.js"></script>
