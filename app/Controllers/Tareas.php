<?php

namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get('tareas') === null) {
            $session->set('tareas', [
                [
                    'id' => 1,
                    'nombre' => 'Aprender PHP',
                    'estado' => 'Pendiente'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Practicar CodeIgniter 4',
                    'estado' => 'Completada'
                ]
            ]);
        }

        $data = [
            'titulo' => 'Listado de tareas',
            'tareas' => $session->get('tareas'),
            'errores' => session()->getFlashdata('errores')
        ];

        return view('tareas/index', $data);
    }

    public function guardar()
    {
        $reglas = [
            'nombre' => 'required|min_length[3]|max_length[100]'
        ];

        if (! $this->validate($reglas)) {
            return redirect()
                ->to(site_url('tareas'))
                ->withInput()
                ->with('errores', $this->validator->getErrors());
        }

        $session = session();
        $tareas = $session->get('tareas') ?? [];

        $nuevoId = empty($tareas)
            ? 1
            : max(array_column($tareas, 'id')) + 1;

        $tareas[] = [
            'id' => $nuevoId,
            'nombre' => trim($this->request->getPost('nombre')),
            'estado' => 'Pendiente'
        ];

        $session->set('tareas', $tareas);

        return redirect()
            ->to(site_url('tareas'))
            ->with('mensaje', '¡Tarea registrada correctamente!');
    }
}