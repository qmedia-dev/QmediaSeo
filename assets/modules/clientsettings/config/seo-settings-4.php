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
    Подробнее в <a href="https://github.com/qmedia-dev/seo-settings?tab=readme-ov-file#301-редиректы" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'seo_301_redirects' => [
      'caption' => 'Список инструкций редиректов<br><span class="comment">old_link||new_link</span>',
      'type'  => 'textareamini',
    ],
  ],
];
