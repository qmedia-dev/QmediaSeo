<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

//Получаем содержимое чанка с картой редиректов
$mapChunk = evo()->getChunk('redirect');

//Разбиваем код чанка по переводу строки в массив правил редиректа 
$mapLines = explode("\n", $mapChunk);

//Создаем пустой массив 
$mapArr = array();

//Проходимся по массиву со строками правил редиректа
foreach ($mapLines as $line) {
    list($oldLink, $newLink) = explode('||', $line);
    $mapArr[$oldLink] = $newLink;
}

//Получаем запрошенный адрес
$query = $_SERVER['REQUEST_URI'];

//Если запрошенный адрес есть в правилах редиректа, то осуществляем редирект
if (isset($mapArr[$query])) {
    evo()->sendRedirect($mapArr[$query], 0, 'REDIRECT_HEADER', 'HTTP/1.1 301 Moved Permanently');
    exit();
}
