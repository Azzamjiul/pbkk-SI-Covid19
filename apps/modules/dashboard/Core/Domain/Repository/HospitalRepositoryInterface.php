<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Hospital;

interface HospitalRepositoryInterface 
{
    public function getAllHospital() : ?array;

    public function addHospital( Hospital $hospital );

    public function findHospital( $id ) : ?Hospital;

    // public function bukaTutupAntreanHospital($id_rumah_sakit, $status);
}