<?php
namespace App\Models;

use Carbon\Carbon;

class Article
{
    private string $title;
    private string $description;
    private Carbon $publicationDate;

    public function __construct(string $title, string $description, Carbon $publicationDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->publicationDate = $publicationDate;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPublicationDate(): Carbon
    {
        return $this->publicationDate;
    }
}
