<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
/* Rutas */
/* Autenticacion */
$routes->post('login', 'Home::login');
$routes->post('pass', 'Home::verypass');
$routes->get('contacto', 'Home::contacto');
$routes->get('salir', 'Home::salir');
/* Panel de control */
$routes->get('dash', 'Dash::index');
/* Departamentos */
$routes->get('dpto', 'Departamento::index');
/* Responsables */
$routes->get('resp', 'Responsable::index');
$routes->post('dpto_plus', 'Responsable::dpto_plus');
$routes->post('deldpto', 'Responsable::deldpto');
$routes->post('resp_plus', 'Responsable::resp_plus');
$routes->post('delresp', 'Responsable::delresp');

/* TICs */
/* Unidad central */
$routes->get('cpu', 'CPU::index');
$routes->post('reg_cpu', 'CPU::reg_cpu');
$routes->post('del_cpu', 'CPU::del_cpu');
/* Motherboard */
$routes->get('placa', 'CPU::placa');
$routes->post('reg_placa', 'CPU::reg_placa');
$routes->post('del_placa', 'CPU::del_placa');
$routes->post('upplaca', 'CPU::upplaca');
/* Microprocesador */
$routes->get('micro', 'CPU::micro');
$routes->post('reg_micro', 'CPU::reg_micro');
$routes->post('del_micro', 'CPU::del_micro');
$routes->post('up_micro', 'CPU::up_micro');
/* Memoria RAM */
$routes->get('mram', 'CPU::mram');
$routes->post('reg_ram', 'CPU::reg_ram');
$routes->post('del_ram', 'CPU::del_ram');
$routes->post('up_ram', 'CPU::up_ram');
/* Fuente interna */
$routes->get('fuente', 'CPU::fuente');
$routes->post('reg_fuente', 'CPU::reg_fuente');
$routes->post('del_fuente', 'CPU::del_fuente');
$routes->post('up_fuente', 'CPU::up_fuente');
/* Disco duro */
$routes->get('disco', 'CPU::disco');
$routes->post('reg_disco', 'CPU::reg_disco');
$routes->post('del_disco', 'CPU::del_disco');
$routes->post('up_disco', 'CPU::up_disco');
/* CD-DVD */
$routes->get('cd', 'CPU::cd');
$routes->post('reg_cd', 'CPU::reg_cd');
$routes->post('del_cd', 'CPU::del_cd');
$routes->post('up_cd', 'CPU::up_cd');
/* Teclado */
$routes->get('teclado', 'CPU::teclado');
$routes->post('reg_teclado', 'CPU::reg_teclado');
$routes->post('del_teclado', 'CPU::del_teclado');
$routes->post('up_teclado', 'CPU::up_teclado');
/* Mouses */
$routes->get('mouse', 'CPU::mouse');
$routes->post('reg_mouse', 'CPU::reg_mouse');
$routes->post('del_mouse', 'CPU::del_mouse');
$routes->post('up_mouse', 'CPU::up_mouse');
/* Bocinas */
$routes->get('bocina', 'CPU::bocina');
$routes->post('reg_bocina', 'CPU::reg_bocina');
$routes->post('del_bocina', 'CPU::del_bocina');
$routes->post('up_bocina', 'CPU::up_bocina');
/* UPS */
$routes->get('ups', 'CPU::ups');
$routes->post('reg_ups', 'CPU::reg_ups');
$routes->post('del_ups', 'CPU::del_ups');
$routes->post('up_ups', 'CPU::up_ups');
/* Monitores */
$routes->get('monitor', 'CPU::monitor');
$routes->post('reg_monitor', 'CPU::reg_monitor');
$routes->post('del_monitor', 'CPU::del_monitor');
$routes->post('up_monitor', 'CPU::up_monitor');

/* Dispositivos de RED */
/* Impresoras */
$routes->get('printer', 'RED::index');
$routes->post('reg_printer', 'RED::reg_printer');
$routes->post('del_printer', 'RED::del_printer');
$routes->post('up_printer', 'RED::up_printer');
/* Modems */
$routes->get('modem', 'RED::modem');
$routes->post('reg_modem', 'RED::reg_modem');
$routes->post('del_modem', 'RED::del_modem');
$routes->post('up_modem', 'RED::up_modem');
/* Routers */
$routes->get('router', 'RED::router');
$routes->post('reg_router', 'RED::reg_router');
$routes->post('del_router', 'RED::del_router');
$routes->post('up_router', 'RED::up_router');
/* Switch */
$routes->get('switch', 'RED::swit_ch');
$routes->post('reg_switch', 'RED::reg_swit_ch');
$routes->post('del_switch', 'RED::del_swit_ch');
$routes->post('up_switch', 'RED::up_swit_ch');
/* Telefonos */
$routes->get('telefono', 'RED::telefono');
$routes->post('reg_telefono', 'RED::reg_telefono');
$routes->post('del_telefono', 'RED::del_telefono');
$routes->post('up_telefono', 'RED::up_telefono');

/* Seguridad Informatica */
/* Sofwares Auth */
$routes->get('soft', 'SI::index');
$routes->post('reg_soft', 'SI::reg_soft');
$routes->post('del_soft', 'SI::del_soft');
/* Virus */
$routes->get('virus', 'SI::virus');
$routes->post('reg_virus', 'SI::reg_virus');
$routes->post('del_virus', 'SI::del_virus');
/* Inspecciones */
$routes->get('inspeccion', 'SI::inspeccion');
$routes->post('reg_inspeccion', 'SI::reg_inspeccion');
$routes->post('del_inspeccion', 'SI::del_inspeccion');
/* Incidencias */
$routes->get('incidencia', 'SI::incidencia');
$routes->post('reg_incidencia', 'SI::reg_incidencia');
$routes->post('del_incidencia', 'SI::del_incidencia');
$routes->post('up_incidencia', 'SI::up_incidencia');
/* Mantenimiento */
$routes->get('mantenimiento', 'SI::mantenimiento');
$routes->post('reg_mantenimiento', 'SI::reg_mantenimiento');
$routes->post('del_mantenimiento', 'SI::del_mantenimiento');
/* Movimientos */
$routes->get('movimiento', 'SI::movimiento');
$routes->post('reg_movimiento', 'SI::reg_movimiento');
$routes->post('del_movimiento', 'SI::del_movimiento');
/* Roturas */
$routes->get('rotura', 'SI::rotura');
$routes->post('reg_rotura', 'SI::reg_rotura');
$routes->post('del_rotura', 'SI::del_rotura');
$routes->post('rot_upfecha', 'SI::rot_upfecha');
/* Salvas */
$routes->get('salva', 'SI::salva');
$routes->post('reg_salva', 'SI::reg_salva');
$routes->post('del_salva', 'SI::del_salva');

/* Generador de los Exp. Tecnicos */
//$routes->get('reporte/(:num)', 'Dash::reporte/$1');
$routes->post('reporte', 'Dash::report');
$routes->post('exp_red', 'Dash::exp_red');
$routes->post('informSI', 'Dash::informSI');