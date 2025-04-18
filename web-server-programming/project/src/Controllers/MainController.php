<?php

namespace src\Controllers; // Объявление пространства имен, чтобы избежать конфликтов имен классов.
use src\View\View; // Использование класса View из пространства имен src\View.

class MainController { // Объявление класса MainController.
    private $view; // Приватное свойство для хранения объекта View.
    
    public function __construct(){ // Конструктор класса.
        $this->view = new View(dirname(dirname(__DIR__)).'/templates'); // Создание объекта View, передавая путь к шаблонам.
    }
    
    public function sayHello(string $name){ // Метод для отображения приветствия.
        $this->view->renderHtml('main/hello', ['name' => $name]); // Рендеринг шаблона 'main/hello', передавая имя.
    }

    public function sayBye(string $name){ // Метод для отображения прощания.
        $this->view->renderHtml('main/bye', ['name' => $name]); // Рендеринг шаблона 'main/bye', передавая имя.
    }
}