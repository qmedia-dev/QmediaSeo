<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

// Получаем содержимое списка редиректов из настроек сайта
$clientsettingsList = evo()->getConfig('client_seo_redirects_301') ?? '';

// Получаем содержимое списка редиректов из чанка
$chunkList = evo()->getChunk('seo_redirects_301') ?? '';

//Разбиваем код чанка по переводу строки в массив правил редиректа 
$mapLines = explode("\n", $clientsettingsList . "\n" . $chunkList);

// Создаем пустой массив 
$mapArr = array();

// Проходимся по массиву со строками правил редиректа
foreach ($mapLines as $line) {
    list($oldLink, $newLink) = explode('||', $line);
    if (!empty($oldLink) && !empty($newLink)) {
        $mapArr[$oldLink] = $newLink;
    }
}

// Получаем запрошенный адрес
$query = $_SERVER['REQUEST_URI'];

// Если запрошенный адрес есть в правилах редиректа, то осуществляем редирект
if (isset($mapArr[$query])) {
    evo()->sendRedirect($mapArr[$query], 0, 'REDIRECT_HEADER', 'HTTP/1.1 301 Moved Permanently');
    exit();
}
