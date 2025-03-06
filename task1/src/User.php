<?php

namespace App;

/**
 * Class User
 *
 * Представляет пользователя библиотеки
 */
class User
{
    private string $name;
    private int $userID;
    /**
     * Каждый элемент массива представляет собой массив с ключами:
     * 'book' => объект Book, 'dueDate' => срок сдачи в виде UNIX timestamp
     *
     * @var array
     */
    private array $borrowedBooks = [];
    private int $penalty = 0;

    public function __construct(string $name, int $userID)
    {
        $this->name = $name;
        $this->userID = $userID;
    }

    /**
     * Возвращает идентификатор пользователя
     */
    public function getUserID(): int
    {
        return $this->userID;
    }

    /**
     * Позволяет взять книгу, если она доступна
     *
     * @param Book   $book    Объект книги
     * @param string $dueDate Дата сдачи книги в формате 'Y-m-d'
     *
     * @return bool Возвращает true, если книга успешно взята
     */
    public function borrowBook(Book $book, string $dueDate): bool
    {
        if ($book->isAvailable()) {
            $book->setAvailability(false);
            $this->borrowedBooks[] = [
                'book'    => $book,
                'dueDate' => strtotime($dueDate),
            ];

            return true;
        }

        return false;
    }

    /**
     * Возвращает книгу и начисляет штраф, если она возвращена с опозданием
     *
     * @param Book   $book       Объект книги
     * @param string $returnDate Дата возврата книги в формате 'Y-m-d'
     *
     * @return bool Возвращает true, если книга успешно возвращена
     */
    public function returnBook(Book $book, string $returnDate): bool
    {
        foreach ($this->borrowedBooks as $key => $record) {
            if ($record['book'] === $book) {
                // Удаляем книгу из списка взятых
                unset($this->borrowedBooks[$key]);

                $due = $record['dueDate'];
                $returnTimestamp = strtotime($returnDate);

                // Если книга возвращена поздно, начисляем штраф: 1 единица за каждый просроченный день
                if ($returnTimestamp > $due) {
                    $daysLate = (int) ceil(($returnTimestamp - $due) / (60 * 60 * 24));
                    $this->penalty += $daysLate;
                }
                $book->setAvailability(true);

                return true;
            }
        }

        return false;
    }

    /**
     * Возвращает текущий штраф пользователя
     */
    public function getPenalty(): int
    {
        return $this->penalty;
    }

    /**
     * Возвращает список взятых книг (без информации о сроке сдачи)
     *
     * @return array
     */
    public function getBorrowedBooks(): array
    {
        $books = [];
        foreach ($this->borrowedBooks as $record) {
            $books[] = $record['book'];
        }

        return $books;
    }
}
