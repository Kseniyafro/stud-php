<?php

$a = 'Здравствуйте, Петрова Мария Ивановна! Пока';
$reg = '/\b[А-ЯЕЁ][а-яеё]+\s([А-ЯЕЁ][а-яеё]+\s)[А-ЯЕЁ][а-яеё]+\b/u';
preg_match($reg, $a, $matches);
var_dump($matches);
$name = $matches[1];
echo '<BR>'.$name;

echo preg_replace('#x(ab)+x#', '!', 'xabx xababx xaabbx');

echo ('#a.+x#', '!', 'a23e4x qw x e');
echo 'a + x<BR>';
echo preg_replace('#a.+x#', '!', 'a23e4x qw x e');
echo '<BR>';
echo preg_replace('#a.+?x#', '!', 'a23e4x qw x e');



   
    
