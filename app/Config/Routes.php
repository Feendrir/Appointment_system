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


// Dokter Setting Routes
$routes->get('/dokter/profile', 'DokterController::profile', ['filter' => 'authDokter']);
$routes->get('/dokter/edit', 'DokterController::editProfile', ['filter' => 'authDokter']);
$routes->post('/dokter/updateProfile', 'DokterController::updateProfile', ['filter' => 'authDokter']);
$routes->get('/dokter/setting', 'DokterController::setting', ['filter' => 'authDokter']);
$routes->post('/dokter/setting/update', 'DokterController::updateProfile', ['filter' => 'authDokter']);


// Dokter Jadwal 
$routes->get('/dokter/jadwal', 'DokterController::jadwal', ['filter' => 'authDokter']);
$routes->get('/dokter/jadwal/create', 'DokterController::createJadwal', ['filter' => 'authDokter']);
$routes->post('/dokter/jadwal/store', 'DokterController::storeJadwal', ['filter' => 'authDokter']);
$routes->get('/dokter/jadwal/edit/(:num)', 'DokterController::editJadwal/$1', ['filter' => 'authDokter']);
$routes->post('/dokter/jadwal/update/(:num)', 'DokterController::updateJadwal/$1', ['filter' => 'authDokter']);
$routes->post('/dokter/jadwal/delete/(:num)', 'DokterController::deleteJadwal/$1', ['filter' => 'authDokter']);


$routes->group('dokter', ['filter' => 'authDokter'], function($routes) {
    $routes->get('periksa', 'DokterController::daftarPasien'); // Daftar pasien yang akan diperiksa
    $routes->get('periksa/detail/(:num)', 'DokterController::detailPasien/$1'); // Detail pasien yang akan diperiksa
    $routes->post('periksa/store', 'DokterController::storePeriksa'); // Simpan hasil pemeriksaan
});



//Daftar Poli
// $routes->get('pasien/daftar-poli', 'PasienController::daftarPoli'); // Index daftar riwayat poli
// $routes->get('pasien/daftar-poli/create', 'PasienController::createDaftarPoli'); // View tambah pendaftaran poli
// $routes->post('pasien/daftar-poli/store', 'PasienController::storeDaftarPoli'); // Simpan pendaftaran poli
// $routes->get('pasien/daftar-poli/detail/(:num)', 'PasienController::detailDaftarPoli/$1'); // Detail pendaftaran poli
// $routes->get('/pasien/daftar-poli/jadwal/(:num)', 'PasienController::getJadwalByPoli/$1');

$routes->group('pasien', ['filter' => 'authPasien'], function ($routes) {
    $routes->get('daftar-poli', 'PasienController::daftarPoli'); // Index daftar riwayat poli
    $routes->get('daftar-poli/create', 'PasienController::createDaftarPoli'); // View tambah pendaftaran poli
    $routes->post('daftar-poli/store', 'PasienController::storeDaftarPoli'); // Simpan pendaftaran poli
    $routes->get('pasien/daftar-poli/detail/(:num)', 'PasienController::detailPeriksa/$1');
});
$routes->get('pasien/daftar-poli/detail/(:num)', 'PasienController::detailPeriksa/$1', ['filter' => 'authPasien']);


// Riwayat Pasien
$routes->get('dokter/riwayat-pasien', 'DokterController::riwayatPasien', ['filter' => 'authDokter']); // Halaman index riwayat pasien
$routes->get('dokter/riwayat-pasien/detail/(:num)', 'DokterController::detailPeriksaPasien/$1', ['filter' => 'authDokter']); // Detail periksa pasien















