<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Hospital;

interface HospitalRepositoryInterface 
{
    public function getAllHospital() : ?array;

    // public function addHospital( Hospital $rumah_sakit );

    // public function findHospital( $id_rumah_sakit ) : ?Hospital;

    // public function bukaTutupAntreanHospital($id_rumah_sakit, $status);
}