<?php

return [
  'menu' => [
    'alias' => 'QmediaSeo',
    'caption' => 'SEO / Аналитика',
    'icon' => 'fa-search',
  ],

  'caption' => 'Аналитика',
  'introtext' => '
  <p>
    Управление подключением скриптов аналитики (GTM, Яндекс.Метрика, CallTracking и т.п.)
  </p>
  <div class="element-edit-message-tab alert alert-warning">
    Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#html-инъекции" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'analytic_head' => [
      'caption' => 'Внутри тега &lt;head&gt;<br><span class="comment">&lt;head&gt; ____ &lt;/head&gt;</span>',
      'type'  => 'textareamini',
    ],
    'analytic_body_start' => [
      'caption' => 'После открывающего тега &lt;body&gt;<br><span class="comment">&lt;body&gt; ____ </span>',
      'type'  => 'textareamini',
    ],
    'analytic_body_end' => [
      'caption' => 'Перед закрывающим тегом &lt;body&gt;<br><span class="comment">____ &lt;/body&gt;</span>',
      'type'  => 'textareamini',
    ],
  ],
];
