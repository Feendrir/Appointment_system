<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman login utama untuk pasien/dokter
$routes->get('/', 'Home::index'); 
$routes->post('/doctor/login', 'Home::loginDoctor');
$routes->get('/dashboard-dokter', 'Home::dashboardDokter');
$routes->post('/patient/login', 'Home::loginPatient');
$routes->get('/dashboard-pasien', 'Home::dashboardPasien');
$routes->get('/patient/register', 'Home::registerPage');
$routes->post('/patient/register', 'Home::registerPatient');

// Halaman login dan dashboard admin
$routes->get('/admin', 'Home::loginAdminPage'); 
$routes->post('/admin/login', 'Home::loginAdmin'); 
$routes->get('/dashboard', 'Home::dashboard'); 

// Logout untuk semua user
$routes->get('/logout', 'Home::logout');

// Dashboard Dokter
$routes->get('/dashboard/doctor', 'Home::doctorDashboard');

// Dashboard Pasien
$routes->get('/dashboard/patient', 'Home::patientDashboard');

// Kelola Obat
$routes->get('/obat', 'ObatController::index'); 
$routes->get('/obat/create', 'ObatController::create'); 
$routes->post('/obat/store', 'ObatController::store');
$routes->get('/obat/edit/(:num)', 'ObatController::edit/$1'); 
$routes->post('/obat/update/(:num)', 'ObatController::update/$1'); 
$routes->post('/obat/delete/(:num)', 'ObatController::delete/$1'); 
// Kelola Poli
$routes->get('/poli', 'PoliController::index');
$routes->get('/poli/create', 'PoliController::create'); 
$routes->post('/poli/store', 'PoliController::store'); 
$routes->get('/poli/edit/(:num)', 'PoliController::edit/$1'); 
$routes->post('/poli/update/(:num)', 'PoliController::update/$1'); 
$routes->post('/poli/delete/(:num)', 'PoliController::delete/$1'); 

// Kelola Dokter
$routes->get('/dokter', 'DokterController::index'); 
$routes->get('/dokter/create', 'DokterController::create'); 
$routes->post('/dokter/store', 'DokterController::store'); 
$routes->get('/dokter/edit/(:num)', 'DokterController::edit/$1'); 
$routes->post('/dokter/update/(:num)', 'DokterController::update/$1');
$routes->post('/dokter/delete/(:num)', 'DokterController::delete/$1'); 

// Kelola Pasien
$routes->get('/pasien', 'PasienController::index'); 
$routes->get('/pasien/create', 'PasienController::create');
$routes->post('/pasien/store', 'PasienController::store'); 
$routes->get('/pasien/edit/(:num)', 'PasienController::edit/$1'); 
$routes->post('/pasien/update/(:num)', 'PasienController::update/$1');
$routes->post('/pasien/delete/(:num)', 'PasienController::delete/$1');
