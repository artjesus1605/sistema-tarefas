<h1>listar tarefas</h1>
<?php
$sql = "SELECT * FROM tarefa";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Nome</th>";
    print "<th>Descrição</th>";
    print "<th>Autor</th>";        
    print "<th>O.S.</th>";          
    print "<th>Data de vencimento</th>";
    print "<th>Status</th>";
    print "<th>Ações</th>";
    while ($row = $res->fetch_object()) {
        if ($row->status == false) {
            $styleClass = "text-danger";
            $statusText = "Pendente";
        } elseif ($row->status == true) {
            $styleClass = "text-success";
            $statusText = "Concluído";
        } else {
            $styleClass = "";
            $statusText = "";
        }

       print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->descricao . "</td>";
        print "<td>" . $row->autor . "</td>";        
        print "<td>" . $row->ordem_servico . "</td>"; 
        print "<td>" . $row->Dados_de_vencimento . "</td>";
        print "<td class='" . $styleClass . "'>" . $statusText . "</td>";
        print "<td><button onclick=\"location.href='?page=editar&ID=" . $row->id . "';\" class='btn btn-success'>Editar</button>
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&ID=" . $row->id . "'}else{false;}\" class='btn btn-danger'>Excluir</button></td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p class='alert alert-danger'>não encontrou resultados</p>";
}
?>