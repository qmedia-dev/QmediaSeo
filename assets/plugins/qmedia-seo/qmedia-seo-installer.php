<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

if (evo()->event->name == 'OnManagerPageInit') {

    // igor@qmedia.by :: раскомментируем, если упрёмся в ограничения размера поля в базе
    // $system_settings_table = evo()->getFullTableName('system_settings');
    // evo()->db->query("ALTER TABLE `{$system_settings_table}` MODIFY COLUMN `setting_value` varchar(255)");

    function createTemplateVar(array $tv_data, string $category_name = '', string $template_assignments = '')
    {
        if (empty($tv_data['name'])) {
            return;
        }

        $categories_table = evo()->getFullTableName('categories');
        $templates_table = evo()->getFullTableName('site_templates');
        $tvs_table = evo()->getFullTableName('site_tmplvars');
        $tvs_templates_table = evo()->getFullTableName('site_tmplvar_templates');

        $category_id = evo()->db->getValue(evo()->db->select('id', $categories_table, "category=\"{$category_name}\""));
        if (empty($category_id)) {
            $category_id = evo()->db->insert(['category' => $category_name], $categories_table);
        }

        $templates_ids = [];
        if (!empty($template_assignments)) {
            $templates_ids =
                $template_assignments == '*'
                ? array_map(function ($item) {
                    return $item['id'];
                }, evo()->db->makeArray(evo()->db->select('id', $templates_table)))
                : explode(',', $template_assignments);
        }

        $tv_id = evo()->db->getValue(evo()->db->select('id', $tvs_table, "name=\"{$tv_data['name']}\""));
        $tv_data['type'] = $tv_data['type'] ?? 'text';
        $tv_data['caption'] = $tv_data['caption'] ?? $tv_data['name'];
        if (!empty($category_id)) {
            $tv_data['category'] = $category_id;
        }

        if (!empty($tv_id)) {
            evo()->db->update($tv_data, $tvs_table, "id=$tv_id");
        } else {
            $tv_id = evo()->db->insert($tv_data, $tvs_table);
        }

        if (!empty($templates_ids)) {
            evo()->db->delete($tvs_templates_table, "tmplvarid={$tv_id}");
            foreach ($templates_ids as $key => $template_id) {
                evo()->db->insert(['tmplvarid' => $tv_id, 'templateid' => $template_id], $tvs_templates_table);
            }
        }
    }

    createTemplateVar(
        [
            'name' => 'seo_h1',
            'caption' => 'H1',
            'description' => '<h1> ____ </h1>',
            'type' => 'textareamini',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_title',
            'caption' => 'Title',
            'description' => '<title> ____ </title>',
            'type' => 'textareamini',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_description',
            'caption' => 'Meta-description',
            'description' => '<meta name="description" content=" ____ ">',
            'type' => 'textareamini',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_keywords',
            'caption' => 'Meta-keywords',
            'description' => '<meta name="keywords" content=" ____ ">',
            'type' => 'textareamini',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'injection_head',
            'caption' => 'Внутри тега head',
            'description' => '<head> ____ </head>',
            'type' => 'textareamini',
        ],
        'HTML-инъекции',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'injection_body_start',
            'caption' => 'После открывающего тега body',
            'description' => '<body> ____',
            'type' => 'textareamini',
        ],
        'HTML-инъекции',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'injection_body_end',
            'caption' => 'Перед закрывающим тегом body',
            'description' => '____ </body>',
            'type' => 'textareamini',
        ],
        'HTML-инъекции',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_title',
            'caption' => 'Open Graph Title',
            'description' => '<meta property="og:title" content=" ___ ">',
            'type' => 'textareamini',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_type',
            'caption' => 'Open Graph Type',
            'description' => '<meta property="og:type" content=" ___ ">',
            'type' => 'textareamini',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_image',
            'caption' => 'Open Graph Image',
            'description' => '<meta property="og:image" content=" ___ ">',
            'type' => 'image',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_description',
            'caption' => 'Open Graph Description',
            'description' => '<meta property="og:description" content=" ___ ">',
            'type' => 'textareamini',
        ],
        'Open Graph',
        '*',
    );

    //удаляем плагин
    $pluginId  = evo()->db->getValue(evo()->db->select('id', evo()->getFullTableName('site_plugins'), 'name="qmedia-seo-installer"'));
    if (!empty($pluginId)) {
        evo()->db->delete(evo()->getFullTableName('site_plugins'), "`id` = '$pluginId'");
        evo()->db->delete(evo()->getFullTableName("site_plugin_events"), "`pluginid` = '$pluginId'");
        evo()->clearCache('full');
        unlink(MODX_BASE_PATH . 'assets/plugins/qmedia-seo/qmedia-seo-installer.php');
    };
}
