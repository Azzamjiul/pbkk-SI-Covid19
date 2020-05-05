<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Antrean;
use KCV\Dashboard\Core\Domain\Repository\AntreanRepositoryInterface;

class SqlServerAntreanRepository implements AntreanRepositoryInterface 
{
    /**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

    public function addAntrean(Antrean $antrean){
        $sql = "INSERT INTO ANTREAN (TANGGAL_ANTREAN, ID_AKUN, ID_RUMAH_SAKIT, STATUS) VALUES(:tanggal, :id_akun, :id_rumah_sakit, :status)";
		$params = [
			'tanggal' => date("Y-m-d H:i:s"),
			'id_akun' => $antrean->getIdAkunAntrean(),
			'id_rumah_sakit' => $antrean->getIdRumahSakitAntrean(),
			'status' => $antrean->getStatusAntrean(),
		];

        $result = $this->db->execute($sql, $params);

		return $result;
    }
}