<?php

namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        $session = session();

        // Línea temporal para forzar el reinicio:
        //$session->remove('tareas') ;

        if ($session->get('tareas') === null) {
            $session->set('tareas', [
                [
                    'id' => 1,
                    'nombre' => 'Veko estuvo aqui',
                    'estado' => 'Completada'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Aprender PHP',
                    'estado' => 'Pendiente'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Practicar CodeIgniter 4',
                    'estado' => 'Pendiente'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Aprender Around / Estudiar',
                    'estado' => 'Pendiente'
                ]
            ]);
        }

        $data = [
            'titulo' => 'Cambio de texto para probar ramas en git | listado de tareas',
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

    public function editar($id)
    {
        $session = session();
        $tareas = $session->get('tareas') ?? [];

        foreach ($tareas as &$tarea) {
            if ($tarea['id'] == $id) {
                // Alternar estado
                $tarea['estado'] = ($tarea['estado'] === 'Pendiente') ? 'Completada' : 'Pendiente';
                break;
            }
        }

        $session->set('tareas', $tareas);

        return redirect()
            ->to(site_url('tareas'))
            ->with('mensaje', '¡Estado actualizado correctamente!');
    }

    public function borrar($id)
    {
        $session = session();
        $tareas = $session->get('tareas') ?? [];

        // Filtrar quitando el id seleccionado
        $tareasFiltradas = array_filter($tareas, function ($tarea) use ($id) {
            return $tarea['id'] != $id;
        });

        // array_values reindexa el arreglo numérico
        $session->set('tareas', array_values($tareasFiltradas));

        return redirect()
            ->to(site_url('tareas'))
            ->with('mensaje', '¡Tarea eliminada correctamente!');
    }
}