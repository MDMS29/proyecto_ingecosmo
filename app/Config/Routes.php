<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Principal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Principal::index'); // Vista directa al Login
$routes->get('/home', 'Principal::home'); //Vista de entrada al home
// $routes->get('/ConsultarUsuarios/(:num)', 'Usuarios::index/$1'); //consultar Usuario para parametro de id

$routes->post('/instrUsu', 'Usuarios::insertar'); //Buscar Usuario
$routes->post('/instrTra', 'Trabajadores::insertar'); //Buscar Usuario
$routes->post('/instrCli', 'Clientes::insertar'); //Buscar CLiente
$routes->post('/instrPro', 'Proveedor::insertar'); //Buscar CLiente
$routes->post('/srchUsu/(:num)/(:num)', 'Usuarios::buscarUsuario/$1/$2'); //Buscar Usuario
$routes->post('/srchCli/(:num)/(:num)', 'Clientes::buscarCliente/$1/$2'); //Buscar Cliente
$routes->post('/srchIns/(:num)/(:any)', 'Insumos::buscarInsumo/$1/$2'); //Buscar Insumo
$routes->post('/srchPro/(:num)/(:any)/(:num)', 'Proveedores::buscarProveedor/$1/$2/$3'); //Buscar Cliente el segundo num puedeser alpha para pasar el nit que numero con caracter especial, aunque por eso es que no recoge ningun dato, pero si es num, al momento de recoger un nit con caracter especial como -, pues no lo recoge
$routes->post('/srchTra/(:num)/(:num)', 'Trabajadores::buscarTrabajador/$1/$2'); //Buscar Aliado
$routes->post('/srchAli/(:num)/(:num)/(:num)', 'Aliados::buscarAliado/$1/$2/$3'); //Buscar Aliado
$routes->post('/login', 'Usuarios::login');
$routes->get('/salir', 'Usuarios::salir');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
