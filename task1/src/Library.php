<?php

namespace App;

/**
 * Class Library
 *
 * Представляет систему библиотеки
 */
class Library
{
    /**
     * @var Book[]
     */
    private array $books = [];

    /**
     * @var User[]
     */
    private array $users = [];

    /**
     * Добавляет книгу в библиотеку
     *
     * @param Book $book Объект книги
     */
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    /**
     * Регистрирует нового пользователя
     *
     * @param User $user Объект пользователя
     */
    public function registerUser(User $user): void
    {
        $this->users[] = $user;
    }

    /**
     * Ищет книгу по названию
     *
     * @param string $title Название книги
     *
     * @return Book|null Возвращает объект книги, если найден, иначе null
     */
    public function findBookByTitle(string $title): ?Book
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }

        return null;
    }

    /**
     * Ищет пользователя по идентификатору
     *
     * @param int $userID Идентификатор пользователя
     *
     * @return User|null Возвращает объект пользователя, если найден, иначе null
     */
    public function findUserById(int $userID): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getUserID() === $userID) {
                return $user;
            }
        }

        return null;
    }
}
