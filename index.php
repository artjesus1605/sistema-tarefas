<?php session_start(); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Master</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tarefas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=nova">Nova tarefa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar tarefas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                
                include("config.php");

                
                switch (@$_REQUEST["page"]) {
                    case "nova":
                        include("cadastrar.php");
                        break;
                    case "listar":
                        include("listar.php");
                        break;
                    case "salvar":
                        include("salvar.php");
                        break;
                    case "editar":
                        include("editar.php");
                        break;
                    default:
                       
                        $sql_total = "SELECT count(*) as total FROM tarefa";
                        $res_total = $conn->query($sql_total);
                        $total = $res_total->fetch_object()->total;

                        $sql_pendentes = "SELECT count(*) as pendentes FROM tarefa WHERE status = 0";
                        $res_pendentes = $conn->query($sql_pendentes);
                        $pendentes = $res_pendentes->fetch_object()->pendentes;

                        $sql_concluidas = "SELECT count(*) as concluidas FROM tarefa WHERE status = 1";
                        $res_concluidas = $conn->query($sql_concluidas);
                        $concluidas = $res_concluidas->fetch_object()->concluidas;
                ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h1 class="display-5">Bem-vindo, Arthur!</h1>
                                    <p class="text-muted">Aqui está o resumo do seu gerenciamento de tarefas.</p>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-warning shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Pendentes</h5>
                                            <h2 class="display-5 fw-bold"><?php echo $pendentes; ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-success shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Concluídas</h5>
                                            <h2 class="display-5 fw-bold"><?php echo $concluidas; ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-primary shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Total de Tarefas</h5>
                                            <h2 class="display-5 fw-bold"><?php echo $total; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <a href="?page=nova" class="btn btn-primary me-2">Criar Nova Tarefa</a>
                                    <a href="?page=listar" class="btn btn-outline-secondary">Ver Todas as Tarefas</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        break; 
                } 
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>