<?php

return [
  'menu' => [
    'alias' => 'SEO',
    'caption' => 'SEO',
    'icon' => 'fa-search',
  ],

  'caption' => '301 редиректы',
  'introtext' => '
  <p>Управление 301 редиректами</p>
  <div class="element-edit-message-tab alert alert-warning">
    Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#301-редиректы" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'seo_301_redirects' => [
      'caption' => 'Список инструкций редиректов<br><span class="comment">old_link||new_link</span>',
      'type'  => 'textareamini',
    ],
  ],
];
