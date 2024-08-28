<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => 'SEO-теги',
    'introtext' => '
    <div class="text-wrap">
        <p>
            Управление содержимым тегов h1, title, meta (description, keywords)
        </p>
        <p class="element-edit-message-tab alert alert-warning">
            Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#seo-теги" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
        </p>
    </div>',
    'settings' => [
        'seo_h1' => [
            'caption' => 'Тег &lt;h1&gt;<br><span class="comment">&lt;h1&gt; ____ &lt;/h1&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'seo_title' => [
            'caption' => 'Тег &lt;title&gt;<br><span class="comment">&lt;title&gt; ____ &lt;/title&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'seo_description' => [
            'caption' => 'Meta Description<br><span class="comment">&lt;meta name="description" content=" ____ "&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'seo_keywords' => [
            'caption' => 'Meta Keywords<br><span class="comment">&lt;meta name="keywords" content=" ____ "&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'seo_head' => [
            'caption' => 'Код внутри тега &lt;head&gt;<br><span class="comment">&lt;head&gt; ____ &lt;/head&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
    ],
];
