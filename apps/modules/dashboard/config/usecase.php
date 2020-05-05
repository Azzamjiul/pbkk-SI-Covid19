<?php

use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;
use Kun\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienService;
use Kun\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Kun\Dashboard\Core\Application\Service\DeletePasien\DeletePasienService;
use Kun\Dashboard\Core\Application\Service\EditCekKesehatan\EditCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\EditPasien\EditPasienService;
use Kun\Dashboard\Core\Application\Service\EditUser\EditUserService;
use Kun\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdService;
use Kun\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllAnnouncement\GetAllAnnouncementService;
use Kun\Dashboard\Core\Application\Service\GetAllCekKesehatan\GetAllCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\GetAllPasien\GetAllPasienService;
use Kun\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use Kun\Dashboard\Core\Application\Service\GetAllStatusCovid19\GetAllStatusCovid19Service;
use Kun\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use Kun\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusService;
use Kun\Dashboard\Core\Application\Service\GetCountKasusByPlace\GetCountKasusByPlaceService;
use Kun\Dashboard\Core\Application\Service\GetDistricts\GetDistrictsService;
use Kun\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use Kun\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesService;
use Kun\Dashboard\Core\Application\Service\LoginUser\LoginUserService;

//=================
//-----User Usecase
//=================
$di->set('findUserByIdService', function() use ($di) {
    return new FindUserByIdService($di->get('sqlServerUserRepository'));
});

$di->set('loginUserService', function() use ($di) {
    return new LoginUserService($di->get('sqlServerUserRepository'));
});

$di->set('addUserService', function() use ($di) {
    return new AddUserService($di->get('sqlServerUserRepository'));
});

$di->set('getAllUserService', function() use ($di) {
    return new GetAllUserService($di->get('sqlServerUserRepository'));
});

$di->set('editUserService', function() use ($di) {
    return new EditUserService($di->get('sqlServerUserRepository'));
});

//=========================
//-----Announcement Usecase
//=========================
$di->set('addAnnouncementService', function() use ($di) {
    return new AddAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

$di->set('getLastAnnouncementService', function() use ($di) {
    return new GetLastAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

$di->set('getAllAnnouncementService', function() use ($di) {
    return new GetAllAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

//===================
//-----Pasien Usecase
//===================
$di->set('addPasienService', function() use ($di) {
    return new AddPasienService($di->get('sqlServerPasienRepository'));
});

$di->set('findPasienByIdService', function() use ($di) {
    return new FindPasienByIdService($di->get('sqlServerPasienRepository'));
});

$di->set('editPasienService', function() use ($di) {
    return new EditPasienService($di->get('sqlServerPasienRepository'));
});

$di->set('getAllPasienService', function() use ($di) {
    return new GetAllPasienService($di->get('sqlServerPasienRepository'));
});

$di->set('deletePasienService', function() use ($di) {
    return new DeletePasienService($di->get('sqlServerPasienRepository'));
});

$di->set('getCountKasusService', function() use ($di) {
    return new GetCountKasusService($di->get('sqlServerPasienRepository'));
});

$di->set('getCountKasusByPlaceService', function() use ($di) {
    return new GetCountKasusByPlaceService($di->get('sqlServerPasienRepository'));
});
//==========================
//-----Cek Kesehatan Usecase
//==========================
$di->set('addCekKesehatanService', function() use ($di) {
    return new AddCekKesehatanService($di->get('sqlServerCekKesehatanRepository'));
});

$di->set('getAllCekKesehatanService', function() use ($di) {
    return new GetAllCekKesehatanService($di->get('sqlServerCekKesehatanRepository'));
});

$di->set('findCekKesehatanByIdService', function() use ($di) {
    return new FindCekKesehatanByIdService($di->get('sqlServerCekKesehatanRepository'));
});

$di->set('editCekKesehatanService', function() use ($di) {
    return new EditCekKesehatanService($di->get('sqlServerCekKesehatanRepository'));
});

//==========================
//-----StatusCovid19 Usecase
//==========================
$di->set('getAllStatusCovid19Service', function() use ($di) {
    return new GetAllStatusCovid19Service($di->get('sqlServerStatusCovid19Repository'));
});

//====================
//-----Address Usecase
//====================
$di->set('getAllProvinceService', function() use ($di) {
    return new GetAllProvinceService($di->get('sqlServerProvinceRepository'));
});

$di->set('getRegenciesService', function() use ($di) {
    return new GetRegenciesService($di->get('sqlServerRegencyRepository'));
});

$di->set('getDistrictsService', function() use ($di) {
    return new GetDistrictsService($di->get('sqlServerDistrictRepository'));
});