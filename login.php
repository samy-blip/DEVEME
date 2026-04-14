<?php
session_start();
include "data/dados.php";

$erro = "";

if ($_POST) {

    foreach ($usuarios as $u) {

        if (
            $u["usuario"] == $_POST["usuario"] &&
            $u["senha"] == $_POST["senha"]
        ) {
            $_SESSION["usuario"] = $u;
            header("Location: pages/dashboard.php");
            exit;
        }
    }

    $erro = "Login inválido!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width: 400px;">

    <div class="card p-4">

        <h2 class="text-center">Login</h2>

        <?php if ($erro) { ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php } ?>

        <form method="POST">

            <input type="text" name="usuario" placeholder="Usuário"
                   class="form-control mb-3">

            <input type="password" name="senha" placeholder="Senha"
                   class="form-control mb-3">

            <button class="btn btn-primary w-100">
                Entrar
            </button>

        </form>

    </div>

</div>

</body>
</html>