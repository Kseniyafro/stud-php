<?php

namespace src\Models\Comments; // Определение пространства имен для класса Comment

use src\Models\ActiveRecordEntity; // Использование класса ActiveRecordEntity
use src\Models\Users\User; // Использование класса User
use src\Services\Db; // Использование класса Db (для работы с базой данных)
use DateTime; // Использование класса DateTime

class Comment extends ActiveRecordEntity // Класс Comment, наследуемый от ActiveRecordEntity
{
    protected $text; // Защищенное свойство для хранения текста комментария
    protected $authorId; // Защищенное свойство для хранения ID автора комментария
    protected $articleId; // Защищенное свойство для хранения ID статьи, к которой относится комментарий
    protected $createdAt; // Защищенное свойство для хранения даты и времени создания комментария

    public function getText(): string // Метод для получения текста комментария
    {
        return htmlspecialchars($this->text); // Возвращает текст комментария, преобразованный с помощью htmlspecialchars для предотвращения XSS
    }

    public function getAuthor(): User // Метод для получения автора комментария (объекта User)
    {
        return User::getById($this->authorId); // возвращение объекта User - Возвращает объект User, соответствующий authorId
    }

    public function getArticleId(): int // Метод для получения ID статьи, к которой относится комментарий
    {
        return $this->articleId; // Возвращает ID статьи
    }

    public function getCreatedAt(): string // Метод для получения даты и времени создания комментария в отформатированном виде
    {
        $date = new DateTime($this->createdAt); // Создание объекта DateTime из строки createdAt
        return $date->format('d.m.Y H:i'); // Форматирование даты и времени в формат 'день.месяц.год часы:минуты' и возвращение строки
    }

    public function setText(string $text): void // Метод для установки текста комментария
    {
        $this->text = trim($text); // обрезка пробелов в начале и конце строки - Устанавливает текст комментария, предварительно обрезав пробелы в начале и конце строки
    }

    public function setAuthorId(int $authorId): void // Метод для установки ID автора комментария
    {
        $this->authorId = $authorId; // Устанавливает ID автора
    }

    public function setArticleId(int $articleId): void // Метод для установки ID статьи, к которой относится комментарий
    {
        $this->articleId = $articleId; // Устанавливает ID статьи
    }

    public static function findAllByArticleId(int $articleId): array //тут получаем все комментарии к статье - Статический метод для поиска всех комментариев к определенной статье
    {
        $db = Db::getInstance(); // подключение к БД посредством синглтона - Получение экземпляра класса Db (реализация паттерна Singleton)
        $sql = 'SELECT * FROM '.static::getTableName().' 
                WHERE article_id = :article_id 
                ORDER BY created_at DESC'; // SQL-запрос для выбора всех комментариев к статье, отсортированных по дате создания в убывающем порядке
        $result = $db->query($sql, [':article_id' => $articleId], static::class); // тут преобразуем резульат в объект класса Comment - Выполнение SQL-запроса и получение результата. Результаты преобразуются в объекты класса Comment.
        return $result ?: []; // Возвращает массив объектов Comment или пустой массив, если комментарии не найдены
    }

    protected static function getTableName(): string // здесь мы указываем, с какой таблицей работает модель - Статический метод для получения имени таблицы, связанной с классом Comment
    {
        return 'comments'; // Возвращает имя таблицы 'comments'
    }
}
