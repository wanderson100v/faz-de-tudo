<main class = "container">
    <header class = "row mb-4">
        <h1>Administradores</h1>
    </header>
    <div class = 'row justify-content-center'>
        <div class = "col-5">
            <form>            
                <fieldset>
                    <legend>Administrador</legend>
                    <div class="form-group">
                        <label for="grau_acesso">Grau de acesso</label>
                        <select class="form-control" id="grau_acesso">
                            <option>Alto</option>
                            <option>Médio</option>
                            <option>Baixo</option>
                        </select>
                    </div>
                <fieldset>
                    <legend>Dados de Acesso</legend>
                    <div class='form-group'>
                        <label for="login">Login*</label>
                        <input type="text" class="form-control" class="form-control" name="login" id="login"  placeholder = "Nome de usuário para acessar o sistema" required>
                        <div id = "invf-grau_acesso" class="invalid-feedback">Grau de acesso deve ser informado</div>
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
        </div>
        <div class="container col-5">
            <h6>Administradores já cadastrados</h6>
            <table class="table table-striped border" >
                <thead  class = "thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Login</th>
                        <th scope="col">Grau acesso</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($adms as $adm)
                {
                    echo "<tr>
                            <th scope='row'>".$adm['id']."</th>
                            <td>".$adm['login']."</td>
                            <td>".$adm['grau_acesso']."</td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src = "<?=base_url()?>js/cadastrar_adm.js"></script>