<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Cadastro de Usuario</h1>

        <?= $model__usuario->getErrors() ?>

        <form method="post" action="/aluno/cadastro" class="p-5">
            
            <input name="id" type="hidden" value="<?= $model__usuario->Id ?>" /> 
           
            <div class="mb-3">
                <label for="nome" class="form-label">NOME:</label>
                <input type="text" value="<?= $model_usuario->nome ?>" class="form-control" name="nome" id="nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL:</label>
                <input type="text" value="<?= $model_usuario->email ?>" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">SENHA:</label>
                <input type="password" value="<?= $model_usuario->senha ?>" class="form-control" name="senha" id="senha">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>