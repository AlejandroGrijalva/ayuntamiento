<?php
require_once '../includes/auth.php';
requerirLogin();
require_once '../includes/db.php';

// Procesar acciones del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = conectarBD();
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'crear':
                $stmt = $pdo->prepare("INSERT INTO sesiones (date, description, duration, transcribed, acta, summary) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $_POST['date'],
                    $_POST['description'],
                    $_POST['duration'],
                    isset($_POST['transcribed']) ? 1 : 0,
                    $_POST['acta'] ?? '',
                    $_POST['summary'] ?? ''
                ]);
                break;
                
            case 'editar':
                $stmt = $pdo->prepare("UPDATE sesiones SET date = ?, description = ?, duration = ?, transcribed = ?, acta = ?, summary = ? WHERE id = ?");
                $stmt->execute([
                    $_POST['date'],
                    $_POST['description'],
                    $_POST['duration'],
                    isset($_POST['transcribed']) ? 1 : 0,
                    $_POST['acta'] ?? '',
                    $_POST['summary'] ?? '',
                    $_POST['id']
                ]);
                break;
                
            case 'eliminar':
                $stmt = $pdo->prepare("DELETE FROM sesiones WHERE id = ?");
                $stmt->execute([$_POST['id']]);
                break;
        }
        
        // Redirigir para evitar reenvío del formulario
        header('Location: sesiones-admin.php');
        exit;
    }
}

// Función para obtener todas las sesiones
function obtenerSesiones() {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM sesiones ORDER BY date DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Obtener las sesiones de la base de datos
$sesiones = obtenerSesiones();

// Obtener sesión para editar si se solicita
$sesion_editar = null;
if (isset($_GET['editar'])) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM sesiones WHERE id = ?");
    $stmt->execute([$_GET['editar']]);
    $sesion_editar = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sesiones</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <!-- Header -->
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="page-header">
                <h1>Gestión de Sesiones de Cabildo</h1>
                <button class="btn-primary" onclick="abrirModal()">+ Nueva Sesión</button>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Duración</th>
                            <th>Transcrita</th>
                            <th>Resumen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sesiones as $sesion): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sesion['date']); ?></td>
                            <td><?php echo htmlspecialchars($sesion['description']); ?></td>
                            <td><?php echo htmlspecialchars($sesion['duration']); ?></td>
                            <td><?php echo $sesion['transcribed'] ? '✅' : '❌'; ?></td>
                            <td>
                                <?php 
                                if (!empty($sesion['summary'])) {
                                    echo htmlspecialchars(substr($sesion['summary'], 0, 100) . '...');
                                } else {
                                    echo 'No summary';
                                }
                                ?>
                            </td>
                            <td class="actions">
                                <a href="?editar=<?php echo $sesion['id']; ?>" class="btn-sm btn-edit">Editar</a>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="eliminar">
                                    <input type="hidden" name="id" value="<?php echo $sesion['id']; ?>">
                                    <button type="submit" class="btn-sm btn-danger"
                                        onclick="return confirm('¿Estas seguro que quieres eliminar esta sesion?')">Eliminar</button>
                                </form>
                                <?php if (!empty($sesion['acta'])): ?>
                                <button class="btn-sm btn-audio"
                                    onclick="escucharSesion(<?php echo $sesion['id']; ?>)">🔊</button>
                                <?php else: ?>
                                <button class="btn-sm btn-audio" disabled>🔊</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal para crear/editar -->
            <div id="modalSesion" class="modal"
                style="<?php echo $sesion_editar ? 'display:block;' : ''; ?> margin-top: -2rem;">
                <div class="modal-content">
                    <h2><?php echo $sesion_editar ? 'Editar Sesión' : 'Nueva Sesión'; ?></h2>
                    <form method="post">
                        <input type="hidden" name="action" value="<?php echo $sesion_editar ? 'editar' : 'crear'; ?>">
                        <?php if ($sesion_editar): ?>
                        <input type="hidden" name="id" value="<?php echo $sesion_editar['id']; ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="date">Fecha:</label>
                            <input type="date" id="date" name="date" value="<?php echo $sesion_editar['date'] ?? ''; ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            <textarea id="description" name="description"
                                required><?php echo $sesion_editar['description'] ?? ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duración</label>
                            <input type="text" id="duration" name="duration"
                                value="<?php echo $sesion_editar['duration'] ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="transcribed">
                                <input type="checkbox" id="transcribed" name="transcribed"
                                    <?php echo ($sesion_editar['transcribed'] ?? false) ? 'checked' : ''; ?>>
                                Transcrita
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="acta">Completar Transcripción:</label>
                            <textarea id="acta" name="acta" rows="8"
                                placeholder="Write the complete session transcript here..."><?php echo $sesion_editar['acta'] ?? ''; ?></textarea>
                            <div class="audio-controls">
                                <button type="button" style="margin-bottom: 10px" class="btn-voice"
                                    onclick="iniciarGrabacion()" title="Start voice recording" id="btnGrabar">
                                    Compenzar a grabar
                                </button>
                                <button type="button" class="btn-stop" onclick="detenerGrabacion()"
                                    title="Stop recording" id="btnDetener" disabled>
                                    Detener grabación
                                </button>
                                <span id="estadoGrabacion" style="margin-left: 10px; font-weight: bold;"></span>
                            </div>
                            <div id="infoVoz" style="margin-top: 10px; font-size: 0.9rem; color: #666;">
                                <p><strong>Nota:</strong> El reconocimiento de voz funciona mejor en Chrome/Edge con
                                    conexión a internet</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="summary">
                                Resumen de IA
                                <button type="button" onclick="resumir()"
                                    style="margin-left: 10px; background-color: #4caF50; padding: 5px;border: none; border-radius: 5px">
                                    Generar Resumen
                                </button>
                            </label>
                            <textarea id="summary" name="summary" rows="4"
                                placeholder="El resumen por ia estara aqui"></textarea>
                            <div class="resumen-status" id="resumenStatus"></div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">Guardar Sesión</button>
                            <a href="sesiones-admin.php" class="btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

            <script>
            <?php if ($sesion_editar): ?>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('modalSesion').style.display = 'block';
            });
            <?php endif; ?>
            </script>
        </main>
    </div>
    <script src="../js/admin.js"></script>
    <script src="../js/apiresumen.js"></script>
</body>

</html>