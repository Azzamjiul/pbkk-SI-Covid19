<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\RumahSakit;

interface RumahSakitRepositoryInterface 
{
    public function getAllRumahSakit() : ?array;

    public function addRumahSakit( RumahSakit $rumah_sakit );

    public function findRumahSakit( $id_rumah_sakit ) : ?RumahSakit;

    public function bukaTutupAntreanRumahSakit($id_rumah_sakit, $status);
}