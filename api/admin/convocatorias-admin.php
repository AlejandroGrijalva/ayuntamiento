<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Convocatorias</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="page-header">
                <h1>Gestión de Convocatorias</h1>
                <button class="btn-primary">+ Nueva Convocatoria</button>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Estado</th>
                            <th>Fecha Límite</th>
                            <th>Activa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Consulta pública: Parque Central</td>
                            <td><span class="badge badge-success">Vigente</span></td>
                            <td>2025-12-05</td>
                            <td>✅</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit">Editar</button>
                                <button class="btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Apoyo cultural</td>
                            <td><span class="badge badge-secondary">Cerrada</span></td>
                            <td>2025-11-20</td>
                            <td>❌</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit">Editar</button>
                                <button class="btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>