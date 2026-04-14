<?php


session_start();
include "data/dados.php";

$erro = "";

if ($_POST) {
    $usuarioDigitado = $_POST["usuario"];
    $senhaDigitada = $_POST["senha"];

    foreach ($usuarios as $u) {
        if ($u["usuario"] == $usuarioDigitado && $u["senha"] == $senhaDigitada) {
            $_SESSION["usuario"] = $u;
            header("Location: pages/dashboard.php");
            exit;
        }
    }

    $erro = "Usuário ou senha inválidos!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistema Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 350px;">
        <h2 class="text-center mb-4">Login</h2>

        <?php if ($erro != ""): ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Usuário</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

</body>
</html>