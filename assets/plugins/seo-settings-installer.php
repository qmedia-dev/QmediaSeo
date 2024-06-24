<?php

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

if (evo()->event->name == 'OnManagerPageInit') {

    // igor@qmedia.by :: добавить инструкцию для переопределения типа поля value у настроек сайта на longtext или varchar(___)
    // $createSQL = "____";
    // evo()->db->query($createSQL);

    //удаляем плагин
    $pluginId  = evo()->db->getValue(evo()->db->select('id', evo()->getFullTableName('site_plugins'), 'name="seo-settings-installer"'));
    if (!empty($pluginId)) {
        evo()->db->delete(evo()->getFullTableName('site_plugins'), "id = $pluginId");
        evo()->db->delete(evo()->getFullTableName("site_plugin_events"), "pluginid=$pluginId");
        evo()->clearCache('full');
        unlink(MODX_BASE_PATH . 'assets/plugins/seo-settings-installer.php');
    };

}
