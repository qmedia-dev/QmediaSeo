<?php

return [
    'menu' => [
        'alias' => 'QmediaSeo',
        'caption' => 'SEO / Аналитика',
        'icon' => 'fa-search',
    ],

    'caption' => 'Карты сайта',
    'introtext' => '
    <div class="text-wrap">
        <p>
            Управление XML и HTML картами сайта
        </p>
        <p class="element-edit-message-tab alert alert-warning">
            Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#карты-сайта" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
        </p>
    </div>',
    'settings' => [
        'sitemap_xml_addwherelist' => [
            'caption' => 'addWhereList для XML-карты<br><span class="comment">Параметр сниппета DocLister для настройки выборки документов<br> <a href="https://docs.evo.im/04_extras/doclister/01_parameters.html#:~:text=addWhereList" target="_blank">Подробнее</a></span>',
            'type'  => 'text',
        ],
        'sitemap_xml_filters' => [
            'caption' => 'filters для XML-карты<br><span class="comment">Параметр сниппета DocLister для настройки выборки документов<br> <a href="https://docs.evo.im/04_extras/doclister/01_parameters.html#:~:text=filters" target="_blank">Подробнее</a></span>',
            'type'  => 'text',
        ],
        'sitemap_html_addwherelist' => [
            'caption' => 'addWhereList для HTML-карты<br><span class="comment">Параметр сниппета DocLister для настройки выборки документов<br> <a href="https://docs.evo.im/04_extras/doclister/01_parameters.html#:~:text=addWhereList" target="_blank">Подробнее</a></span>',
            'type'  => 'text',
        ],
        'sitemap_html_filters' => [
            'caption' => 'filters для HTML-карты<br><span class="comment">Параметр сниппета DocLister для настройки выборки документов<br> <a href="https://docs.evo.im/04_extras/doclister/01_parameters.html#:~:text=filters" target="_blank">Подробнее</a></span>',
            'type'  => 'text',
        ],
    ],
];
