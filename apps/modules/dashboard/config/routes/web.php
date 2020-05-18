<?php

$namespace = 'KCV\Dashboard\Presentation\Web\Controller';

/**
 * @var \Phalcon\Mvc\Router $router
 */

 //=========
//-----Auth
//=========
$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'register'
]);

$router->addPost('/register/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'registerSubmit'
]);

$router->addGet('/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'login'
]);

$router->addPost('/login/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'loginSubmit'
]);

$router->addPost('/logout/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'logout'
]);

$router->addGet('/user/:params', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'edit',
    'params'=> 1
]);

$router->addGet('/admin', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'index'
]);

$router->addPost('/admin/user/rolesubmit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'setAdmin'
]);

//=================
//-----Announcement
//=================
$router->addGet('/admin/pengumuman', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'index'
]);

$router->addGet('/admin/pengumuman/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'add'
]);

$router->addPost('/admin/pengumuman/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'addSubmit'
]);

//===========
//-----Pasien
//===========
$router->addGet('/admin/pasien', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'index'
]);

$router->addGet('/admin/pasien/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'add'
]);

$router->addGet('/admin/pasien/:params/edit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'edit',
    'params' => 1
]);

$router->addPost('/admin/pasien/:params/edit/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'editSubmit',
    'params' => 1
]);

$router->addPost('/admin/pasien/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'addSubmit'
]);

$router->addPost('/admin/pasien/delete', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'delete',
]);

//==================
//-----Cek Kesehatan
//==================
$router->addGet('/cek-kesehatan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'cekKesehatan',
    'action' => 'index'
]);

$router->addPost('/cek-kesehatan/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'cekKesehatan',
    'action' => 'addSubmit'
]);

$router->addGet('/admin/cek-kesehatan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'cekKesehatan',
    'action' => 'adminIndex'
]);

$router->addGet('/admin/cek-kesehatan/:params/edit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'cekKesehatan',
    'action' => 'edit',
    'params' => 1
]);

$router->addPost('/admin/cek-kesehatan/:params/edit/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'cekKesehatan',
    'action' => 'editSubmit',
    'params' => 1
]);

//============
//-----Address
//============
$router->addPost('/get/regency', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'address',
    'action' => 'getRegencies'
]);

$router->addPost('/get/district', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'address',
    'action' => 'getDistricts'
]);

//================
//-----Rumah Sakit
//================
$router->addGet('/admin/rumah-sakit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospital',
    'action' => 'index'
]);

$router->addGet('/admin/rumah-sakit/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospital',
    'action' => 'add'
]);

$router->addPost('/admin/rumah-sakit/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospital',
    'action' => 'addSubmit'
]);

//======================
//-----Admin Rumah Sakit
//======================
$router->addGet('/admin/admin-rumah-sakit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'hospitalAdmin'
]);

$router->addGet('/admin/admin-rumah-sakit/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'addHospitalAdmin'
]);

$router->addPost('/admin/admin-rumah-sakit/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'addHospitalAdminSubmit'
]);

$router->addGet('/rumah-sakit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'index'
]);

$router->addPost('/rumah-sakit/update-queue-status', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'updateHospitalQueueStatus'
]);

$router->addGet('/rumah-sakit/admin', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'admin'
]);

$router->addGet('/rumah-sakit/admin/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'addAdmin'
]);

$router->addPost('/rumah-sakit/admin/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'addAdminSubmit'
]);

// pasien rumah sakit

$router->addPost('/rumah-sakit/pasien/delete', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'deletePasien',
]);

$router->addGet('/rumah-sakit/pasien', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'pasien'
]);

$router->addGet('/rumah-sakit/pasien/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'addPasien'
]);

$router->addPost('/rumah-sakit/pasien/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'addPasienSubmit'
]);

$router->addGet('/rumah-sakit/pasien/:params/edit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'editPasien',
    'params' => 1
]);

$router->addPost('/rumah-sakit/pasien/:params/edit/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'editPasienSubmit',
    'params' => 1
]);

$router->addGet('/rumah-sakit/profil', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'hospitalProfile'
]);

$router->addPost('/rumah-sakit/profil/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'hospitalProfileSubmit'
]);

// Antrean
$router->addGet('/rumah-sakit/pengantre', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'hospitalAdmin',
    'action' => 'queueList'
]);


//=================
//-----Antrean User
//=================
$router->addGet('/antre', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'userQueue',
    'action' => 'index'
]);

$router->addPost('/antre/get', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'userQueue',
    'action' => 'getQueue'
]);

// return $router;