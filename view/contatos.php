<h2>Seus Contatos</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id = "contatos">
    </tbody>
</table>
<form>
<fieldset>
    <legend>Dados para novo Contato</legend>

    <label for="emailId">E-mail</label>
    <input checked type="radio" name="contatoFld" value="e-mail" id="emailId">

    <label for="telefoneId">Telefone</label>
    <input type="radio" name="contatoFld" value="tel" id="telefoneId">

    <input type="email" id="descConatoId" placeholder="Digite contato">

</fieldset>
</form>
<button onclick = 'cadastrarContato()'>Adicionar</button>
