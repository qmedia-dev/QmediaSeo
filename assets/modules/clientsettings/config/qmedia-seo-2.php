<?php

return [
  'menu' => [
    'alias' => 'SEO',
    'caption' => 'SEO / Аналитика',
    'icon' => 'fa-search',
  ],

  'caption' => 'HTML-инъекции',
  'introtext' => '
  <p>
    Управление HTML-инъекциями (head, начало body, конец body)
  </p>
  <div class="element-edit-message-tab alert alert-warning">
    Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#html-инъекции" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'injection_head' => [
      'caption' => 'Внутри тега head<br><span class="comment">&lt;head&gt; ___ &lt;/head&gt;</span>',
      'type'  => 'textareamini',
    ],
    'injection_body_start' => [
      'caption' => 'После открывающего тега body<br><span class="comment">&lt;body&gt; ___ </span>',
      'type'  => 'textareamini',
    ],
    'injection_body_end' => [
      'caption' => 'Перед закрывающим тегом body<br><span class="comment">___ &lt;/body&gt;</span>',
      'type'  => 'textareamini',
    ],
  ],
];
