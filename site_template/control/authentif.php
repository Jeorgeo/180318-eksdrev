<?php
defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );

global $db, $smarty;

if (isset($task) && $task == 'logout') {

        setcookie("id");
        setcookie("hash");
        setcookie("name");
		echo ('<meta http-equiv="refresh" content="1;URL=http://'.$_SERVER['HTTP_HOST'].'">');
        
		
		
		
}

if (!isset($_COOKIE['id']) and !isset($_COOKIE['hash'])) {
	$smarty->assign('msg',_NO_COOKIE);
	auth();
}

	$result = $db->query("SELECT * FROM #__users WHERE `id`='".intval($_COOKIE['id'])."' LIMIT 1");
	$userdata = mysql_fetch_assoc($result);

    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600, "/");
        setcookie("hash", "", time() - 3600, "/");
        auth();
    }
	
    if($userdata['id'] == $_COOKIE['id'])
    {
	 if($userdata['hash'] == $_COOKIE['hash'])	{
        setcookie("id", $userdata['id'], time() + 604800, "/");
        setcookie("hash", $userdata['hash'], time() + 604800, "/");
        $group = $db->loadObject('#__users_group',$userdata['id_group']);      
        
        $_SESSION['gr'] = $group->allow;
        $_SESSION['us'] = $userdata['id'];
    }}
	
	
	
//$smarty->assign('USER_NAME',$_COOKIE['name']);

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
} 
    
function auth () {
global $db, $smarty,$base_url;

if(isset($_POST['submit']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
	$result = $db->query("SELECT id,passwd,name,id_group FROM #__users WHERE `login`='".mysql_real_escape_string($_POST['log'])."' AND `published`='1' LIMIT 1");
	$data = '';
	$data = mysql_fetch_assoc($result);    
    
    # Соавниваем пароли
    if($data['passwd'] === md5(md5(trim($_POST['pwd']))))
    {
    	session_start();
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        
        # Записываем в БД новый хеш авторизации и IP
        $db->update(array('hash' => $hash),'#__users',"`id`='".$data['id']."'");        
        # Ставим куки
        setcookie("id", $data['id'], time()+604800);
        setcookie("hash", $hash, time()+604800);
        //setcookie("name", $data['name'], time()+3500);  
        //Получим группу и разрешение
        $group = $db->loadObject('#__users_group',$data['id_group']);      
        
        $_SESSION['gr'] = $group->allow;
        $_SESSION['us'] = $data['id'];
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: index.php"); exit();
    }
    else
    {
    	$smarty->assign('msg',_NO_LOGIN);
    }
}
$smarty->assign('path',$base_url);
$smarty->display('auth.tpl');
exit();
}
?>     	