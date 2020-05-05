<?php

namespace KCV\Dashboard\Core\Domain\Model;

use DateTime;

class Announcement
{
	private AnnouncementId $id;

	private string $title;

	private string $content;

	private string $timestamp;

	public function __construct(AnnouncementId $id, $title, $content, $timestamp)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->timestamp = $timestamp;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function getDateOnly()
	{
		$dt = new DateTime($this->timestamp);
		$date = $dt->format('d M Y');

		return $date;
	}
}