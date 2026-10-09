<!-- Esto es la vista del controlador -->

<!-- <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | Prueba CI4</title>
    </head>
    <body>
        <h1> Bienvenidos a mi primer dashboard </h1>
        <p>Primera prueba con PHP y CodeIgniter</p>
        <h2>Panel de tareas</h2>
        <ul>
            <li>Aprender PHP</li>
            <li>Aprender CodeIgniter</li>
            <li>Aprender Around</li>
            <li>Prepararme para el modulo SAT</li>
        </ul>
    </body>
</html> -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= esc($titulo) ?></title>
    </head>
    <body>
        <h1><?= esc($titulo) ?></h1>
        <p>Hola, <?= esc($usuario) ?>.</p>
        <h2>Mis tareas de aprendizaje</h2>
        <ul>
            <li>Aprender PHP</li>
            <li>Practicar CodeIgniter 4</li>
            <li>Crear mi primer sistema CRUD</li>
        </ul>
    </body>
</html>

<!-- Que significa esc()
 Es una funcion de CodeIgniter que escapa los datos para evitar que contenido
 introducido por un usuario se interprete como HTML ejecutable
 Es una buena practica al mostrar datos dinamicos -->