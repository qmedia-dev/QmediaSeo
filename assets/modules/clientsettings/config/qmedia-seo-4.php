<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => '301 редиректы',
    'introtext' => '
    <p>
        Управление 301 редиректами
    </p>
    <div class="element-edit-message-tab alert alert-warning">
        Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#301-редиректы" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
    </div>',
    'settings' => [
        'seo_redirects_301' => [
            'caption' => 'Список инструкций для редиректов<br><span class="comment">___old_url___||___new_url____<br><span class="comment">/old/url.html||new/url.html</span>',
            'type'  => 'textareamini',
        ],
    ],
];
