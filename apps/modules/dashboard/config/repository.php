<?php

use KCV\Dashboard\Infrastructure\Persistence\SqlServerAnnouncementRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerCekKesehatanRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerDistrictRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerPasienRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerProvinceRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerRegencyRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerStatusCovid19Repository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerUserInfoRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerUserRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerHospitalRepository;
use KCV\Dashboard\Infrastructure\Persistence\SqlServerQueueRepository;

$di->set('sqlServerQueueRepository', function() use ($di) {
    return new SqlServerQueueRepository($di->get('db'));
});

$di->set('sqlServerHospitalRepository', function() use ($di) {
    return new SqlServerHospitalRepository($di->get('db'));
});

$di->set('sqlServerUserRepository', function() use ($di) {
    return new SqlServerUserRepository($di->get('db'));
});

$di->set('sqlServerUserInfoRepository', function() use ($di) {
    return new SqlServerUserInfoRepository($di->get('db'));
});

$di->set('sqlServerAnnouncementRepository', function() use ($di) {
    return new SqlServerAnnouncementRepository($di->get('db'));
});

$di->set('sqlServerPasienRepository', function() use ($di) {
    return new SqlServerPasienRepository($di->get('db'));
});

$di->set('sqlServerProvinceRepository', function() use ($di) {
    return new SqlServerProvinceRepository($di->get('db'));
});

$di->set('sqlServerRegencyRepository', function() use ($di) {
    return new SqlServerRegencyRepository($di->get('db'));
});

$di->set('sqlServerDistrictRepository', function() use ($di) {
    return new SqlServerDistrictRepository($di->get('db'));
});

$di->set('sqlServerStatusCovid19Repository', function() use ($di) {
    return new SqlServerStatusCovid19Repository($di->get('db'));
});

$di->set('sqlServerCekKesehatanRepository', function() use ($di) {
    return new SqlServerCekKesehatanRepository($di->get('db'));
});
