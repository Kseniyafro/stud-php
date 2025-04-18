<?php
$title = 'Create Article'; // Установка значения переменной $title, которая, вероятно, используется для заголовка страницы
require dirname(__DIR__).'/header.php'; // Подключение файла header.php, расположенного на один уровень выше в структуре директорий
?>

<div class="container"> 
    <h1>Create new article</h1> 
    
    <?php if (!empty($error)): ?> 
      <!-- // Проверка, не пуста ли переменная $error -->
        <div class="alert alert-danger"><?= $error ?></div> 
        <!-- // Если $error не пуста, отображение сообщения об ошибке в div с классами "alert" и "alert-danger" (вероятно, для использования с Bootstrap) -->
    <?php endif; ?>
    
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article" method="POST"> 
      <!-- // Открывающий тег формы. Атрибут "action" указывает URL, на который будут отправлены данные формы, а атрибут "method" указывает метод отправки (POST) -->
        <div class="mb-3"> 
            <label for="name" class="form-label">Title</label> 
            <input type="text" class="form-control" id="name" name="name" required> 
            <!-- // Поле ввода для названия статьи. Атрибут "type" указывает тип поля (текст), "class" добавляет Bootstrap-классы для стилизации, "id" связывает поле с label, "name" указывает имя поля для отправки данных, "required" делает поле обязательным для заполнения -->
        </div> 
        <div class="mb-3"> 
            <label for="text" class="form-label">Text</label> 
            <textarea class="form-control" id="text" name="text" rows="5" required></textarea> 
            <!-- // Многострочное поле ввода (textarea) для текста статьи. "rows" указывает количество строк, видимых по умолчанию. -->
        </div> 
        <button type="submit" class="btn btn-primary">Save</button> 
        <!-- // Кнопка отправки формы. "type" указывает тип кнопки (отправка формы), "class" добавляет Bootstrap-классы для стилизации -->
    </form> 
    <!-- // Закрывающий тег формы -->
</div> 
<!-- // Закрывающий тег div -->

<!-- <?php require dirname(__DIR__).'/footer.php'; ?> // Подключение файла footer.php, расположенного на один уровень выше в структуре директорий -->