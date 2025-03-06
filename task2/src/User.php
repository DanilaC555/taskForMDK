<?php

namespace App;

use DateTime;

/**
 * Class User
 *
 * Представляет пользователя с полями username, password и birthday
 */
class User
{
    private string $username;
    private string $password;
    private DateTime $birthday;

    public function __construct(string $username, string $password, DateTime $birthday)
    {
        $this->username = $username;
        $this->password = $password;
        $this->birthday = $birthday;
    }

    /**
     * Возвращает имя пользователя
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Возвращает пароль пользователя
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Возвращает дату рождения пользователя
     */
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }
}
