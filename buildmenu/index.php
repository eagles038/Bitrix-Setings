<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Формирование верхнего меню");

?>
<link href="/local/services/buildmenu/styles.css" type="text/css" rel="stylesheet" />

<?
$menu1 = ELEMENTS::getField(126, "PREVIEW_TEXT");
$names1 = ELEMENTS::getField(126, "DETAIL_TEXT");

$menu1 = str_replace('&quot;', '"', $menu1); $menu = (array)json_decode($menu1); 
$names1 = str_replace('&quot;', '"', $names1); $names = (array)json_decode($names1); 
/*
echo "<pre>";
print_r($menu);
print_r($names);*/
?>


<button type="button" onclick="addItem()">Добавить</button>
<?
echo '<br>';



/*
foreach ($menu as $value) {
    if (isset($value->children)) {

        echo $value->id; echo '<br>';


        foreach ($value->children as $val) {
            if (isset($val->children)) {

                echo '-'.$val->id; echo '<br>';

                foreach ($val->children as $v) {

                    echo '--'.$v->id; echo '<br>';

                }
            }else{

                echo '-'.$val->id; echo '<br>';

            }
        }
    }else{?>
        
        <?=li($value->id, $names)?>

    <?}
}*/

?>

<style>
.action-delete {
  position: absolute;
  right: 10px;
  top: 10px;
  cursor: pointer;
}
</style>


<div class="cf nestable-lists">
  <div class="dd" id="nestable3">
    <ol id="ol" class="dd-list">




<?
foreach ($menu as $value) {
    if (isset($value->children)) {?>
        <li class="dd-item dd3-item" data-id="<?=$value->id?>">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
                <span class="">Пункт меню: <input type="text" class="name" value="<?=$names[$value->id]->name?>" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="<?=$names[$value->id]->link?>" /></span>
                <span class="action-delete" onclick="deleteItem(<?=$value->id?>)"> Х </span>
            </div>
            <ol class="dd-list">



                        <?foreach ($value->children as $val) {
                            if (isset($val->children)) {?>
                                    <li class="dd-item dd3-item" data-id="<?=$val->id?>">
                                      <div class="dd-handle dd3-handle"></div>
                                      <div class="dd3-content">
                                          <span class="">Пункт меню: <input type="text" class="name" value="<?=$names[$val->id]->name?>" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="<?=$names[$val->id]->link?>" /></span>
                                          <span class="action-delete" onclick="deleteItem(<?=$val->id?>)"> Х </span>
                                      </div>
                                      <ol class="dd-list">



                                              <?foreach ($val->children as $v) {?>
                                                  <li class="dd-item dd3-item" data-id="<?=$v->id?>">
                                                      <div class="dd-handle dd3-handle"></div>
                                                      <div class="dd3-content">
                                                          <span class="">Пункт меню: <input type="text" class="name" value="<?=$names[$v->id]->name?>" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="<?=$names[$v->id]->link?>" /></span>
                                                          <span class="action-delete" onclick="deleteItem(<?=$v->id?>)"> Х </span>
                                                      </div>
                                                  </li>
                                              <?}?>
                                      </ol>
                                    </li>
                            <?}else{?>
                                <li class="dd-item dd3-item" data-id="<?=$val->id?>">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">
                                        <span class="">Пункт меню: <input type="text" class="name" value="<?=$names[$val->id]->name?>" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="<?=$names[$val->id]->link?>" /></span>
                                        <span class="action-delete" onclick="deleteItem(<?=$val->id?>)"> Х </span>
                                    </div>
                                </li>
                            <?}
                        }?>
            </ol>
        </li>
    <?}else{?>        
        <li class="dd-item dd3-item" data-id="<?=$value->id?>">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
                <span class="">Пункт меню: <input type="text" class="name" value="<?=$names[$value->id]->name?>" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="<?=$names[$value->id]->link?>" /></span>
                <span class="action-delete" onclick="deleteItem(<?=$value->id?>)"> Х </span>
            </div>
        </li>
    <?}
}
?>

<br>
<button type="button" onclick="saveMenu()">Сохранить</button>
<span id="action-result"></span>
<textarea style="display: none;" id="nestable3-output"></textarea>





<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="/local/services/buildmenu/script.js"></script>



<script>
  // activate Nestable for list 1
/*$('#nestable').nestable({
    group: 1
  })
  .on('change', updateOutput);
*/

var ARR='';

var updateOutput = function(e) {
  var list = e.length ? e : $(e.target),
    output = list.data('output');
  if (window.JSON) {
    ARR = window.JSON.stringify(list.nestable('serialize'));
    saveNames();
    //output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
  } else {
    output.val('JSON browser support required for this demo.');
  }
};








$('#nestable-menu').on('click', function(e) {
  var target = $(e.target), action = target.data('action');
  if (action === 'expand-all') { $('.dd').nestable('expandAll');  }
  if (action === 'collapse-all') { $('.dd').nestable('collapseAll'); }
});
$('#nestable3').nestable({
  group: 1,
  maxDepth: 3
}).on('change', updateOutput);


//updateOutput($('#nestable').data('output', $('#nestable-output')));

//updateOutput($('#nestable3').data('output', $('#nestable3-output')));





//console.log(ARR);


function deleteItem(x){
  $('[data-id="'+x+'"]').remove();
}




function addItem(){
  let id = AT_RANDOM(['1','2','3','4','5','6','7','8','9']);
  $('#ol').prepend(`
    <li class="dd-item dd3-item" data-id="${ id }">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">
            <span class="">Пункт меню: <input type="text" class="name" value="" />&nbsp;&nbsp;&nbsp;Ссылка: <input type="text" class="link" value="" /></span>
            <span class="action-delete" onclick="deleteItem(${ id })"> Х </span>
        </div>
    </li>
  `);
}




function saveMenu(){
  updateOutput($('#nestable3').data('output', $('#nestable3-output')));
  $.post('/local/services/buildmenu/core.php', {arr: ARR, names: saveNames()}, function(data){
    console.log(data);
    $('#action-result').html(`   Данные сохранены`);
  });
}


function saveNames(){

    var li;
    var obj = {};
    var str = '';

    $.each($('#nestable3 ol li'),function(index,value){
      li = $(value);
      str = str + li.data('id') +'@'+ li.find('input.name').val() + '@'+ li.find('input.link').val() +'|';
    });

str = str.slice(0, -1);
return str;

  
}






function AT_RANDOM(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i]; a[i] = a[j]; a[j] = x;
    }
    return a.join('');
}
AT_RANDOM(['0','1','2','3','4','5','6','7','8','9']);



</script>





























<?
require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin.php");
?>
