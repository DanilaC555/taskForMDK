<?php

namespace App;

/**
 * Class Book
 *
 * Представляет книгу в библиотеке
 */
class Book
{
    private string $title;
    private string $author;
    private bool $isAvailable;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = true;
    }

    /**
     * Возвращает название книги
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Возвращает автора книги
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Возвращает доступность книги
     */
    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    /**
     * Устанавливает доступность книги
     */
    public function setAvailability(bool $status): void
    {
        $this->isAvailable = $status;
    }
}
