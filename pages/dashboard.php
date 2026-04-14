<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

include "../data/dados.php";

$usuario = $_SESSION["usuario"];
$saldo = 0;

foreach ($contas as $c) {
    if ($c["tipo"] == "Receber") {
        $saldo += $c["valor"];
    } else {
        $saldo -= $c["valor"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Bem-vindo, <?= $usuario["usuario"] ?></h2>
        <a href="../logout.php" class="btn btn-danger">Sair</a>
    </div>

    <div class="card p-4 mb-3">
        <h4>Perfil:</h4>

        <?php
        if ($usuario["perfil"] == "cliente") {
            echo "Área do Cliente";
        } elseif ($usuario["perfil"] == "empresa") {
            echo "Área da Empresa";
        } else {
            echo "Área Financeira";
        }
        ?>
    </div>

    <div class="card p-4">
        <h4>Saldo Atual</h4>
        <h3>R$ <?= $saldo ?></h3>
    </div>

</div>

</body>
</html>