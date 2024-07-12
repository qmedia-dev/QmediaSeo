<?php

return [
  'menu' => [
    'alias' => 'SEO',
    'caption' => 'SEO',
    'icon' => 'fa-search',
  ],

  'caption' => 'Open Graph',
  'introtext' => '
  <p>
    Управление разметкой Open Graph (title, type, image, description)<br>
    <small class="comment"><a href="https://ogp.me/" target="_blank">Спецификация Open Graph</a></small>
  </p>
  <div class="element-edit-message-tab alert alert-warning">
    Подробнее в <a href="https://gist.github.com/qmedia-dev/f8880c0a3fcd669a44c6a1cd33116ede#open-graph" target="_blank">документации</a> (содержит подробное описание и примеры blade-шаблонизаций)
  </div>',
  'settings' => [
    'og_title' => [
      'caption' => 'Title<br><span class="comment">&lt;meta property="og:title" content=" ___ " /&gt;<br>по умолчанию seo_title</span>',
      'type'  => 'textareamini',
    ],
    'og_type' => [
      'caption' => 'Type<br><span class="comment">&lt;meta property="og:type" content=" ___ " /&gt;<br>по умолчанию "website"</span>',
      'type'  => 'textareamini',
    ],
    'og_image' => [
      'caption' => 'Image<br><span class="comment">&lt;meta property="og:image" content=" ___ " /&gt;</span>',
      'type'  => 'image',
    ],
    'og_description' => [
      'caption' => 'Description<br><span class="comment">&lt;meta property="og:description" content=" ___ " /&gt;<br>по умолчанию seo_description</span>',
      'type'  => 'textareamini',
    ],
  ],
];
