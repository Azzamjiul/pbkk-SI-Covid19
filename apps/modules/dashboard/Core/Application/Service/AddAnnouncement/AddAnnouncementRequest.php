<?php

namespace KCV\Dashboard\Core\Application\Service\AddAnnouncement;

class AddAnnouncementRequest
{
	protected string $title;

	protected string $content;

	public function __construct(string $title, string $content)
	{
		$this->title = $title;
		$this->content = $content;
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
}