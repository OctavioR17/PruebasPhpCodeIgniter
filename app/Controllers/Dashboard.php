<?php

namespace App\Controllers;

#use App\Controllers\BaseController;
#use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        #return 'Hola, mi primera prueba con CodeIgniter 4';
        $data = [
            'titulo' => 'Panel de tareas',
            'usuario' => 'Desarrollador de prueba'
        ];

        return view('dashboard', $data);
        #Aqui se le dice a CI que cargue la vista dashboard.php y le envide 
        #los datos contenidos en la variable $data
    }

    public function index2()
    {
        $data = [
            'titulo' => 'Panel de tareas',
            'usuario' => 'Desarrollador de prueba'
        ];
        return view('newdashboard', $data);
    }
    
}
# <!-- Esto es el controlador -> La logica del programa -->