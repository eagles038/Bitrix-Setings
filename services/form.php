<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule("iblock");?> 

<?

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$event = $_POST['event'];
$quantity = $_POST['quantity'];
$date = $_POST['date'];

$check_email = $_POST['check_email'] == 'on' ? 'Да' : 'Нет';
$check_phone = $_POST['check_phone'] == 'on' ? 'Да' : 'Нет';



switch ($iblock) {
	case 41: //Обратная связь

		$el = new CIBlockElement;

		$PROP = array();
		$PROP['EMAIL'] = $email;
		$PROP['PHONE'] = $phone;
		$PROP['C_EMAIL'] = $check_email;
		$PROP['C_PHONE'] = $check_phone;

		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,
		  "IBLOCK_ID"      => $iblock,
		  "PROPERTY_VALUES"=> $PROP,
		  "NAME"           => $name,
		  "ACTIVE"         => "Y",
		  "PREVIEW_TEXT"   => $message,
		);

		if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arr['new_id'] = $PRODUCT_ID;
		else $arr['error'] = $el->LAST_ERROR;

		if (($check_email  == 'Да') and ($check_phone  == 'Да')) {
			$body = '
			<html>
				<body>
					<p>Имя: '.$name.'</p>
					<p>Электропочта: '.$email.'</p>
					<p>Телефон: '.$phone.'</p>
					<p>Сообщение: '.$message.'</p>
					<hr>
					<p>Куда удобнее получить ответ:</p>
					<p>Электропочта: '.$check_email.'</p>
					<p>Телефон: '.$check_phone.'</p>
				</body>
			</html>
			';
		} elseif($check_email == 'Да') {
			$body = '
			<html>
				<body>
					<p>Имя: '.$name.'</p>
					<p>Электропочта: '.$email.'</p>
					<p>Телефон: '.$phone.'</p>
					<p>Сообщение: '.$message.'</p>
					<hr>
					<p>Куда удобнее получить ответ:</p>
					<p>Электропочта: '.$check_email.'</p>
				</body>
			</html>
			';
		} elseif ($check_phone  == 'Да') {
			$body = '
			<html>
				<body>
					<p>Имя: '.$name.'</p>
					<p>Электропочта: '.$email.'</p>
					<p>Телефон: '.$phone.'</p>
					<p>Сообщение: '.$message.'</p>
					<hr>
					<p>Куда удобнее получить ответ:</p>
					<p>Телефон: '.$check_phone.'</p>
				</body>
			</html>
			';
		}

	break;
	
	case 42: //Заказать услугу

		$el = new CIBlockElement;

		$PROP = array();
		$PROP['EMAIL'] = $email;
		$PROP['PHONE'] = $phone;
		$PROP['EVENT'] = $event;
		$PROP['QUANTITY'] = $quantity;
		$PROP['DATE'] = $date;

		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,
		  "IBLOCK_ID"      => $iblock,
		  "PROPERTY_VALUES"=> $PROP,
		  "NAME"           => $name,
		  "PREVIEW_TEXT"   => $message,		  
		);

		if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arr['new_id'] = $PRODUCT_ID;
		else $arr['error'] = $el->LAST_ERROR;

		$body = '
		<html>
		    <body>
		        <p>Имя: '.$name.'</p>
		        <p>Электропочта: '.$email.'</p>
		        <p>Телефон: '.$phone.'</p>
		        <p>Комментарий: '.$message.'</p>
		        <p>Мероприятие: '.$event.'</p>
		        <p>Кол-во человек: '.$quantity.'</p>
		        <p>Дата посещения: '.$date.'</p>		        
		    </body>
		</html>
		';
	break;

	case 43: //Отзывы
		$el = new CIBlockElement;

		$PROP = array();
		$PROP['EMAIL'] = $email;

		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,
		  "IBLOCK_ID"      => $iblock,
		  "PROPERTY_VALUES"=> $PROP,
		  "ACTIVE"         => "N", 
		  "NAME"           => $name,
		  "PREVIEW_TEXT"   => $message,		  
		);

		if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arr['new_id'] = $PRODUCT_ID;
		else $arr['error'] = $el->LAST_ERROR;
		$body = '
		<html>
		    <body>
		        <p>Имя: '.$name.'</p>
		        <p>Электропочта: '.$email.'</p>
		        <p>Комментарий: '.$message.'</p>
		    </body>
		</html>
		';
	break;

	case 44: //Подписка на рассылку
		$el = new CIBlockElement;

		$PROP = array();
		$PROP['EMAIL'] = $email;

		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,
		  "IBLOCK_ID"      => $iblock,
		  "PROPERTY_VALUES"=> $PROP,
		  "NAME"           => $name,		  
		);

		if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arr['new_id'] = $PRODUCT_ID;
		else $arr['error'] = $el->LAST_ERROR;
		$body = '
		<html>
		    <body>
		        <p>Имя: '.$name.'</p>
		        <p>Электропочта: '.$email.'</p>		        
		    </body>
		</html>
		';
	break;


}

$json = json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $json;
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/local/services/smtpmail.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>