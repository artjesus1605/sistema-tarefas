<h1>Editar Tarefa</h1>
<?php
$sql = "SELECT * FROM Tarefa where ID=" . $_REQUEST["ID"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar" method="post">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="ID" value="<?php print $row->ID; ?>">
    <div class="mb-3">
        <label>Nome da tarefa</label>
        <input type="text" name="Nome" class="form-control" value="<?php print $row->Nome; ?>">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="<?php print $row->Descricao; ?>">
    </div>
    <div class="mb-3">
        <label>Data de vencimento</label>
        <input type="date" name="data" class="form-control" value="<?php print $row->Dados_de_vencimento; ?>">
    </div>
    <div class="mb-3">
        <label>Data de vencimento</label>
        <select name="status" class="form-control" value="<?php print $row->status; ?>">
            <option value="0">Pendente</option>
            <option value="1">Concluido</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

</form>