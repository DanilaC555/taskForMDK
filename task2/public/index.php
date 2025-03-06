<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\User;
use App\UserService;

// Создаем массив пользователей
$users = [
    new User('Тест1', 'password1', new DateTime('2005-01-20')),
    new User('Тест2', 'password2', new DateTime('2004-02-20')),
    new User('Тест3', 'password3', new DateTime('2003-03-20')),
];

// Создаем экземпляр сервиса
$userService = new UserService();

// Сортировка по имени по возрастанию
$sortedByUsername = $userService->sortByUsername($users, 'asc');

// Сортировка по дате рождения по убыванию
$sortedByBirthday = $userService->sortByBirthday($users, 'desc');

// Вывод результатов
echo "Сортировка по имени (asc):<br>";
foreach ($sortedByUsername as $user) {
    echo $user->getUsername() . ' - ' . $user->getBirthday()->format('Y-m-d') . '<br>';
}

echo "<br>Сортировка по дате рождения (desc):<br>";
foreach ($sortedByBirthday as $user) {
    echo $user->getUsername() . ' - ' . $user->getBirthday()->format('Y-m-d') . '<br>';
}
