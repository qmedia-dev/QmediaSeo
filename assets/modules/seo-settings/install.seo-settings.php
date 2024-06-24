<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

/*
@author of original dzhuryn https://github.com/dzhuryn
*/

if (evo()->event->name == 'OnManagerPageInit') {
    $M = evo()->getFullTableName('site_modules');
    $MD = evo()->getFullTableName('site_module_depobj');
    $S = evo()->getFullTableName('site_snippets');
    $P = evo()->getFullTableName('site_plugins');
    $TV = evo()->getFullTableName('site_tmplvars');
    $CATS = evo()->getFullTableName('categories');

    // igor@qmedia.by :: добавить инструкцию для переопределения типа поля value у настроек сайта на longtext или varchar(___)
    $createSQL = "____";
    evo()->db->query($createSQL);

    //удаляем плагин
    $pluginId  = evo()->db->getValue(evo()->db->select('id', evo()->getFullTableName('site_plugins'), 'name="seo-settings-installer"'));
    if (!empty($pluginId)) {
        evo()->db->delete($P, "id = $pluginId");
        evo()->db->delete(evo()->getFullTableName("site_plugin_events"), "pluginid=$pluginId");
    };
}
