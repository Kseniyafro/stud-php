<?php

namespace src\Models\Users; // Объявление пространства имен для класса User

use src\Models\ActiveRecordEntity; // Использование класса ActiveRecordEntity

class User extends ActiveRecordEntity // класс User наследуется от ActiveRecordEntity - Объявление класса User, который наследует от ActiveRecordEntity
{
    protected $nickname; //эти свойства будут доступны самому классу и его детишкам - Защищенное свойство $nickname для хранения никнейма пользователя
    protected $email; // Защищенное свойство $email для хранения email пользователя
    protected $isConfirmed; // Защищенное свойство $isConfirmed для хранения статуса подтверждения пользователя
    protected $role; // Защищенное свойство $role для хранения роли пользователя
    protected $passwordHash; // Защищенное свойство $passwordHash для хранения хеша пароля пользователя
    protected $authToken; // Защищенное свойство $authToken для хранения токена аутентификации пользователя
    protected $createdAt; // Защищенное свойство $createdAt для хранения даты и времени создания пользователя

    public function setName(string $name): void // Объявление публичного метода setName, устанавливающего никнейм пользователя
    {
        $this->nickname = $name;  //свойтсву nickname присвоены значения прееменной $name - Присваивание переданного значения переменной $name свойству $nickname
    }

    public function getNickname(): string // Объявление публичного метода getNickname, возвращающего никнейм пользователя
    {
        return $this->nickname; // возвращает текущее значение nickanme - Возврат значения свойства $nickname
    }

    public function getName(): string // метод должен вернуть строку - Объявление публичного метода getName, возвращающего никнейм пользователя (дубликат getNickname)
    {
        return $this->nickname; // Возврат значения свойства $nickname
    }

    protected static function getTableName(): string // здесь мы указываем, с какой таблицей работает модель - Объявление статического метода getTableName, возвращающего имя таблицы, связанной с классом
    {
        return 'users'; // Возврат имени таблицы 'users'
    }
}
