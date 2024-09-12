<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => 'Open Graph',
    'introtext' => '
    <div class="text-wrap">
        <p>
            Управление разметкой Open Graph (title, type, image, description)<br>
            <small class="comment"><a href="https://ogp.me/" target="_blank">Спецификация Open Graph</a></small>
        </p>
        <p class="element-edit-message-tab alert alert-warning">
            Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#open-graph" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
        </p>
    </div>',
    'settings' => [
        'og_title' => [
            'caption' => 'Title<br><span class="comment">&lt;meta property="og:title" content=" ____ " /&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'og_type' => [
            'caption' => 'Type<br><span class="comment">&lt;meta property="og:type" content=" ____ " /&gt;<br></span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'og_image' => [
            'caption' => 'Image<br><span class="comment">&lt;meta property="og:image" content=" ____ " /&gt;</span>',
            'type'  => 'image',
        ],
        'og_description' => [
            'caption' => 'Description<br><span class="comment">&lt;meta property="og:description" content=" ____ " /&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
    ],
];
