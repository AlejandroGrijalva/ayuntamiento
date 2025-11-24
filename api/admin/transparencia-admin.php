<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Transparencia</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="page-header">
                <h1>Gestión de Transparencia</h1>
                <button class="btn-primary">+ Nuevo Documento</button>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre del Documento</th>
                            <th>Tipo</th>
                            <th>Público</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Acta - 12 Nov 2025</td>
                            <td>Acta</td>
                            <td>✅</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit">Editar</button>
                                <button class="btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Reporte financiero 2025</td>
                            <td>Reporte</td>
                            <td>✅</td>
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