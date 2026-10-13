<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
//$routes->get('/dashboard','Dashboard::index'); 
#/dashboard: direccion o ruta que visitaremos
#Dashboard: es el nombre del controlador
#index: es el metodo que se ejecutara
$routes->get('/newdashboard','Dashboard::index2'); 
$routes->get('/tareas','Tareas::index');
$routes->post('/tareas/guardar','Tareas::guardar');