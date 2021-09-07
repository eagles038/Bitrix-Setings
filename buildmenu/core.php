<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

foreach (explode("|", $_POST['names']) as $value) {
	$v = explode("@", $value);
	$mResult[$v[0]]['name'] = $v[1];
	$mResult[$v[0]]['link'] = $v[2];
}

$json = json_encode($mResult, JSON_UNESCAPED_UNICODE);
echo $json;

$el = new CIBlockElement;
$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "PREVIEW_TEXT"   => $_POST['arr'],
  "DETAIL_TEXT"    => $json,
);
$res = $el->Update(126, $arLoadProductArray);

if ($res) {
	echo "OK";
}else{
	echo "Error";
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>