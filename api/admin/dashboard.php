<?php
session_start();
//cerrar sesion
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();   // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header("Location: login.php");
    exit;
}


if (!isset($_SESSION['logeado']) || $_SESSION['logeado'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administración</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3></h3>
                    <p>Convocatorias</p>
                    <a href="convocatorias-admin.php">Gestionar</a>
                </div>
                <div class="stat-card">
                    <h3></h3>
                    <p>Sesiones</p>
                    <a href="sesiones-admin.php">Gestionar</a>
                </div>
                <div class="stat-card">
                    <h3></h3>
                    <p>Proyectos</p>
                    <a href="planeacion-admin.php">Gestionar</a>
                </div>
                <div class="stat-card">
                    <h3></h3>
                    <p>Documentos</p>
                    <a href="transparencia-admin.php">Gestionar</a>
                </div>
            </div>

            <div class="recent-activity">
                <h2>Actividad Reciente</h2>
                <div class="activity-list">
                    <div class="activity-item">
                        <span class="activity-icon">📢</span>
                        <div class="activity-info">
                            <p>Nueva convocatoria publicada</p>
                            <small>Hace 2 horas</small>
                        </div>
                    </div>
                    <div class="activity-item">
                        <span class="activity-icon">📝</span>
                        <div class="activity-info">
                            <p>Sesión transcrita y publicada</p>
                            <small>Hace 1 día</small>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>