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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


//Home
$routes->get('/', 'Home::index');
$routes->get('/cadastrar', 'Home::registrar');
$routes->get('/esqueci', 'Home::forgot');
$routes->get('/rastreio', 'Home::rastreio');
$routes->get('/enter', 'Home::enter');
$routes->get('/entregadorl', 'Home::entregador');
$routes->get('/cliente', 'Home::cliente');




//home post
$routes->post('/cadastrar', 'Home::cadastro');
$routes->post('/login', 'Home::login');
$routes->post('/esqueci', 'Home::forgot');
$routes->post('/rastreio', 'Home::rastreio');
$routes->post('/enter', 'Home::enter');




//Cliente
$routes->get('/pedidos', 'Cliente::pedidos');
$routes->get('/dados', 'Cliente::config');
$routes->get('/clean', 'Cliente::clean');
$routes->get('/sac', 'Cliente::sac');
$routes->get('/(:any)/activate', 'Cliente::activate/$1');
$routes->get('/(:any)/forgot', 'Cliente::forgot/$1');
$routes->get('/pedidos/pdf/(:any)', 'Cliente::pedf/$1');
$routes->get('/painel/dados/(:any)/(:any)/(:any)', 'Cliente::doc/$1/$2/$3');

//Cliente post
$routes->post('/post', 'Cliente::post');
$routes->post('/post/delete', 'Cliente::delete');
$routes->post('/(:any)/forgot', 'Cliente::forgot/$1');
$routes->post('/sac', 'Cliente::sac');
$routes->post('/dados', 'Cliente::config');
$routes->post('/pedidos/finalizados', 'Cliente::finalizados');
$routes->post('/upload/process', 'Cliente::massa');







//Base
$routes->get('/central/painel', 'Base::painel');
$routes->post('/central/painel', 'Base::painel');
$routes->get('/central/painel/edit', 'Base::edit');
$routes->post('/central/painel/edit', 'Base::edit');
$routes->get('/central/painel/edite', 'Base::edite');
$routes->post('/central/painel/edite', 'Base::edite');
$routes->post('/central/painel/cli', 'Base::clientes');
$routes->post('/central/painel/contrato', 'Base::contrato');
$routes->post('/central/painel/user/delete', 'Base::delete');



$routes->get('central/setores/(:num)', 'Base::setores/$1');
$routes->get('/central/painel/cnh/(:any)', 'Base::cnh/$1');
$routes->post('/central/painel/sac', 'Base::chat');
$routes->get('/central/painel/sac/(:any)', 'Base::mchat/$1');
$routes->post('/central/painel/sac/(:any)', 'Base::mchat/$1');
$routes->post('/central/painel/setor/set', 'Base::setor');
$routes->post('/central/painel/list', 'Base::list');
$routes->post('/central/painel/confirmentregador', 'Base::confirm');
$routes->post('/central/painel/documentos', 'Base::doc');
$routes->get('/central/dados/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)', 'Base::pdf/$1/$2/$3/$4/$5/$6/$7/$8');





//Entregador
$routes->get('/entregador', 'Entregador::entregador');
$routes->post('/list', 'Entregador::list');
$routes->post('/entregador/ocorrencia', 'Entregador::ocorrencia');
$routes->post('/entregador/base', 'Entregador::baseset');



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
