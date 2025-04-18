<?php


namespace src\Controllers; // Объявление пространства имен, чтобы избежать конфликтов имен классов.


use src\Models\Comments\Comment; // Использование класса Comment из пространства имен src\Models\Comments.
use src\View\View; // Использование класса View из пространства имен src\View.
use src\Services\Db; // Использование класса Db из пространства имен src\Services.
use src\Models\Articles\Article; // Использование класса Article из пространства имен src\Models\Articles.
use src\Models\Users\User; // Использование класса User из пространства имен src\Models\Users.
use Exception; // Использование класса Exception из глобального пространства имен.


class ArticleController { // Объявление класса ArticleController.
    private $view; // Приватное свойство для хранения объекта View.
    private $db; // Приватное свойство для хранения объекта Db.


    public function __construct() // Конструктор класса.  
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates'); // Создание объекта View, передавая путь к шаблонам.
        $this->db = Db::getInstance(); // Получение экземпляра Db (Singleton).
    }


    public function index() { // Метод для отображения главной страницы со списком статей.
        $articles = Article::findAll(); // запрос всех статей с помощью через метод findAll который реализован в ARE.php
        $this->view->renderHtml('main/main', ['articles' => $articles]); // рендерит шаблон, передавая все статьи
    }


    public function show(int $id) // тут смотрим одну статью 
    {
         $article = Article::getById($id); // Получение статьи по ID.
         if (!$article) { // Проверка, найдена ли статья.
            throw new NotFoundException(); // Если статья не найдена, выбросить исключение NotFoundException.
         }

         $comments = Comment::findAllByArticleId($id) ?? []; // Получение комментариев для статьи, если они есть, иначе пустой массив.

         $this->view->renderHtml('article/show', [ // Рендеринг шаблона 'article/show', передавая статью, автора и комментарии.
             'article' => $article, // Передача статьи.
             'author' => $article->getAuthor(), // Передача автора статьи.
             'comments' => $comments // Передача комментариев.
         ]);
     }


   public function delete(int $id) // Метод для удаления статьи.
   {
      $article = Article::getById($id); // Получение статьи по ID.
      if (!$article) { // Проверка, найдена ли статья.
         throw new NotFoundException(); // Если статья не найдена, выбросить исключение NotFoundException.
     }
     $article->delete(); // Удаление статьи с помощью метода delete() из ActiveRecordEntity.
     header("Location: http://localhost/PHP/Project/www/"); // Перенаправление на главную страницу.
 }
    

 public function create(){ // Метод для отображения формы создания статьи.
   return $this->view->renderHtml('article/create');  // Рендеринг шаблона 'article/create.php'.
}


public function edit(int $id){ // Метод для отображения формы редактирования статьи.
   $article = Article::getById($id); // Получение статьи по ID.
   return $this->view->renderHtml('/article/edit', ['article'=>$article]); // Рендеринг шаблона 'article/edit.php', передавая ID статьи.
}


public function update(int $id) // Метод для обновления существующей статьи.
{
    $article = Article::getById($id); // Получение статьи по ID.
    if (!$article) { // Проверка, найдена ли статья.
        throw new NotFoundException(); // Если статья не найдена, выбросить исключение NotFoundException.
    }
    $article->setName($_POST['name']); // Установка нового имени статьи из данных, полученных через POST-запрос.
    $article->setText($_POST['text']); // Установка нового текста статьи из данных, полученных через POST-запрос.
    $article->save(); // Сохранение изменений в базе данных с помощью метода save() из ActiveRecordEntity.
    header("Location: http://localhost/PHP/Project/www/"); // Перенаправление на главную страницу.
}

public function store() // Метод для сохранения новых статей.
{
    $article = new Article(); // Создание нового объекта Article.
    $article->setName($_POST['name']); // Установка имени статьи из данных, полученных через POST-запрос.
    $article->setText($_POST['text'] ?? ''); // Установка текста статьи из данных, полученных через POST-запрос, или пустой строки, если данные не переданы.
    $article->setAuthorId(1); // Установка ID автора статьи (захардкожено).  Нужно переделать, чтобы брать текущего авторизованного пользователя.
    $article->save(); // Вставка новой записи в базу данных (INSERT to Db).
    header("Location: http://localhost/PHP/Project/www/"); // Перенаправление на главную страницу.
}
}