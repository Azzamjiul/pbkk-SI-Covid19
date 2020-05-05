<?php

namespace KCV\Dashboard\Core\Application\Service\GetCountKasus;

use KCV\Dashboard\Core\Domain\Model\Kasus;

class GetCountKasusResponse
{
	/**
	 * @var array
	 */
	protected $kasus;

	public function __construct($kasus)
	{
		$this->kasus = $kasus;
	}

	public function getKasus()
	{
		return $this->kasus;
	}

	public function getAllKasusByNama()
	{
		$result = [];
		/**
		 * @var Kasus $kasus
		 */
		foreach($this->kasus as $kasus) {
			if(!isset($result[$kasus->getNama()])) {
				$result[$kasus->getNama()] = $kasus->getJumlah();
			}
			else {
				$result[$kasus->getNama()] = $result[$kasus->getNama()] + $kasus->getJumlah();
			}
		}

		return $result;
	}

	public function getAllKasusPositif()
	{
		$result = [];
		
		$dates = $this->prevTwoMonth();

		foreach ($dates as $date) {
			if(!isset($result[$date])) {
				$result[$date] = 0;
			}
		}

		/**
		 * @var Kasus $kasus
		 */
		foreach($this->kasus as $kasus) {
			if($kasus->getNama() == 'Positif') {
				if(!isset($result[$kasus->getDateOnly()])) {

				}
				else {
					$result[$kasus->getDateOnly()] = $result[$kasus->getDateOnly()] + $kasus->getJumlah();
				}
			}
		}

		return $result;
	}

	private function prevTwoMonth()
	{
		$now = new \DateTime();
		$now = $now->format('d-M');
		$dt = new \DateTime();
		$dt->modify('-3 month');
		$compareDate = $dt->format('d-M');

		$dates = [];
		while($compareDate != $now) {
			array_push($dates, $compareDate);
			$dt->modify('+1 day');

			$compareDate = $dt->format('d-M');
		}

		array_push($dates, $compareDate);

		return $dates;
	}
}