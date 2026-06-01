<?php
$passo = isset($_GET['etapa']) ? (int)$_GET['etapa'] : 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($passo == 1) {
        $_SESSION['form_nome'] = $_POST['nome'];
        $_SESSION['form_descricao'] = $_POST['descricao'];
        print "<script>location.href='?page=nova&etapa=2';</script>";
        exit;
    } elseif ($passo == 2) {
        $_SESSION['form_autor'] = $_POST['autor'];
        $_SESSION['form_ordem_servico'] = $_POST['ordem_servico'];
        print "<script>location.href='?page=nova&etapa=3';</script>";
        exit;
    }
}
?>

<div class="mt-4">
    <h2>Nova Tarefa <span class="text-muted fs-5">- Etapa <?php echo $passo; ?> de 3</span></h2>
    <hr>

    <form action="?page=<?php echo ($passo == 3) ? 'salvar&acao=cadastrar' : 'nova&etapa=' . $passo; ?>" method="POST">
        
        <?php if ($passo == 1): ?>
            <h4 class="mb-3 text-secondary">Informações da Tarefa</h4>
            <div class="mb-3">
                <label class="form-label">Nome da Tarefa</label>
                <input type="text" name="nome" class="form-control" required value="<?php echo @$_SESSION['form_nome']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição Breve</label>
                <textarea name="descricao" class="form-control" rows="3" required><?php echo @$_SESSION['form_descricao']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Avançar para Responsáveis ➔</button>

        <?php elseif ($passo == 2): ?>
            <h4 class="mb-3 text-secondary">Controle e Identificação</h4>
            <div class="mb-3">
                <label class="form-label">Autor da Tarefa</label>
                <input type="text" name="autor" class="form-control" required value="<?php echo @$_SESSION['form_autor']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Número da Ordem de Serviço </label>
                <input type="text" name="ordem_servico" class="form-control" required value="<?php echo @$_SESSION['form_ordem_servico']; ?>">
            </div>
            <a href="?page=nova&etapa=1" class="btn btn-secondary">🡠 Voltar</a>
            <button type="submit" class="btn btn-primary">Avançar para Prazos ➔</button>

        <?php elseif ($passo == 3): ?>
            <h4 class="mb-3 text-secondary">Prazos e Finalização</h4>
            <div class="mb-3">
                <label class="form-label">Data de Vencimento</label>
                <input type="date" name="dados_de_vencimento" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Inicial</label>
                <select name="status" class="form-select">
                    <option value="0">Pendente</option>
                    <option value="1">Concluída</option>
                </select>
            </div>
            <a href="?page=nova&etapa=2" class="btn btn-secondary">🡠 Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Ordem e Tarefa</button>
        <?php endif; ?>
        
    </form>
</div>