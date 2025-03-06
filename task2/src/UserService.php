<?php

namespace App;

/**
 * Class UserService
 *
 * Содержит методы для сортировки массива объектов User
 */
class UserService
{
    /**
     * Сортирует массив пользователей по имени
     *
     * @param User[] $users Массив объектов User
     * @param string $order Направление сортировки: 'asc' для возрастания, 'desc' для убывания.
     *
     * @return User[] Отсортированный массив пользователей
     */
    public function sortByUsername(array $users, string $order = 'asc'): array
    {
        usort(
            $users,
            function (User $a, User $b) use ($order): int {
                $result = strcmp($a->getUsername(), $b->getUsername());
                return $order === 'asc' ? $result : -$result;
            }
        );

        return $users;
    }

    /**
     * Сортирует массив пользователей по дате рождения
     *
     * @param User[] $users Массив объектов User
     * @param string $order Направление сортировки: 'asc' для возрастания, 'desc' для убывания.
     *
     * @return User[] Отсортированный массив пользователей
     */
    public function sortByBirthday(array $users, string $order = 'asc'): array
    {
        usort(
            $users,
            function (User $a, User $b) use ($order): int {
                $result = $a->getBirthday() <=> $b->getBirthday();
                return $order === 'asc' ? $result : -$result;
            }
        );

        return $users;
    }
}
