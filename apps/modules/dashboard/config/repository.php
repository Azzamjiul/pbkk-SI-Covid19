<?php

use Kun\Dashboard\Infrastructure\Persistence\SqlServerAnnouncementRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerCekKesehatanRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerDistrictRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerPasienRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerProvinceRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerRegencyRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerStatusCovid19Repository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerUserInfoRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerUserRepository;

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
