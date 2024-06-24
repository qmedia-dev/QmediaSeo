<?php

return [
  'menu' => [
    'alias' => 'SEO',
    'caption' => 'SEO',
    'icon' => 'fa-search',
  ],

  'caption' => 'HTML-инъекции',
  'introtext' => '
  <p>
    Управление HTML-инъекциями (head, начало body, конец body)<br>
    <small class="comment">Список таких мест может быть расширен в зависимости от проекта</small>
  </p>
  <div class="element-edit-message-tab alert alert-warning">
    Подробнее в <a href="https://github.com/qmedia-dev/seo-settings?tab=readme-ov-file#html-инъекции" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'seo_head' => [
      'caption' => 'Внутри тега head<br><span class="comment">&lt;head&gt; ___ &lt;/head&gt;</span>',
      'type'  => 'textareamini',
    ],
    'seo_body_start' => [
      'caption' => 'После открывающего тега body<br><span class="comment">&lt;body&gt; ___ </span>',
      'type'  => 'textareamini',
    ],
    'seo_body_end' => [
      'caption' => 'Перед закрывающим тегом body<br><span class="comment">___ &lt;/body&gt;</span>',
      'type'  => 'textareamini',
    ],
  ],
];
