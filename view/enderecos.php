<h2>Seus Endereços</h2>
<div class = 'escopo-tbl'>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>CEP</th>
                <th>Número</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>País</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id = "enderecos">
        </tbody>
    </table>
</div>
<form>
    <fieldset>
        <legend>Dados para novo endereço</legend>
        
        <label for="cepId">CEP</label>
        <input type="text" id="cepId" placeholder = "Informe CEP">
        
        <label for="numId">Número</label>
        <input type="text" id="numId" placeholder = "Informe Número"><br>

        <label for="logrId">Logradouro</label>
        <input type="text" id="logrId" placeholder = "Informe Logradouro">

        <label for="bairroId">Bairro</label>
        <input type="text" id="bairroId" placeholder = "Informe Bairro"><br>

        <label for="cidadeId">Cidade</label>
        <input type="text" id="cidadeId" placeholder = "Informe Cidade">

        <label for="estadoId">Estado</label>
        <input type="text" id="estadoId" placeholder = "Informe Estado"><br>

        <label for="paisId">Pais</label>
        <input type="text" id="paisId" placeholder = "Informe Pais"><br>

    </fieldset>
</form>
<button onclick = 'cadastrarEndereco()'>Adicionar</button>
