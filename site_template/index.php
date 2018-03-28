<?php


 
 
define ('_MANAGE_MODE','1');
include ('config_site.php');

include($abs_path.'/tadjiki/clients/clients.php');

$_GET['page'] = transfersruseng($_GET['page']);

$page = $_GET['page'];
$err = new error;
$html = new html;
// Start Smarty
require_once($abs_path.'/libra/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $abs_path.'/template/';
$smarty->compile_dir = $abs_path.'/shablon_c/'; 	
// обрабатываем модули

include($abs_path.'/tadjiki/content/content.php');

$sets['counter']['value'] = stripslashes($sets['counter']['value']);
$sets['caption']['value'] = stripslashes($sets['caption']['value']);
$sets['informer']['value'] = stripslashes($sets['informer']['value']);

include ($abs_path.'/tadjiki/all/all.php');
include ($abs_path.'/tadjiki/all/copy.php');

$smarty->assign('clients_passw',$clients_passw);
if ($clients_passw == 2) {$smarty->assign('clients_passw_sess',$clients_passw_sess);}
$smarty->assign('mod',$mod);
$smarty->assign('gorodoblast',$gorod);
$smarty->assign('base_url',$base_url);
$smarty->assign('Sort_count',$Sort_count);
$smarty->assign('Sort_id',$Sort_id);
$smarty->assign('sets',$sets);
$smarty->assign('path',$base_url);
$smarty->assign('sape',$sape);
$smarty->assign('clients',$clients);
$smarty->assign('clients_group',$clients_group);
$smarty->assign('clients_price',$clients_price);

if (!empty($page)) {
$smarty->display($template_lang.'/index_x.tpl');
} else { // либо главная	
$smarty->display($template_lang.'/index.tpl');
}



?>