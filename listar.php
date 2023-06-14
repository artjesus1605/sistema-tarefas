<h1>listar tarefas</h1>
<?php
$sql = "SELECT * From tarefa";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Nome</th>";
    print "<th>Descrição</th>";
    print "<th>Data de vencimento</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->ID . "</td>";
        print "<td>" . $row->Nome . "</td>";
        print "<td>" . $row->Descricao . "</td>";
        print "<td>" . $row->Dados_de_vencimento . "</td>";
        print "<td><button onclick=\"location.href='?page=editar&ID=" . $row->ID . "';\" class='btn btn-success'>Editar</button>
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&ID=" . $row->ID . "'}else{false;}\" class='btn btn-danger'>Excluir</button></td>";

        print "</tr>";
    }
    print "</table>";
} else {
    print "<p class='alert alert-danger'>não encontrou resultados</p>";
}
?>