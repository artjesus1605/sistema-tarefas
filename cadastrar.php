<h1>Nova tarefa</h1>
<form action="?page=salvar" method="post">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome da tarefa</label>
        <input type="text" name="Nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de vencimento</label>
        <input type="date" name="data" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

</form>