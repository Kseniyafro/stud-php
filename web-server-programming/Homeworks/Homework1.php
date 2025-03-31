<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FrolovaKseniya_homework1</title>
</head>
<body> 
    <header>
      <div class="header">
         <img class="img__logo" src="Images/Logo.jpg" alt="">
         <h1 class="header__name">Рандомайзер слов</h1>
      </div>
    </header> 
    <main>
        <p class="main__text"> Вам выпало слово: 
         <?php
         $wordlist = ['дом', 'лес', 'солнце', 'море', 'ветер', 'дождь'];
         echo $wordlist[array_rand($wordlist)];
         ?>
         </p>
    </main>
    <footer>
        <p class = 'footer__text'>Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий.</p>
    </footer>
</body>
</html>