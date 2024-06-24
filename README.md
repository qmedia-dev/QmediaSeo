# SEO

Работа над SEO сведена к двум местам в админке:

1. Раздел SEO в настройках сайта (данные для всего сайта)
2. TV-параметры у ресурсов (данные для конкретных страниц)

---

- [SEO](#seo)
  - [SEO-теги](#seo-теги)
    - [Примеры](#примеры)
  - [HTML-инъекции](#html-инъекции)
    - [Примеры](#примеры-1)
  - [Open Graph](#open-graph)
    - [Примеры](#примеры-2)
  - [301 редиректы](#301-редиректы)
    - [Пример](#пример)

Базовые разделы работы над SEO на проектах:

1. Управление SEO-тегами (title, description, keywords, h1)
2. Управление HTML-инъекциями (head, начало body, конец body)
   > Список таких мест может быть расширен в зависимости от проекта
3. Управление разметкой Open Graph (title, type, image, description)
4. Управление 301 редиректами

---

Разделы на будущее:

1. Отправка ресурсов на индексацию (Google, Яндекс)
2. Импорт/экспорт ресурсов с использованием XLS-файлов
3. Настройка выгрузок для Яндекс Справочниа
4. Настройка выгрузок для Google Merchant Center
5. Внедрение Chat GPT в генерацию содержимого SEO-тегов

---

## SEO-теги

В настройках сайта и у каждого ресурса в админке, во вкладке "SEO-теги", предусмотрен набор полей для указания правил генерации содержимого тегов.

1. seo_title :: `<title> ___ </title>`
2. seo_description :: `<meta name="description" content=" ___ ">`
3. seo_keywords :: `<meta name="keywords" content=" ___ ">`
4. seo_h1 :: `<h1> ___ </h1>`

> Каждое из таких полей – это по сути редактор кода, который поддерживает синтаксис blade-шаблонизации.

---

🔴 **Важная информация**

Содержимое этих полей – это то, что будет вставлено внутрь тега или аттрибута `content`. Т.е. оно не должно содержать тегов. Исключительно контент.

---

🔴 **Важная информация**

Содержимое TV-параметров в ресурсах имеет наивысший приоритет. Если оно заполнено, то будет выведено именно оно.

---

### Примеры

`seo_title` :: простой вывод переменной

```blade
{{ $pagetitle }}
```

`seo_title` :: разный контент для шаблонов

```blade
@switch($template)
  @case(10)
    {{-- Шаблон "Кейс" --}}
    {{ $pagetitle }}. Понравился кейс? ☎ Обращайтесь: +375 (17) 336-22-33, +375 (29) 335-23-23.
  @break

  @default
    {{ $pagetitle }}
@endswitch
```

`seo_title` :: разный контент для шаблонов + вызов сниппетов

```blade
@switch($template)
  @case(10)
    {{-- Шаблон "Кейс" --}}
    {{ $pagetitle }}. Понравился кейс? ☎ Обращайтесь: +375 (17) 336-22-33, +375 (29) 335-23-23.
  @break

  @case(4)
    {{-- Шаблон "Карточка товара" --}}
    @php
      $parent_pagetitle = evo()->runSnippet('DocInfo', [
          'docid' => $parent,
          'field' => 'pagetitle',
      ]);
    @endphp
    {{ $parent_pagetitle }} | {{ $pagetitle }}
  @break

  @default
    {{ $pagetitle }}
@endswitch
```

## HTML-инъекции

В настройках сайта и у каждого ресурса в админке, во вкладке "HTML-инъекции", предусмотрен набор полей для указания HTML-кода, который будет вставляться в различных частях страниц.

1. seo_head :: `<head> ___ </head>`
2. seo_body_start :: `<body> ___ `
3. seo_body_end :: ` ___ </body>`

> Каждое из таких полей – это по сути редактор кода, который поддерживает синтаксис blade-шаблонизации.

---

🔴 **Важная информация**

Заполнение TV-параметров в ресурсах не отменяет вставку инъекций из настроек сайта. TV-параметры предназначены лишь для дополнения.

---

### Примеры

`seo_head` :: GTM + верификация

```blade
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-000000');</script>
<!-- End Google Tag Manager -->

<meta name="facebook-domain-verification" content="000000" />
```

`seo_head` :: canonical

```blade
@switch($template)
  @case(1)
    {{-- Шаблон "Главная страница" --}}
    <link rel="canonical" href="{{ evo()->getConfig('site_url') }}" />
  @break

  @default
    <link rel="canonical" href="{{ evo()->getConfig('site_url') . evo()->makeUrl($id) }}" />
@endswitch
```

`seo_head` (TV у ресурса) :: Скрытие от индексации

```blade
<meta name="robots" content="noindex" />
```

`seo_body_start` :: GTM

```blade
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-000000" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
```

`seo_body_end` :: Jivosite

```blade
<script src="//code.jivo.ru/widget/000000" async></script>
```

## Open Graph

[Спецификация Open Graph](https://ogp.me/)

В настройках сайта и у каждого ресурса в админке, во вкладке "Open Graph", предусмотрен набор полей для управления содержимым разметки Open Graph.

1. og_title :: `<meta property="og:title" content=" ___ " />` (по умолчанию seo_title)
2. og_type :: `<meta property="og:type" content=" ___ " />` (по умолчанию "website")
3. og_image :: `<meta property="og:image" content=" ___ " />`
4. og_description :: `<meta property="og:description" content=" ___ " />` (по умолчанию seo_description)

> Каждое из таких полей (кроме `og_image`) – это по сути редактор кода, который поддерживает синтаксис blade-шаблонизации.

---

🔴 **Важная информация**

Содержимое этих полей – это то, что будет вставлено внутрь аттрибута `content`. Т.е. оно не должно содержать тегов. Исключительно контент.

---

🔴 **Важная информация**

Содержимое TV-параметров в ресурсах имеет наивысший приоритет. Если оно заполнено, то будет выведено именно оно.

---

### Примеры

`og_title` :: простой вывод переменной

```blade
{{ $pagetitle }}
```

`og_type` :: разный контент для шаблонов

```blade
@switch($template)
  @case(10)
    article
  @break

  @case(4)
    product
  @break

  @default
    website
@endswitch
```

## 301 редиректы

В настройках сайта, во вкладке "301 редиректы", предусмотрено поле для управления списком редиректов.

> Аналог чанка "redirect" из предыдущей реализации с плагином "Redirect-301".

Каждая строка списка – это инструкция для редиректа в формате:  
`oldLink||newLink`

---

🔴 **Важная информация**

Формат ссылок в инструкциях – относительный путь от корня домена.
Например: `/klienty.html`

---

### Пример

```
/klienty.html||/o_kompanii/klienty.html
/reklama/facebook.html||/reklama/razmeshhenie_reklamy_v_facebook.html
```
