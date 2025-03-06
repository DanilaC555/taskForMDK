<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Book;
use App\User;
use App\Library;

// Создаем библиотеку
$library = new Library();

// Добавляем книги в библиотеку
$book1 = new Book('1', '2');
$book2 = new Book('3', '4');
$library->addBook($book1);
$library->addBook($book2);

// Регистрируем пользователя
$user = new User('Тест Тестов', 1);
$library->registerUser($user);

// Пользователь берет книгу
if ($user->borrowBook($book1, '2025-03-10')) {
    echo 'Книга взята.' . "<br>";
} else {
    echo 'Книга недоступна для взятия.' . "<br>";
}

// Позже пользователь возвращает книгу
if ($user->returnBook($book1, '2025-03-15')) {
    echo 'Книга успешно возвращена<br>';
    echo 'Начисленный штраф: ' . $user->getPenalty() . "<br>";
} else {
    echo 'Ошибка при возврате<br>';
}
