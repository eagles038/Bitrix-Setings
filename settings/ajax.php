<?
$SETTINGS['POPUP_PROMO_BOTTOM'] = $_POST['popup_promo_bottom'];
$SETTINGS['ADMIN_EMAIL'] = $_POST['admin_email'];
$SETTINGS['TICKETS_ACTIVE'] = $_POST['tickets_active'];
$SETTINGS['TICKETS_PAYMENT'] = $_POST['tickets_payment'];

$SETTINGS['METRICS'] = $_POST['metrics'];

$SETTINGS['VIRTUAL_EXPO_GHM'] = $_POST['virtual_expo_ghm'];
$SETTINGS['VIRTUAL_EXPO_IGOSHEVA'] = $_POST['virtual_expo_igosheva'];
$SETTINGS['VIRTUAL_EXPO_RAISHEVA'] = $_POST['virtual_expo_raisheva'];

$SETTINGS['TOKEN_TELEGRAM'] = $_POST['token_telegram'];

$file_settings = $_SERVER["DOCUMENT_ROOT"].'/local/php_interface/settings.set';
$text_settings = serialize($SETTINGS); //сериализация
file_put_contents($file_settings, $text_settings); //записываем текст в файл
?>