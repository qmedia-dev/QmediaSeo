<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

$clientsettingsList = evo()->getConfig('client_seo_redirects_301') ?? '';
$chunkList = evo()->getChunk('seo_redirects_301') ?? '';
$mapLines = explode("\n", $clientsettingsList . "\n" . $chunkList);

$mapArr = array();

foreach ($mapLines as $line) {
    if (empty($line) || strpos($line, '||') === false) {
        continue;
    }

    $parts = explode('||', $line);
    if (count($parts) === 2) {
        $oldLink = trim($parts[0]);
        $newLink = trim($parts[1]);

        if (!empty($oldLink) && !empty($newLink)) {
            $mapArr[$oldLink] = $newLink;
        }
    }
}

$query = $_SERVER['REQUEST_URI'];

if (isset($mapArr[$query])) {
    evo()->sendRedirect($mapArr[$query], 0, 'REDIRECT_HEADER', 'HTTP/1.1 301 Moved Permanently');
    exit();
}
