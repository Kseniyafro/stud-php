<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Формы</title>
   <link rel="stylesheet" href="style2.css">
   <link rel="stylesheet" href="/normalize.css">
   <link rel="stylesheet" href="fonts/gogol_regular.otf">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap">
</head>
<body>
   <header>
      <img class="img__logo" src="Logo.jpg" alt="лого">
      <h1>Feedback Form</h1>
      <div class="button__in-header">
         <button class="button_class">переход</button>
      </div>
   </header>
   <main>
      <section class="section-forms">
         <div class="form">
            <h1 class="form-h1">Регистрация</h1>
            <form action="//httpbin.org/post" method="post">
               <div class="for-two-fielsets">
                  <fieldset class="first-form-block">
                        <legend class="legend">Личная информация</legend>
                        <div class="for-blocks">
                           <label class="labels">Имя
                              <input class="for-inputs" type="text" name="name" placeholder="Ваше имя" required>
                              <span class="for-span-in-from">*</span>
                           </label>
                        </div>
                        <label class="labels">Дата рождения
                           <input class="for-inputs" type="date" name="date" placeholder="ДД.ММ.ГГГГ" required>
                           <span class="for-span-in-from">*</span>
                        </label>
                        <label class="labels">Пол
                           <span class="for-span-in-from">*</span>
                        </label>
                        <label class="labels">
                           <input class="for-inputs" type="radio" name="gender" value="male" required>Женский
                        </label>
                        <label class="labels">
                           <input class="for-inputs" type="radio" name="gender" value="female" required>Мужской
                        </label>
                        <label class="labels">Введите пароль
                           <input class="for-inputs" type="password" name="password" placeholder="пароль" required>
                           <span class="for-span-in-from">*</span>
                        </label>
                        <label class="labels">Введите email
                              <input class="for-inputs" type="email" name="email" placeholder="email" required>
                              <span class="for-span-in-from">*</span>
                           </label>
                           <label class="labels">Введите номер телефона
                              <input class="for-inputs" type="tel" name="telephone" placeholder="номер телефона" required>
                              <span class="for-span-in-from">*</span>
                           </label>
                           <label class="labels for-selection-time">Выберите удобное время для связи
                              <select class="for-inputs" name="time_for_contact" id="time_for_contact">
                                 <option value="">Выберите время</option>
                                 <option value="morning">Утро</option>
                                 <option value="afternoon">День</option>
                                 <option value="evening">Вечер</option>
                                 <option value="night">Ночь</option>
                              </select>
                              <span class="for-span-in-from">*</span>
                           </label>
                     </div>
                     <div class="for-buttons">
                        <button class="first-button" type="submit"> Отправить </button>
                        <a href="result.php">следующая страница</a>
                     </div>
                  </div>
            </form>
         </div>
      </section>
   </main>
   <footer class="for-footer">
        <p class = 'footer__text'>Собрать сайт из двух страниц. 1 страница: Сверстать форму обратной связи. Отправку формы осуществить на URL: https://httpbin.org/post. Добавить кнопку для перехода на 2 страницу.
        2 страница: вывести на страницу результат работы функции get_headers. Загрузить код в удаленный репозиторий. Залить на хостинг.</p>
   </footer>
</body>
</html>