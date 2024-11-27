<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => 'Аналитика',
    'introtext' => '
    <div class="text-wrap">
        <p>
            Управление подключением скриптов аналитики (GTM, Яндекс.Метрика, CallTracking и т.п.)
        </p>
        <p class="element-edit-message-tab alert alert-warning">
            Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#html-инъекции" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
        </p>
    </div>',
    'settings' => [
        'analytic_head' => [
            'caption' => 'Код внутри &lt;head&gt;<br><span class="comment">&lt;head&gt; ____ &lt;/head&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'analytic_body_start' => [
            'caption' => 'Код после открывающего &lt;body&gt;<br><span class="comment">&lt;body&gt; ____ </span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'analytic_body_end' => [
            'caption' => 'Код перед закрывающим &lt;/body&gt;<br><span class="comment">____ &lt;/body&gt;</span>',
            'type'  => 'custom_tv:codeeditor',
        ],
        'analytic_after_cookies' => [
            'caption' => 'Код, подключаемый после принятия Cookies',
            'type'  => 'custom_tv:codeeditor',
        ],
    ],
];
