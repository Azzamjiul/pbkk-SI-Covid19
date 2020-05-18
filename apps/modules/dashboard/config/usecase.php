<?php

use KCV\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;
use KCV\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanService;
use KCV\Dashboard\Core\Application\Service\AddPasien\AddPasienService;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use KCV\Dashboard\Core\Application\Service\DeletePasien\DeletePasienService;
use KCV\Dashboard\Core\Application\Service\EditCekKesehatan\EditCekKesehatanService;
use KCV\Dashboard\Core\Application\Service\EditPasien\EditPasienService;
use KCV\Dashboard\Core\Application\Service\EditUser\EditUserService;
use KCV\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdService;
use KCV\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdService;
use KCV\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllAnnouncement\GetAllAnnouncementService;
use KCV\Dashboard\Core\Application\Service\GetAllCekKesehatan\GetAllCekKesehatanService;
use KCV\Dashboard\Core\Application\Service\GetAllPasien\GetAllPasienService;
use KCV\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use KCV\Dashboard\Core\Application\Service\GetAllStatusCovid19\GetAllStatusCovid19Service;
use KCV\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use KCV\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusService;
use KCV\Dashboard\Core\Application\Service\GetCountKasusByPlace\GetCountKasusByPlaceService;
use KCV\Dashboard\Core\Application\Service\GetDistricts\GetDistrictsService;
use KCV\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use KCV\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesService;
use KCV\Dashboard\Core\Application\Service\LoginUser\LoginUserService;

use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;
use KCV\Dashboard\Core\Application\Service\AddHospital\AddHospitalService;
use KCV\Dashboard\Core\Application\Service\AddPoster\AddPosterService;
use KCV\Dashboard\Core\Application\Service\FindHospital\FindHospitalService;
use KCV\Dashboard\Core\Application\Service\UpdateHospitalQueueStatus\UpdateHospitalQueueStatusService;
use KCV\Dashboard\Core\Application\Service\EditHospital\EditHospitalService;

use KCV\Dashboard\Core\Application\Service\AddQueue\AddQueueService;
use KCV\Dashboard\Core\Application\Service\EditPoster\EditPosterService;
use KCV\Dashboard\Core\Application\Service\FindPosterById\FindPosterByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllPoster\GetAllPosterService;
use KCV\Dashboard\Core\Application\Service\GetAllQueue\GetAllQueueService;
use KCV\Dashboard\Core\Application\Service\GetNumberQueue\GetNumberQueueService;
use KCV\Dashboard\Core\Application\Service\GetNumberUserQueue\GetNumberUserQueueService;

//==================
//-----Queue Usecase
//==================
$di->set('addQueueService', function() use ($di) {
    return new AddQueueService($di->get('sqlServerQueueRepository'));
});

$di->set('getAllQueueService', function() use ($di) {
    return new GetAllQueueService($di->get('sqlServerQueueRepository'));
});

$di->set('getNumberQueueService', function() use ($di) {
    return new GetNumberQueueService($di->get('sqlServerQueueRepository'));
});

$di->set('getNumberUserQueueService', function() use ($di) {
    return new GetNumberUserQueueService($di->get('sqlServerQueueRepository'));
});

//=====================
//-----Hospital Usecase
//=====================
$di->set('getAllHospitalService', function() use ($di) {
    return new GetAllHospitalService($di->get('sqlServerHospitalRepository'));
});

$di->set('addHospitalService', function() use ($di) {
    return new AddHospitalService($di->get('sqlServerHospitalRepository'));
});

$di->set('findHospitalService', function() use ($di) {
    return new FindHospitalService($di->get('sqlServerHospitalRepository'));
});

$di->set('updateHospitalQueueStatusService', function() use ($di) {
    return new UpdateHospitalQueueStatusService($di->get('sqlServerHospitalRepository'));
});

$di->set('editHospitalService', function() use ($di) {
    return new EditHospitalService($di->get('sqlServerHospitalRepository'));
});

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

//===================
//-----Poster Usecase
//===================
$di->set('addPosterService', function() use ($di) {
    return new AddPosterService($di->get('sqlServerPosterRepository'));
});

$di->set('editPosterService', function() use ($di) {
    return new EditPosterService($di->get('sqlServerPosterRepository'));
});

$di->set('getAllPosterService', function() use ($di) {
    return new GetAllPosterService($di->get('sqlServerPosterRepository'));
});

$di->set('findPosterByIdService', function() use ($di) {
    return new FindPosterByIdService($di->get('sqlServerPosterRepository'));
});