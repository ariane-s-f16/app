<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas biblioteca - Cadastro de Alunos</title>
</head>
<body>
    <div >
        <?php include VIEWS . '/includes/menu.php' ?>

        <h1>Cadastro de Alunos<h1>
            <?= $model-> getErrors()?>
            <form method="post" action ="/">
    </div>
</body>
</html>