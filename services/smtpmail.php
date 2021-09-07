<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;

$mail->Username = 'ghm-hmao@m42.cx';
$mail->Password = 'En2ja3LXg4wUxUE';

// От кого
$mail->setFrom('ghm-hmao@m42.cx', $name);
// Кому

// ghm-pr@ghm-hmao.ru
 

$mail->addAddress($SETTINGS['ADMIN_EMAIL'], '');



//$mail->addAddress('79643243045@yandex.ru', 'Иван Петров');

/*
name: 55
halls: 
dis: 
email: 79643243045@yandex.ru
cost: 1
q: 1
order_id: 1596
date: 16.08.21 14:42:08
num_t: 611A32F090DAA
orderId: 5bdc9a43-11bf-7fbf-9cdd-474202907300
lang: ru
*/

// Тема письма
$mail->Subject = $theme;//$subject;

$theme = $_REQUEST['theme'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$message = $_REQUEST['message'];
$event = $_REQUEST['event'];


$cost = $_REQUEST['cost'];
$quantity = $_REQUEST['q'];
$order_id = $_REQUEST['order_id'];
$num_t = $_REQUEST['num_t'];

$halls = $_REQUEST['halls'];
$type = $_REQUEST['type_tc'];

$date = $_REQUEST['date'];
$check_email = $_REQUEST['check_email'];
$check_phone = $_REQUEST['check_phone'];


$mail->msgHTML($body);
$mail->send();


// Тело письма
// $body = '
// <html>
//     <head>
//         <title>Письмо</title>
//     </head>
//     <body>
//         <p>Письмо с сайта ГХМ</p>
//         <p>Имя: '.$name.'</p>
//         <p>Электронная почта: '.$email.'</p>
//         <p>Телефон: '.$phone.'</p>
//         <p>Сообщение: '.$message.'</p>
//         <p>Событие: '.$event.'</p>
//         <p>Количество: '.$quantity.'</p>
//         <p>Тип билета: '.$type_tc.'</p>
//         <p>Залы: '.$halls.'</p>
//     </body>
// </html>';





// if ($email!='') {
//         $mail->Subject = $theme;
//         $mail->addAddress($email, '');
//         $body = '
//         <html>
//             <head>
//                 <title>Электронный билет в Государственный художественный музей</title>
//             </head>
//             <body>
//                  <p>Электронный билет действителен для однократного прохода в обозначенный музей для получения выбранной услуги. Рекомендуется прибыть заранее.</p>

//                  <p>Билет можно распечатать или сохранить в электронном виде на мобильном устройстве. Для
//                  прохода в музей необходимо предъявить электронный билет администратору.</p>
//                  
//                  <p>При возникновении вопросов, связанных с приобретением или возвратом билетов, обращайтесь в рабочее время музея по телефону +7 (3467) 33-08-68 или по почте ghm-hmao@mail.ru
//                  С правилами посещения музея, прейскурантом цен, информации о предоставляемых льготах или другой необходимой информацией можно ознакомиться на официальном сайте музея ghm-hmao.ru
//                  Убедитесь, что получение услуги согласовано со специалистом по телефону +7 (3467) 33-08-68.</p>
                
//                 <p>Событие: '.$event.'</p>
//                 <p>Количество: '.$quantity.'</p>
                
//                 <p>Залы: '.$halls.'</p>
//             </body>
//         </html>';

//         $mail->msgHTML($body);
//         $mail->send();

// }



header('Location: https://www.ghm-hmao.ru/tickets/uspeshnaya-otpravka/');
//header('Location: /');
?>