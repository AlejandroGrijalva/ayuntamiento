<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Planeación</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="page-header">
                <h1>Gestión de Planeación</h1>
                <button class="btn-primary">+ Nuevo Proyecto</button>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre del Proyecto</th>
                            <th>Fase</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Parque Central</td>
                            <td>Construcción</td>
                            <td>Activo</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit">Editar</button>
                                <button class="btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Mejoras en alumbrado</td>
                            <td>Diseño</td>
                            <td>Activo</td>
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