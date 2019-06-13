<main class = "container">
    <header class = "row justify-content-center">
        <h1>
            Acesso ao sistema
        </h1>
    </header>
    <div class = "row justify-content-center text-center mt-5">
        <form class = "col-sm-6" action = "<?=site_url("homepage/autenticar")?>" method = "POST">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name ="login" class="form-control" id="login" placeholder="Informe Nome de usuário">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name = "senha" class="form-control" id="senha" placeholder="Informe Senha">
        </div>
        <button class = "btn btn-primary w-100" type="submit">Logar</button>
        </form>
        
    </div>
    <div class = 'row justify-content-center text-center mt-5'>
        <div class="alert alert-<?=$estado?>" role="alert"><?=$msg?></div>
    </div>
</main>