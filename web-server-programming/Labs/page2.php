<?php
session_start();

if (isset($_SESSION['username'])) {
  echo "<p>Имя пользователя: " . $_SESSION['username'] . "</p>";
  echo "<p><a href='logout.php'>Выйти и удалить сессию</a></p>";
} else {
  echo "<h1>Сессия пуста!</h1>";
}
?>