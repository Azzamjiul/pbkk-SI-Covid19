<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Hospital;

interface HospitalRepositoryInterface 
{
    public function getAllHospital() : ?array;

    public function addHospital( Hospital $hospital );

    public function findHospital( $id ) : ?Hospital;

    public function updateHospitalQueueStatus($hospitalId, $newStatus);

    public function editHospital( Hospital $hospital);
}