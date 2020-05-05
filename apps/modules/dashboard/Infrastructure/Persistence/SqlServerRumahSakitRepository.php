<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\RumahSakit;
use KCV\Dashboard\Core\Domain\Repository\RumahSakitRepositoryInterface;

class SqlServerRumahSakitRepository implements RumahSakitRepositoryInterface 
{
    protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
    }
    
    public function getAllRumahSakit() : ?array
    {
        $sql = "SELECT * FROM RUMAH_SAKIT";

        $results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
        
        $all_rumah_sakit = [];
		if($results) {
			foreach ($results as $result) {
				$rumah_sakit = new RumahSakit(
					$result['NAMARUMAH_SAKIT'],
					$result['ALAMAT_RUMAH_SAKIT'],
					$result['ID_RUMAH_SAKIT'],
                    $result['ID_VILLAGES'],
					$result['KUOTA_RUMAH_SAKIT'],
					$result['KUOTA_TERISI'],
					$result['JUMLAH_DOKTER'],
					$result['JUMLAH_PERAWAT'],
					$result['JUMLAH_TENAGA_MEDIS_LAINNYA'],
					$result['STATUS_ANTREAN'],
				);

				array_push($all_rumah_sakit, $rumah_sakit);
			}
		}

		return $all_rumah_sakit;
    }

    public function addRumahSakit( RumahSakit $rumah_sakit )
    {
        $sql = "INSERT INTO RUMAH_SAKIT (namarumah_sakit, alamat_rumah_sakit) VALUES (:nama_rumah_sakit, :alamat_rumah_sakit)";

        $params = [
			'nama_rumah_sakit' => $rumah_sakit->getNamaRumahSakit(),
			'alamat_rumah_sakit' => $rumah_sakit->getAlamatRumahSakit()
        ];
        
        $result = $this->db->execute($sql, $params);

		return $result;
	}
	
	public function findRumahSakit($id_rumah_sakit) : ?RumahSakit
	{
		$sql = "SELECT * FROM RUMAH_SAKIT WHERE ID_RUMAH_SAKIT = :id_rumah_sakit";
		$params = [
			'id_rumah_sakit' => $id_rumah_sakit
        ];
        $result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $params);
        
		if($result) {
			$rumah_sakit = new RumahSakit(
				$result['NAMARUMAH_SAKIT'],
				$result['ALAMAT_RUMAH_SAKIT'],
				$result['ID_RUMAH_SAKIT'],
				$result['ID_VILLAGES'],
				$result['KUOTA_RUMAH_SAKIT'],
				$result['KUOTA_TERISI'],
				$result['JUMLAH_DOKTER'],
				$result['JUMLAH_PERAWAT'],
				$result['JUMLAH_TENAGA_MEDIS_LAINNYA'],
				$result['STATUS_ANTREAN']
			);
		}

		return $rumah_sakit;
	}

	public function bukaTutupAntreanRumahSakit($id_rumah_sakit, $status)
	{
		$sql = "UPDATE RUMAH_SAKIT SET STATUS_ANTREAN=:baru WHERE ID_RUMAH_SAKIT=:id_rumah_sakit";
		$params = [
			'id_rumah_sakit' => $id_rumah_sakit,
			'baru' => $status
		];

		$result = $this->db->execute($sql, $params);

		return;
	}
}