<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../../login.php");
    exit;
}

include "../../data/dados.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">
        <h2>Lista de Contas</h2>
        <a href="../dashboard.php" class="btn btn-secondary">Voltar</a>
    </div>

    <table class="table table-bordered bg-white">
        <tr>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Tipo</th>
        </tr>

        <?php foreach ($contas as $c) { ?>
        <tr>
            <td><?= $c["descricao"] ?></td>
            <td>R$ <?= $c["valor"] ?></td>
            <td><?= $c["tipo"] ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>