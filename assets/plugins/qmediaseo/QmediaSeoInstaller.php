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
            'caption' => 'Тег <h1>',
            'description' => '<h1> ____ </h1>',
            'type' => 'custom_tv:codeeditor',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_title',
            'caption' => 'Тег <title>',
            'description' => '<title> ____ </title>',
            'type' => 'custom_tv:codeeditor',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_description',
            'caption' => 'Meta Description',
            'description' => '<meta name="description" content=" ____ ">',
            'type' => 'custom_tv:codeeditor',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_keywords',
            'caption' => 'Meta Keywords',
            'description' => '<meta name="keywords" content=" ____ ">',
            'type' => 'custom_tv:codeeditor',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'seo_head',
            'caption' => 'HTML-код внутри тега <head>',
            'description' => '<head> ____ </head>',
            'type' => 'custom_tv:codeeditor',
        ],
        'SEO-теги',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_title',
            'caption' => 'OG Title',
            'description' => '<meta property="og:title" content=" ____ ">',
            'type' => 'custom_tv:codeeditor',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_type',
            'caption' => 'OG Type',
            'description' => '<meta property="og:type" content=" ____ ">',
            'type' => 'custom_tv:codeeditor',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_image',
            'caption' => 'OG Image',
            'description' => '<meta property="og:image" content=" ____ ">',
            'type' => 'image',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'og_description',
            'caption' => 'OG Description',
            'description' => '<meta property="og:description" content=" ____ ">',
            'type' => 'custom_tv:codeeditor',
        ],
        'Open Graph',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'sitemap_xml_visible',
            'caption' => 'Ресурс виден в XML-карте сайта',
            'description' => 'Параметр участвует в алгоритме формирования XML-карты сайта',
            'type' => 'option',
        ],
        'Карты сайта',
        '*',
    );

    createTemplateVar(
        [
            'name' => 'sitemap_html_visible',
            'caption' => 'Ресурс виден в HTML-карте сайта',
            'description' => 'Параметр участвует в алгоритме формирования HTML-карты сайта',
            'type' => 'option',
        ],
        'Карты сайта',
        '*',
    );

    //удаляем плагин
    $pluginId  = evo()->db->getValue(evo()->db->select('id', evo()->getFullTableName('site_plugins'), 'name="QmediaSeoInstaller"'));
    if (!empty($pluginId)) {
        evo()->db->delete(evo()->getFullTableName('site_plugins'), "`id` = '$pluginId'");
        evo()->db->delete(evo()->getFullTableName("site_plugin_events"), "`pluginid` = '$pluginId'");
        evo()->clearCache('full');
        unlink(MODX_BASE_PATH . 'assets/plugins/qmediaseo/QmediaSeoInstaller.php');
    };
}
