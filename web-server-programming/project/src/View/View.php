<?php

namespace src\View; // Объявление пространства имен для класса View

class View{ // Объявление класса View
    private $templatesPath; // Приватное свойство $templatesPath для хранения пути к шаблонам

    public function __construct(string $templatesPath) // конструктор класса, который принимает абсолютный путь к папке с шаблонами и сохраняет путь в свойство $templatesPath - Конструктор класса View, принимающий путь к папке с шаблонами
    {
        $this->templatesPath = $templatesPath; // Сохранение пути к шаблонам в свойство $templatesPath
    }

    public function renderHtml(string $templateName, $vars=[], $code=200) // vars - массив с переменными шаблона - Метод для рендеринга HTML-шаблона
    {
        http_response_code($code); // установка кода ответа - Установка HTTP-кода ответа
        extract($vars); // преобразует массив в переменные - Преобразование массива переменных в локальные переменные
        include $this->templatesPath.'/'.$templateName.'.php'; // подключение файла шаблона - Подключение файла шаблона
    }

    public function renderHtml2(string $templateName, $vars=[]) // Метод для рендеринга HTML-шаблона (без установки кода ответа)
    {
        extract($vars); // Преобразование массива переменных в локальные переменные
        include $this->templatesPath.'/'.$templateName; // Подключение файла шаблона
    }

    public function renderHtml3(string $templateName, $vars=[], $code=200) //для редактирвания комментария в edit вызывается - Метод для рендеринга HTML-шаблона (используется, например, для редактирования комментария)
    {
        http_response_code($code); // установка кода овтета - Установка HTTP-кода ответа
        extract($vars); // импорт переменных из массива в тек таблицу - Преобразование массива переменных в локальные переменные
        include $this->templatesPath.'/'.$templateName; // подключения файла шаблона - Подключение файла шаблона
    }
}
