<?

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');

include('config_site.php');


if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")){ 

        $to = $admin_mail; 
        $to2 = $admin_mail_dop;

		
$introtext = htmlspecialchars($_POST['message']); 
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$city = htmlspecialchars($_POST['city']);
$form_page = htmlspecialchars($_POST['form_page']);
$form_page_name = htmlspecialchars($_POST['form_page_name']);



 if ($_POST['form_id'] == 1) {	

$subject = "Заказ звонка с сайта ".$_SERVER['HTTP_HOST'];

        $message = '
Отправлено сообщение:
<br /><br />Имя клиента: '.$name.'
<br />Телефон клиента: '.$phone.''; 



require ('phpmiler/class.phpmailer.php');

$mail = new PHPMailer();
$mail->FromName = 'Заказ звонка с сайта '.$_SERVER['HTTP_HOST'];
$mail->AddAddress($to);
$mail->IsHTML(true);
$mail->From = $noreply_mail;
$mail->CharSet = 'utf-8';
$mail->Subject = $subject; 
$mail->Body = $message;

 if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);

$mail = new PHPMailer();
$mail->FromName = 'Заказ звонка с сайта '.$_SERVER['HTTP_HOST'];
$mail->AddAddress($to2);
$mail->IsHTML(true);
$mail->From = $noreply_mail;
$mail->CharSet = 'utf-8';
$mail->Subject = $subject;  
$mail->Body = $message;

 if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);

		
		
 }	elseif ($_POST['form_id'] == 2) {	

$subject = "Добавлен отзыв на сайте ".$_SERVER['HTTP_HOST'];

        $message = '
Добавлен отзыв:
<br /><br />Имя клиента: '.$name.'
<br />Email клиента: '.$email.'
<br />Телефон клиента: '.$phone.'
<br /><br />Отзыв: '.$introtext.'

'; 



require ('phpmiler/class.phpmailer.php');

$mail = new PHPMailer();
$mail->FromName = 'Сообщение с сайта '.$_SERVER['HTTP_HOST'];
$mail->AddAddress($to);
$mail->IsHTML(true);
$mail->From = $noreply_mail;
$mail->CharSet = 'utf-8';
$mail->Subject = $subject; 
$mail->Body = $message;

 if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);

$mail = new PHPMailer();
$mail->FromName = 'Сообщение с сайта '.$_SERVER['HTTP_HOST'];
$mail->AddAddress($to2);
$mail->IsHTML(true);
$mail->From = $noreply_mail;
$mail->CharSet = 'utf-8';
$mail->Subject = $subject;  
$mail->Body = $message;

 if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);

		
		
 }		
		
		
}
?>




