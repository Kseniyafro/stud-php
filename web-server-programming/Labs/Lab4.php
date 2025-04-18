<?php

// $a = 'Здравствуйте, Петрова Мария Ивановна! Пока';
// $reg = '/\b[А-ЯЕЁ][а-яеё]+\s([А-ЯЕЁ][а-яеё]+\s)[А-ЯЕЁ][а-яеё]+\b/u';
// preg_match($reg, $a, $matches);
// var_dump($matches);
// $name = $matches[1];
// echo '<BR>'.$name;

// echo preg_replace('#x(ab)+x#', '!', 'xabx xababx xaabbx');

// echo ('#a.+x#', '!', 'a23e4x qw x e');
// echo 'a + x<BR>';
// echo preg_replace('#a.+x#', '!', 'a23e4x qw x e');
// echo '<BR>';
// echo preg_replace('#a.+?x#', '!', 'a23e4x qw x e');

// Exercise 1
echo '<BR>'.preg_replace('/(\d)/', '$1$1', 'a1b2c3');
// preg_replace выполняет поиск по регулярному выражению и замену.
// '/(\d)/' - регулярное выражение, которое ищет любую цифру (обозначается как \d).
// Скобки () создают группу захвата, чтобы мы могли обратиться к найденной цифре.
// '$1$1' - строка замены. $1 ссылается на первую (и единственную) группу захвата.

// Exercise 2
echo '<BR>'.preg_match('/^https?:\/\/[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', "https://site.ru");
echo '<BR>'.preg_match('/^https?:\/\/[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', "http://site.ru");
// https?:\/\/ - "http://" или "https://".  Знак ? делает "s" необязательным.  Экранируем / символом \, т.к. / - разделитель в регулярном выражении
// [a-zA-Z0-9-]+ - один или более символов (буквы, цифры или дефис).
// \. - точка (экранированная, т.к. точка в регулярном выражении означает "любой символ").
// [a-zA-Z]{2,} - две или более буквы (зона домена, например, ru, com, org).
// $ - конец строки.

// Exercise 3 (11)
echo '<BR>'.preg_replace('/([a-zA-Z0-9]+)@([a-zA-Z0-9]+)/', '$2@$1', 'aaa@bbb eee7@kkk');
// preg_replace выполняет поиск и замену.
// '/([a-zA-Z0-9]+)@([a-zA-Z0-9]+)/' - регулярное выражение:
// ([a-zA-Z0-9]+) - первая группа захвата: одна или более буквы или цифры (имя пользователя).
// @ - символ "@".
// ([a-zA-Z0-9]+) - вторая группа захвата: одна или более буквы или цифры (домен).
// '$2@$1' - строка замены: домен@имя_пользователя.

// Exercise 4 (31)
echo '<BR>'.preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/', '$3.$2.$1', '31-12-2014');
// '/^(\d{2})-(\d{2})-(\d{4})$/' - регулярное выражение:
// ^ - начало строки.
// (\d{2}) - первая группа захвата: две цифры (день).
// - - символ "-".
// (\d{2}) - вторая группа захвата: две цифры (месяц).
// - - символ "-".
// (\d{4}) - третья группа захвата: четыре цифры (год).
// $ - конец строки.
// '$3.$2.$1' - строка замены: год.месяц.день.

// Exercise 5 (32)
preg_match_all('/\d+/', "iuinrheh 345 herfgyu 2 wqerf", $matches); 
echo '<BR>'.array_sum($matches[0]); 
// preg_match_all выполняет поиск всех соответствий регулярному выражению в строке.
// '/\d+/' - регулярное выражение: одна или более цифра.
// $matches - массив, в который будут записаны результаты поиска.
// $matches[0] - массив всех найденных чисел (в виде строк).
// array_sum - функция PHP, которая вычисляет сумму элементов массива.

// Exercise 6 (34)
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.php');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.txt');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.html');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.htm');
// preg_match выполняет поиск соответствия регулярному выражению в строке.
// '/\.(txt|html|php)$/i' - регулярное выражение:
// \. - точка (экранированная).
// (txt|html|php) - одна из трех подстрок: "txt", "html" или "php".
// $ - конец строки.
// i - модификатор, который делает поиск регистронезависимым.

   
    
