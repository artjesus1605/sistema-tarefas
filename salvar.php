<?php
    switch($_REQUEST["acao"]){
        case"cadastrar":
            $nome = $_POST["Nome"];
            $descricao = $_POST["descricao"];
            $data = $_POST["data"];

            $sql = "INSERT INTO Tarefa(Nome, Descricao, Dados_de_vencimento) values('{$nome}', '{$descricao}', '{$data}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro com concluido com sucesso!')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }else{
                print "<script>alert('Não foi possivel cadastrar')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }
        break;
        case"editar":
            $nome = $_POST["Nome"];
            $descricao = $_POST["descricao"];
            $data = $_POST["data"];

            $sql = "UPDATE Tarefa SET
                nome='{$nome}',
                descricao='{$descricao}',
                Dados_de_vencimento='{$data}'
            WHERE
                Id=".$_REQUEST["ID"];

            $res = $conn->query($sql);
            if($res==true){
                print "<script>alert('Editado com sucesso!')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }else{
                print "<script>alert('Não foi possivel editar')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }
        break;

        case"excluir":
            $sql = "DELETE FROM tarefa where ID=".$_REQUEST["ID"];
            $res = $conn->query($sql);
            if($res==true){
                print "<script>alert('Excluido com sucesso!')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }else{
                print "<script>alert('Não foi possivel excluir')</script>";
                print "<script>location.href=?page=listar.php</script>";
            }
        break;
    }
?>