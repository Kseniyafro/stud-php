<?php require dirname(DIR, 2).'/templates/header.php'; ?> 
<!-- // Подключает файл header.php, расположенный в директории на два уровня выше. -->

<div class="container mt-4"> 
   <!-- // Открывает контейнер Bootstrap с верхним отступом. -->
    <h2>Редактирование комментария</h2> 
    
    <?php if (isset($error)): ?> 
      <!-- // Проверяет, установлена ли переменная $error. -->
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div> 
        <!-- // Если $error установлена, отображает сообщение об ошибке в блоке alert-danger (стиль Bootstrap). Экранирует содержимое $error для предотвращения XSS. -->
    <?php endif; ?>
    
    <?php if ($comment): ?> 
      <!-- // Проверяет, существует ли объект комментария ($comment). -->
        <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/update" method="POST"> 
         <!-- // Открывает форму для обновления комментария. Атрибут action указывает URL для отправки данных, включая ID комментария. Используется метод POST. -->
        <div class="mb-3"> // Открывает div с классом mb-3 (margin-bottom: 3) для создания отступа.
            <label for="text" class="form-label">Текст комментария</label> 
            <!-- // Создает метку для поля ввода текста комментария. -->
            <textarea class="form-control" id="text" name="text" rows="5" required><?= 
                htmlspecialchars($comment->getText()) // Создает многострочное поле ввода (textarea) для текста комментария. Устанавливает класс form-control (стиль Bootstrap), ID и имя. Атрибут required делает поле обязательным для заполнения. В качестве значения поля устанавливается текущий текст комментария, экранированный для предотвращения XSS.
            ?></textarea>
        </div>
        
        <div class="d-flex gap-2"> 
         <!-- // Открывает div, использующий flexbox (d-flex) для расположения элементов в ряд, а gap-2 создает отступ между элементами. -->
            <button type="submit" class="btn btn-primary">Сохранить</button> 
            
        </div>
    </form> 
    <?php endif; ?> 
</div>

<?php require dirname(DIR, 2).'/templates/footer.php'; ?> 
<!-- // Подключает файл footer.php, расположенный в директории на два уровня выше. -->
