<?php
require dirname(__DIR__) . '/header.php'; // Подключает файл header.php, расположенный в родительском каталоге.
?>
<div class="container mt-4"> 
    <h1 class="mb-4">Список статей</h1> 
    <?php if (!empty($error)): ?> 
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div> 
        <!-- // Если $error не пуста, отображает сообщение об ошибке в div с классами "alert" и "alert-danger" (стиль Bootstrap). Функция htmlspecialchars используется для экранирования HTML-спецсимволов в строке, что предотвращает XSS-атаки. -->
    <?php endif; ?>

    <table class="table table-striped"> 
        <thead class="thead-dark"> 
            <tr> 
                <th scope="col">ID</th> 
                <th scope="col">Название</th> 
                <th scope="col">Текст</th> 
                <th scope="col">Автор</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($articles as $article): ?> 
               <!-- // Цикл foreach перебирает массив $articles. -->
                <tr> 
                    <th scope="row"><?= htmlspecialchars($article->getId()) ?></th> 
                    <!-- // Ячейка тела таблицы с ID статьи. Атрибут scope="row" указывает, что это заголовок строки. -->
                    <td> 
                        <a href="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $article->getId()) ?>"> 
                           <!-- // Ссылка на страницу просмотра статьи. dirname($_SERVER['SCRIPT_NAME']) возвращает путь к текущему скрипту. -->
                            <?= htmlspecialchars($article->getName()) ?> 
                            <!-- // Название статьи. -->
                        </a> 
                    </td> 
                    <td><?= htmlspecialchars(mb_strimwidth($article->getText(), 0, 100, '...')) ?></td> 
                    <!-- // Ячейка тела таблицы для текста статьи. Функция mb_strimwidth обрезает строку до заданной длины (100 символов) и добавляет "..." в конце. -->
                    <td> 
                        <?php if ($article->getAuthor()): ?> 
                           <!-- // Проверяет, существует ли автор статьи. -->
                            <?= htmlspecialchars($article->getAuthor()->getNickname()) ?> 
                            <!-- // Если автор существует, выводит его никнейм. -->
                        <?php else: ?> 
                           <!-- // Если автор не существует. -->
                            <span class="text-muted">Неизвестен</span> 
                            <!-- // Выводит текст "Неизвестен" серым цветом. -->
                        <?php endif; ?> 
                    </td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 

    <?php if (empty($articles)): ?> 
      <!-- // Проверяет, пуст ли массив $articles. -->
        <div class="alert alert-info">Статьи не найдены</div> 
        <!-- // Если массив пуст, отображает сообщение "Статьи не найдены" в div с классами "alert" и "alert-info" (стиль Bootstrap). -->
    <?php endif; ?> 
</div> 
<?php
require dirname(__DIR__) . '/footer.php'; // Подключает файл footer.php, расположенный в родительском каталоге.
?>
