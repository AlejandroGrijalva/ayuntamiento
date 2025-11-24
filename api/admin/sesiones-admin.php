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


function obtenerSesiones() {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM sesiones ORDER BY date DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}


$sesiones = obtenerSesiones();


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
                                <a href="?editar=<?php echo $sesion['id']; ?>" class="btn-sm btn-edit">Edit</a>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="eliminar">
                                    <input type="hidden" name="id" value="<?php echo $sesion['id']; ?>">
                                    <button type="submit" class="btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this session?')">Delete</button>
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
            <div id="modalSesion" class="modal" style="<?php echo $sesion_editar ? 'display:block;' : ''; ?>">
                <div class="modal-content">
                    <h2><?php echo $sesion_editar ? 'Edit Session' : 'New Session'; ?></h2>
                    <form method="post">
                        <input type="hidden" name="action" value="<?php echo $sesion_editar ? 'editar' : 'crear'; ?>">
                        <?php if ($sesion_editar): ?>
                        <input type="hidden" name="id" value="<?php echo $sesion_editar['id']; ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" value="<?php echo $sesion_editar['date'] ?? ''; ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description"
                                required><?php echo $sesion_editar['description'] ?? ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="text" id="duration" name="duration"
                                value="<?php echo $sesion_editar['duration'] ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="transcribed">
                                <input type="checkbox" id="transcribed" name="transcribed"
                                    <?php echo ($sesion_editar['transcribed'] ?? false) ? 'checked' : ''; ?>>
                                Transcribed
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="acta">Complete Transcript:</label>
                            <textarea id="acta" name="acta" rows="8"
                                placeholder="Write the complete session transcript here..."><?php echo $sesion_editar['acta'] ?? ''; ?></textarea>
                            <div class="audio-controls">
                                <button type="button" class="btn-audio" onclick="textoAVoz()"
                                    title="Listen to transcript">
                                    🔊 Listen
                                </button>
                                <button type="button" class="btn-pause" onclick="pausarAudio()" title="Pause audio">
                                    ⏸️ Pause
                                </button>
                                <button type="button" class="btn-stop" onclick="detenerAudio()" title="Stop audio">
                                    ⏹️ Stop
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="summary">
                                AI Summary:
                                <button type="button" class="btn-resumir" onclick="generarResumen()"
                                    style="margin-left: 10px;">
                                    🤖 Generate Summary
                                </button>
                            </label>
                            <textarea id="summary" name="summary" rows="4"
                                placeholder="The AI-generated summary will appear here..."><?php echo $sesion_editar['summary'] ?? ''; ?></textarea>
                            <div class="resumen-status" id="resumenStatus"></div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">Save Session</button>
                            <a href="sesiones-admin.php" class="btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <script>
            let sintesisVoz = null;
            let estaHablando = false;

            function abrirModal() {
                document.getElementById('modalSesion').style.display = 'block';
                document.getElementById('formSesion').reset();
                document.getElementById('sesionId').value = '';
                document.getElementById('resumenStatus').textContent = '';
                detenerAudio();
            }

            function cerrarModal() {
                document.getElementById('modalSesion').style.display = 'none';
                detenerAudio();
            }

            function escucharSesion(id) {
                alert('Playing audio for session ' + id);
            }

            function textoAVoz() {
                const texto = document.getElementById('acta').value;
                if (!texto.trim()) {
                    alert('No text to convert to speech');
                    return;
                }

                if (sintesisVoz && estaHablando) {
                    window.speechSynthesis.cancel();
                }

                sintesisVoz = new SpeechSynthesisUtterance(texto);
                sintesisVoz.lang = 'es-ES';
                sintesisVoz.rate = 0.9;
                sintesisVoz.pitch = 1;

                sintesisVoz.onstart = function() {
                    estaHablando = true;
                };

                sintesisVoz.onend = function() {
                    estaHablando = false;
                };

                window.speechSynthesis.speak(sintesisVoz);
            }

            function pausarAudio() {
                if (estaHablando) {
                    window.speechSynthesis.pause();
                    estaHablando = false;
                }
            }

            function detenerAudio() {
                window.speechSynthesis.cancel();
                estaHablando = false;
            }

            function generarResumen() {
                const textoCompleto = document.getElementById('acta').value;
                if (!textoCompleto.trim()) {
                    alert('No text to summarize');
                    return;
                }

                const statusElement = document.getElementById('resumenStatus');
                statusElement.textContent = '🤖 AI processing text...';
                statusElement.style.color = '#2196F3';

                // Simulación de llamada a IA
                setTimeout(() => {
                    const resumenGenerado = simularResumenIA(textoCompleto);
                    document.getElementById('summary').value = resumenGenerado;
                    statusElement.textContent = '✅ Summary generated successfully';
                    statusElement.style.color = '#4CAF50';
                }, 2000);
            }

            function simularResumenIA(texto) {
                // Simulación básica - en producción conectarías a una API real
                const oraciones = texto.split('.').filter(oracion => oracion.trim().length > 0);
                const resumen = oraciones.slice(0, 3).join('. ') + '.';

                return `AI SUMMARY:\n\n${resumen}\n\n[This is a simulated summary]`;
            }

            // Cerrar modal si se hace clic fuera
            window.onclick = function(event) {
                var modal = document.getElementById('modalSesion');
                if (event.target == modal) {
                    window.location.href = 'sesiones-admin.php';
                }
            }

            // Si hay sesión para editar, abrir el modal automáticamente
            <?php if ($sesion_editar): ?>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('modalSesion').style.display = 'block';
            });
            <?php endif; ?>
            </script>
        </main>
    </div>
</body>

</html>