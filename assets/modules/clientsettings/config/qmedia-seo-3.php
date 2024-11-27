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
            'caption' => 'Шаблон для og:title<br><span class="comment">&lt;meta property="og:title" content=" ____ "&gt;<br>Если не указан, то будет использован seo_title из вкладки "SEO-теги"</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'og_type' => [
            'caption' => 'Шаблон для og:type<br><span class="comment">&lt;meta property="og:type" content=" ____ "&gt;<br></span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'og_image' => [
            'caption' => 'Заглушка для og:image<br><span class="comment">&lt;meta property="og:image" content=" ____ "&gt;</span>',
            'type'  => 'image',
        ],
        'og_description' => [
            'caption' => 'Шаблон для og:description<br><span class="comment">&lt;meta property="og:description" content=" ____ "&gt;<br>Если не указан, то будет использован seo_description из вкладки "SEO-теги"</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
    ],
];
