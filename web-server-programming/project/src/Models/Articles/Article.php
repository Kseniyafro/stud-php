<?php
namespace src\Models\Articles; // Объявление пространства имен для класса Article

use src\Models\ActiveRecordEntity; // Использование трейта ActiveRecordEntity для реализации паттерна ActiveRecord
use src\Models\Users\User; // Использование класса User из пространства имен src\Models\Users

class Article extends ActiveRecordEntity // Объявление класса Article, который наследует от ActiveRecordEntity
{
    protected $name; // Защищенное свойство $name для хранения названия статьи
    protected $text; // Защищенное свойство $text для хранения текста статьи
    protected $author_id; // Защищенное свойство $author_id для хранения идентификатора автора статьи


    public function getName(): string // Объявление публичного метода getName, возвращающего название статьи
    {
        return $this->name; // Возврат значения свойства $name
    }

    public function getText(): string // Объявление публичного метода getText, возвращающего текст статьи
    {
        return $this->text; // Возврат значения свойства $text
    }

    public function getAuthorId(): int // Объявление публичного метода getAuthorId, возвращающего идентификатор автора статьи
    {
        return $this->author_id; // Возврат значения свойства $author_id
    }
    
    public function getAuthor(): ?User // Объявление публичного метода getAuthor, возвращающего объект User, связанный со статьей или null
    {
        if (!$this->author_id) { // Проверка, установлен ли идентификатор автора
            return null; // Если идентификатор автора не установлен, возвращается null
        }
        return User::getById($this->author_id); // Тут загружаем объект User через User::getById() - Возвращает объект User, полученный по идентификатору автора
    }
    
   
    public function setName(string $name): void // Объявление публичного метода setName, устанавливающего название статьи
    {
        $this->name = $name; // Присваивание переданного значения свойству $name
    }

    public function setText(string $text): void // Объявление публичного метода setText, устанавливающего текст статьи
    {
        $this->text = $text; // Присваивание переданного значения свойству $text
    }

    public function setAuthorId(int $authorId): void // Объявление публичного метода setAuthorId, устанавливающего идентификатор автора статьи
    {
        $this->author_id = $authorId; // Присваивание переданного значения свойству $author_id
    }

    public static function getTableName(): string // Объявление статического метода getTableName, возвращающего название таблицы, связанной с моделью
    {
        return 'articles'; // здесь мы указываем, с какой таблицей работает модель - Возврат названия таблицы 'articles'
    }
}
