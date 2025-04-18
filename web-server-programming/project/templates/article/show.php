
<?php
$title = htmlspecialchars($article->getName()); // Устанавливает заголовок страницы, экранируя название статьи для безопасности
$comments = $comments ?? []; // Инициализирует переменную $comments пустым массивом, если она не определена
require dirname(__DIR__) . '/header.php'; // Подключает файл header.php, находящийся в родительской директории
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"><?= htmlspecialchars($article->getName()) ?></h1>
            
            <div class="card-subtitle mb-3 text-muted">
                <?php if ($article->getAuthor() && method_exists($article->getAuthor(), 'getNickName')): ?> 
                  <!-- // Проверяет, существует ли автор статьи и имеет ли он метод getNickName -->
                    Автор: <?= htmlspecialchars($article->getAuthor()->getNickName()) ?> 
                    <!-- // Если да, выводит никнейм автора, экранируя его -->
                <?php else: ?> 
                    <span class="text-muted">Автор не указан</span> 
                    <!-- // Выводит сообщение "Автор не указан" -->
                <?php endif; ?>
            </div>
            
            <div class="card-text mb-4">
                <?= nl2br(htmlspecialchars($article->getText())) ?> 
                <!-- // Выводит текст статьи, заменяя переносы строк на <br> и экранируя его -->
                </div>
            </div>
            
            <div class="btn-group">
                <a href="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/<?= $article->getId() ?>/edit" 
                   class="btn btn-primary">
                   Редактировать
                </a>
                <a href="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/<?= $article->getId() ?>/delete" 
                   class="btn btn-danger"
                   onclick="return confirm('Вы уверены?')">
                   Удалить
                </a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Добавить комментарий</h4>
        <form action="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/<?= $article->getId() ?>/comment" method="POST">
            <div class="mb-3">
                <textarea class="form-control" name="text" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

    <div class="mt-5">
        <h4>Комментарии (<?= count($comments) ?>)</h4>
        
        <?php if (empty($comments)): ?> 
         <!-- // Проверяет, есть ли комментарии -->
            <div class="alert alert-info">Нет комментариев</div> 
            <!-- // Если нет, выводит сообщение "Нет комментариев" -->
        <?php else: ?> 
            <?php foreach ($comments as $comment): ?> 
               <!-- // Перебирает комментарии в цикле -->
                <?php if ($comment->getAuthor()): ?> 
                  <!-- // Проверяет, есть ли автор у комментария -->
                    <div class="card mb-3" id="comment<?= $comment->getId() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?= htmlspecialchars($comment->getAuthor()->getNickname()) ?> 
                                    <!-- // Выводит никнейм автора комментария, экранируя его -->
                                </h6>
                                <small class="text-muted"><?= $comment->getCreatedAt() ?></small> 
                                <!-- // Выводит дату создания комментария -->
                            </div>
                            <p class="card-text"><?= nl2br(htmlspecialchars($comment->getText())) ?></p> 
                            <!-- // Выводит текст комментария, заменяя переносы строк на <br> и экранируя его -->
                            <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/edit" 
                            class="btn btn-sm btn-outline-secondary"> 
                            <!-- // Ссылка на редактирование комментария
                            Редактировать // Текст ссылки -->
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require dirname(__DIR__) . '/footer.php'; ?>