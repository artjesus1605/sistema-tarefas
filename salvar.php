<?php
    switch($_REQUEST["acao"]){
        case 'cadastrar':
        $nome = $_SESSION['form_nome'];
        $descricao = $_SESSION['form_descricao'];
        
        $autor = $_SESSION['form_autor'];
        $ordem_servico = $_SESSION['form_ordem_servico'];
        
        $data_vencimento = $_POST['dados_de_vencimento'];
        $status = $_POST['status'];

        $sql = "INSERT INTO tarefa (nome, descricao, autor, ordem_servico, dados_de_vencimento, status) 
                VALUES ('{$nome}', '{$descricao}', '{$autor}', '{$ordem_servico}', '{$data_vencimento}', '{$status}')";
        
        $res = $conn->query($sql);

        if ($res) {
            unset($_SESSION['form_nome']);
            unset($_SESSION['form_descricao']);
            unset($_SESSION['form_autor']);
            unset($_SESSION['form_ordem_servico']);
            
            print "<script>alert('Ordem e Tarefa cadastradas com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar no banco de dados!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
        case"editar":
            $nome = $_POST["Nome"];
            $descricao = $_POST["descricao"];
            $data = $_POST["data"];
            $status = $_POST["status"];


            $sql = "UPDATE Tarefa SET
                nome='{$nome}',
                descricao='{$descricao}',
                Dados_de_vencimento='{$data}',
                status='{$status}'
                
            WHERE
                Id=".$_REQUEST["ID"];

            $res = $conn->query($sql);
            if ($res) {
            print "<script>alert('Tarefa atualizada com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>"; // Volta para a lista
        } else {
            print "<script>alert('Erro ao editar!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

        case 'excluir':
        $id = $_REQUEST["ID"]; 

        $sql = "DELETE FROM tarefa WHERE id=" . $id;
        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Tarefa excluída com sucesso!');</script>";
            
            $sql_check = "SELECT count(*) as total FROM tarefa";
            $res_check = $conn->query($sql_check);
            $total = $res_check->fetch_object()->total;

            if ($total > 0) {
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>location.href='index.php';</script>";
            }

        } else {
            print "<script>alert('Erro ao tentar excluir.');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
    }
