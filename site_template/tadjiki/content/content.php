<?php
defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );


if (!empty($_POST['page'])) {
	$page = $_POST['page'];
} else {
	$page = $_GET['page'];
}


$result = $db->query("SELECT c.* FROM #__settings as c WHERE c.id > 32 and c.id < 38 order by c.id ASC");
$category = $db->loadAssocList($result);
$template_lang = '_lang_1'; $pref_lang = ''; $url_logo = '/';
if ($page == '') {$indexpage_lang = 1;} else {$indexpage_lang = 0;}

	for ($io = 1; $io < count($category);$io++) {
	$row = $category[$io];
	$iol = $io + 1;
	
if (($page == $row['value_rezerv']) AND ($row['value_rezerv'] != ''))  {
header("HTTP/1.1 301");
header("Location: ".$base_url."/".$row['value_rezerv'].'/');
exit();
}
	
if (mb_substr($page, 0, mb_strlen(''.$row['value_rezerv'].'/')) == ''.$row['value_rezerv'].'/')  {

	
	$pref_lang = ''.$row['value_rezerv'].'/';
	$url_logo = '/'.$row['value_rezerv'].'/';
	$template_lang = '_lang_'.$iol;
	$id_lang = $iol;
	$page_lang = $page;
	$page = mb_substr($page, mb_strlen(''.$row['value_rezerv'].'/'), mb_strlen($page) - mb_strlen(''.$row['value_rezerv'].'/'));
	if ($page_lang == ''.$row['value_rezerv'].'/') {$indexpage_lang = 1;}
	}}
	

	for ($io = 1; $io < count($category);$io++) {
	$row = $category[$io];
	$iol = $io + 1;
	$smarty->assign('url_lang_'.$iol, '/'.$row['value_rezerv'].'/'.$page);
	}
	
	$smarty->assign('url_lang_1', '/'.$page);
	$smarty->assign('url_logo', $url_logo);
	$smarty->assign('page', $page);


$result = $db->query("SELECT name, text FROM #__reklama_category");
$chank = $db->loadAssocList($result);
for ($io = 0; $io < count($chank);$io++) {$smarty->assign('chank_'.$chank[$io]['name'],$chank[$io]['text']);}


$result = $db->query("SELECT * FROM #__main_category WHERE published = '1' ORDER BY id");
$main_content = $db->loadAssocList($result);
$main_content = translate_main_category($main_content, $id_lang, $pref_lang );
$smarty->assign('main_content',$main_content);	

$result = $db->query("SELECT id, value FROM #__settings");
$text_frontpage_old = $db->loadAssocList($result);

for ($io = 0; $io < count($text_frontpage_old);$io++) {$text_frontpage[$text_frontpage_old[$io]['id']] = $text_frontpage_old[$io]['value'];}

$smarty->assign('title', category_name ($category_name_array, $text_frontpage['1']));
$smarty->assign('keywords',$text_frontpage['3']);
$smarty->assign('description',$text_frontpage['2']);


if ($indexpage_lang == 1) {

	
$smarty->assign('content_template',$template_lang.'/'.'main.tpl');


} 

?>