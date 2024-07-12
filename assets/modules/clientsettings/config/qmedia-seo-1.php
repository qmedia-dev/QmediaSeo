<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => 'SEO-теги',
    'introtext' => '
    <p>
        Управление содержимым тегов h1, title, meta (description, keywords)
    </p>
    <div class="element-edit-message-tab alert alert-warning">
        Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#seo-теги" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
    </div>',
    'settings' => [
        'seo_head' => [
            'caption' => 'HTML-код внутри тега &lt;head&gt;<br><span class="comment">&lt;head&gt; ____ &lt;/head&gt;</span>',
            'type'  => 'textareamini',
        ],
        'seo_h1' => [
            'caption' => 'Тег &lt;h1&gt;<br><span class="comment">&lt;h1&gt; ____ &lt;/h1&gt;</span>',
            'type'  => 'textareamini',
        ],
        'seo_title' => [
            'caption' => 'Тег &lt;title&gt;<br><span class="comment">&lt;title&gt; ____ &lt;/title&gt;</span>',
            'type'  => 'textareamini',
        ],
        'seo_description' => [
            'caption' => 'Meta Description<br><span class="comment">&lt;meta name="description" content=" ____ "&gt;</span>',
            'type'  => 'textareamini',
        ],
        'seo_keywords' => [
            'caption' => 'Meta Keywords<br><span class="comment">&lt;meta name="keywords" content=" ____ "&gt;</span>',
            'type'  => 'textareamini',
        ],
    ],
];
