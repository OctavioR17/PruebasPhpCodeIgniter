<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($titulo) ?></title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
                Mi sistema de tareas
            </a>

            <span class="navbar-text">
                <?= esc($usuario) ?>
            </span>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container py-4">

        <div class="mb-4">
            <h1 class="h3"><?= esc($titulo) ?></h1>
            <p class="text-secondary">
                Bienvenido a tu panel de administración.
            </p>
        </div>

        <!-- Tarjetas de resumen -->
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">
                            Total de tareas
                        </p>
                        <h2 class="display-6 fw-bold">12</h2>
                        <span class="badge text-bg-primary">
                            Registradas
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">
                            Pendientes
                        </p>
                        <h2 class="display-6 fw-bold">5</h2>
                        <span class="badge text-bg-warning">
                            Por realizar
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">
                            Completadas
                        </p>
                        <h2 class="display-6 fw-bold">7</h2>
                        <span class="badge text-bg-success">
                            Finalizadas
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tabla de tareas -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0">Mis tareas</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tarea</th>
                                <th>Estado</th>
                                <th>Prioridad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Aprender PHP</td>
                                <td>
                                    <span class="badge text-bg-warning">
                                        Pendiente
                                    </span>
                                </td>
                                <td>Alta</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Practicar CodeIgniter 4</td>
                                <td>
                                    <span class="badge text-bg-success">
                                        Completada
                                    </span>
                                </td>
                                <td>Media</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Crear un sistema CRUD</td>
                                <td>
                                    <span class="badge text-bg-warning">
                                        Pendiente
                                    </span>
                                </td>
                                <td>Alta</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <footer class="text-center text-secondary mt-4 small">
            Proyecto de práctica con PHP y CodeIgniter 4
        </footer>

    </main>

</body>
</html>