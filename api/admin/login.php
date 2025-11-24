<?php
require '../includes/db.php'; // incluye tu función login()
session_start(); // siempre primero, antes de cualquier HTML

$error = ""; // variable para errores

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (login($usuario, $password)) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logeado'] = true;
        header("Location: dashboard.php"); 
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administración</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: var(--fondo);
    }

    .login-box {
        background: white;
        padding: 2rem;
        border-radius: var(--radius);
        box-shadow: var(--card-shadow);
        width: 100%;
        max-width: 400px;
    }

    .login-box h2 {
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: var(--radius);
    }

    .btn-login {
        width: 100%;
        padding: 0.75rem;
        background: var(--verde-oscuro);
        color: white;
        border: none;
        border-radius: var(--radius);
        cursor: pointer;
        font-weight: bold;
    }

    .error {
        color: #dc3545;
        margin-bottom: 1rem;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Iniciar Sesión</h2>

            <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
            <?php } ?>

            <form method="post">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" required>
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </div>
    </div>
</body>

</html>