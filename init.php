<?
require(__DIR__."/.ghm_config.php");
require(__DIR__."/include/constants.php");

CModule::AddAutoloadClasses('', 
    array(
        'HTML'            => '/local/classes/HTML.php',
        'ELEMENTS'        => '/local/classes/ELEMENTS.php',
        'SECTIONS'        => '/local/classes/SECTIONS.php',
    )
);





AddEventHandler('main','OnAdminTabControlBegin','RemoveYandexDirectTab');
function RemoveYandexDirectTab(&$TabControl){


    // Убирает вкладку реклама
    if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_element_edit.php') {
        foreach($TabControl->tabs as $Key => $arTab){
            if($arTab['DIV']=='seo_adv_seo_adv') {
                unset($TabControl->tabs[$Key]);
            }
        }
    }




}








AddEventHandler("main", "OnBuildGlobalMenu", "AlexMenus");
function AlexMenus(&$adminMenu, &$moduleMenu){
    $moduleMenu[] = array(
        "parent_menu" => "global_menu_content", // поместим в раздел "Сервис"
        "section"     => "",
        "sort"        => 1,                    // сортировка пункта меню
        "url"         => "/bitrix/admin/ax_settings_page.php",  // ссылка на пункте меню
        "text"        => 'Настройки сайта',       // текст пункта меню
        "title"       => 'Настройки сайта', // текст всплывающей подсказки
        "icon"        => "form_menu_icon", // малая иконка
        "page_icon"   => "form_page_icon", // большая иконка
        "items_id"    => "menu_ax_settings",  // идентификатор ветви
        "items"       => array()          // остальные уровни меню сформируем ниже.
    );
    $moduleMenu[] = array(
        "parent_menu" => "global_menu_content", // поместим в раздел "Сервис"
        "section"     => "",
        "sort"        => 2,                    // сортировка пункта меню
        "url"         => "/bitrix/admin/ax_buildmenu.php",  // ссылка на пункте меню
        "text"        => 'Верхнее меню',       // текст пункта меню
        "title"       => 'Верхнее меню', // текст всплывающей подсказки
        "icon"        => "form_menu_icon", // малая иконка
        "page_icon"   => "form_page_icon", // большая иконка
        "items_id"    => "menu_ax_buildmenu",  // идентификатор ветви
        "items"       => array()          // остальные уровни меню сформируем ниже.
    );
}

// Настройки сайта
$file_settings = $_SERVER["DOCUMENT_ROOT"].'/local/php_interface/settings.set';
$text_settings = file_get_contents($file_settings);
$SETTINGS = unserialize($text_settings);
?>