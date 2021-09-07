<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Настройки сайта");

?>
<link href="/local/services/settings/styles.css" type="text/css" rel="stylesheet" />

<?/*
$menu1 = ELEMENTS::getField(126, "PREVIEW_TEXT");
$names1 = ELEMENTS::getField(126, "DETAIL_TEXT");

$menu1 = str_replace('&quot;', '"', $menu1); $menu = (array)json_decode($menu1); 
$names1 = str_replace('&quot;', '"', $names1); $names = (array)json_decode($names1); 
/*
echo "<pre>";
print_r($menu);
print_r($names);*/
?>

<style>
.adm-detail-content-item-block {
      margin-bottom: 10px;
}
</style>

<div class="adm-detail-block" id="tabControl_layout">
    <div class="adm-detail-tabs-block" id="tabControl_tabs" style="left: 0px;">
        <span title="" id="" class="adm-detail-tab adm-detail-tab-active" onclick="">Параметры</span> 
        <!-- <span title="" id="" class="adm-detail-tab" onclick="">Билеты</span>  -->
        <!-- <div onclick="tabControl.ToggleFix('top')" class="adm-detail-pin-btn-tabs" title="Открепить панель"></div> -->
    </div>
    <div class="adm-detail-content-wrap">
        <div class="adm-detail-content" id="">
          <div class="adm-detail-title">Глобальные настройки сайта</div>
              <div class="adm-detail-content-item-block">

                <table class="adm-detail-content-table edit-table" id="">
                    <tbody>
                        <!-- <tr>
                            <td width="40%" class="adm-detail-content-cell-l">Профиль:</td>
                            <td width="300" class="adm-detail-content-cell-r">
                                <select id="" name="presets" onchange="">
                                    <option value="0" selected="">Пользовательский</option>
                                    <option value="1">111</option>
                                    <option value="2">222</option>
                                    <option value="3">333</option>
                                </select>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td class="adm-detail-content-cell-l">Прозрачность текста в процентах от 0 до 100:</td>
                            <td class="adm-detail-content-cell-r">
                                <input type="text" size="5" id="" name="transparentTextPercent" value="10" />
                            </td>
                        </tr> -->

                        <tr>
                            <td class="adm-detail-content-cell-l">Отображать кнопку "Купить билет"</td>
                            <td class="adm-detail-content-cell-r">
                                <input type="checkbox" id="tickets-active" value="" class="adm-designed-checkbox" <? if ($SETTINGS['TICKETS_ACTIVE']=='true') {?> checked <?}?> />
                                <label class="adm-designed-checkbox-label" for="tickets-active" title=""></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="adm-detail-content-cell-l">Вкл/выкл возможности оплаты билетов</td>
                            <td class="adm-detail-content-cell-r">
                                <input type="checkbox" id="tickets-payment" value="" class="adm-designed-checkbox" <? if ($SETTINGS['TICKETS_PAYMENT']=='true') {?> checked <?}?> />
                                <label class="adm-designed-checkbox-label" for="tickets-payment" title=""></label>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="adm-detail-valign-top adm-detail-content-cell-l">Используемые шрифты:</td>
                            <td class="adm-detail-content-cell-r">
                                <select multiple="" id="" name="arTTFFiles[]" size="2">
                                    <option value="bitrix_captcha.ttf">bitrix_captcha.ttf</option>
                                    <option value="font.ttf" selected="">font.ttf</option>
                                </select>
                            </td>
                        </tr> -->
                        <tr>
                            <td class="adm-detail-content-cell-l">Нижний промо-текст</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="popup-promo-bottom" value="<?=$SETTINGS['POPUP_PROMO_BOTTOM']?>" /></td>
                        </tr>
                        <tr>
                            <td class="adm-detail-content-cell-l">Электронная почта для получения обратной связи</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="admin-email" value="<?=$SETTINGS['ADMIN_EMAIL']?>" /></td>
                        </tr>
                        <tr>
                            <td class="adm-detail-content-cell-l">Метрики</td>
                            <td class="adm-detail-content-cell-r"><textarea type="text" rows="15" size="90" id="metrics" style="width: 100%;"><?=$SETTINGS['METRICS']?></textarea></td>
                        </tr>

                        <tr><td colspan="2"><hr></td></tr>

                        <tr>
                            <td class="adm-detail-content-cell-l">Виртуальная выставка ГХМ</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="virtual-expo-ghm" value="<?=$SETTINGS['VIRTUAL_EXPO_GHM']?>" /></td>
                        </tr>
                        <tr>
                            <td class="adm-detail-content-cell-l">Виртуальная выставка Игошева</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="virtual-expo-igosheva" value="<?=$SETTINGS['VIRTUAL_EXPO_IGOSHEVA']?>" /></td>
                        </tr>
                        <tr>
                            <td class="adm-detail-content-cell-l">Виртуальная выставка Райшева</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="virtual-expo-raisheva" value="<?=$SETTINGS['VIRTUAL_EXPO_RAISHEVA']?>" /></td>
                        </tr> 

                        <tr><td colspan="2"><hr></td></tr>
                        

                        <tr>
                            <td class="adm-detail-content-cell-l">Токен Telegram Bot</td>
                            <td class="adm-detail-content-cell-r"><input type="text" size="90" id="token-telegram" value="<?=$SETTINGS['TOKEN_TELEGRAM']?>" /></td>
                        </tr>        
                    </tbody>
                </table>

              </div>
        </div>
    </div>
</div>

<div class="adm-detail-content-btns-wrap" id="" style="left: 0px;">
    <div class="adm-detail-content-btns">
        <!-- <div onclick="tabControl.ToggleFix('bottom')" class="adm-detail-pin-btn" title="Открепить панель"></div> -->
        <input type="submit" value="Сохранить" class="adm-btn-save" onclick="saveSettings()">
        <!-- <input type="submit" name="apply" value="Применить" title="Сохранить и остаться в форме"> -->
        <span id="action-result"></span>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="/local/services/settings/script.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin.php");?>