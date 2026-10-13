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

        <!-- Mensaje de éxito flashdata -->
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('mensaje')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <!-- Alerta de errores de validación -->
        <?php if (! empty($errores)): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulario para agregar tarea -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h2 class="h5 card-title mb-3">Nueva Tarea</h2>
                
                <form action="<?= site_url('tareas/guardar') ?>" method="post">
                    <!-- Protección CSRF obligatoria en CI4 -->
                    <?= csrf_field() ?>

                    <div class="row g-2 align-items-center">
                        <div class="col-md-9">
                            <input 
                                type="text" 
                                name="nombre" 
                                class="form-control <?= isset($errores['nombre']) ? 'is-invalid' : '' ?>" 
                                placeholder="Ej. Comprar pan, revisar pull request..."
                                value="<?= old('nombre') ?>"
                                autofocus
                            >
                            <?php if (isset($errores['nombre'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc($errores['nombre']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                Guardar Tarea
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de tareas -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th>Tarea</th>
                                <th style="width: 150px;">Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (empty($tareas)): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">
                                        No hay tareas registradas.
                                    </td>
                                </tr>
                            <?php else: ?>
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
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </main>

    <!-- Bootstrap JS para permitir cerrar alertas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>