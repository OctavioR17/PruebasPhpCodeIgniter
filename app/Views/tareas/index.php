
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($titulo) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
                Mi sistema de tareas
            </a>
        </div>
    </nav>

    <main class="container py-4">

        <h1 class="h3 mb-4"><?= esc($titulo) ?></h1>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarea</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tareas as $tarea): ?>
                                <tr>
                                    <td><?= esc($tarea['id']) ?></td>
                                    <td><?= esc($tarea['nombre']) ?></td>
                                    <td>
                                        <?php if ($tarea['estado'] === 'Completada'): ?>
                                            <span class="badge text-bg-success">
                                                Completada
                                            </span>
                                        <?php else: ?>
                                            <span class="badge text-bg-warning">
                                                Pendiente
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </main>

</body>
</html>