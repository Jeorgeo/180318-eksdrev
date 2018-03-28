<?php
defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );

global $db,$smarty;

if ($_SESSION['gr'] == 0) {
	$result = $db->query("SELECT id, groups FROM #__module WHERE `published`='1' AND `groups` != '' ORDER BY `groups`" );
} else {
	$result = $db->query("SELECT m.id as id, m.groups as groups FROM #__module as m LEFT JOIN #__users_allow as a ON m.id=a.id_module WHERE m.published='1' AND m.groups != '' AND a.id_users='".$_SESSION['gr']."'  ORDER BY m.groups" );	
}	
$groups = $db->loadAssocList($result,'groups');

$menu_link = $_SERVER['QUERY_STRING'];
if ((substr_count($menu_link,"content") > 0) AND (substr_count($menu_link,"category") > 0)) {
$tmp = array(); $tmp[0] = 'mod=content&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '22'";
} elseif ((substr_count($menu_link,"brend") > 0)) {
$tmp = array(); $tmp[0] = 'mod=brend&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '5'";
} elseif ((substr_count($menu_link,"kontakt") > 0)) {
$tmp = array(); $tmp[0] = 'mod=kontakt&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '62'";
} elseif ((substr_count($menu_link,"charact") > 0)) {
$tmp = array(); $tmp[0] = 'mod=charact&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '30'";
} elseif ((substr_count($menu_link,"reklama") > 0) AND (substr_count($menu_link,"category") > 0)) {
$tmp = array(); $tmp[0] = 'mod=content&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '48'";
} elseif ((substr_count($menu_link,"bill") > 0) AND (substr_count($menu_link,"category") > 0)) {
$tmp = array(); $tmp[0] = 'mod=content&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '66'";
} elseif ((substr_count($menu_link,"slider") > 0) AND (substr_count($menu_link,"category") > 0)) {
$tmp = array(); $tmp[0] = 'mod=content&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '67'";
} elseif ((substr_count($menu_link,"images") > 0) AND (substr_count($menu_link,"category") > 0)) {
$tmp = array(); $tmp[0] = 'mod=content&task=category'; 
$qwerty = "SELECT * FROM reg_module WHERE `id` = '73'";
} else {
$tmp = explode('&',$menu_link);
$qwerty = "SELECT * FROM reg_module WHERE `menu_link` = '".$db->escape($tmp[0])."'";
}

$result = $db->query($qwerty);
$currents = $db->loadObjectList($result);

if (empty($currents)) {
	$current = 0;
	$parent = 0;
} else {
	$current = $currents[0]->id;
	$parent = $currents[0]->parent;
}

$meny_list = array();

$menu_items[] = Array( 'id' => '25', 'group' => '0', 'name' => 'Мои объявления', 'class' => 'menu-posts', 'parent' => '0', 'module' => '', 'menu_link' => 'mod=content', 'published' => '1', 'ordering' => '101');
 
$menu_items[] = Array( 'id' => '26', 'group' => '0', 'name' => 'Сообщения', 'class' => 'menu-posts', 'parent' => '0', 'module' => '', 'menu_link' => 'mod=comment&form_id=3', 'published' => '1', 'ordering' => '101');
 
$menu_items[] = Array( 'id' => '27', 'group' => '0', 'name' => 'Заказы звонка', 'class' => 'menu-posts', 'parent' => '0', 'module' => '', 'menu_link' => 'mod=comment&form_id=2', 'published' => '1', 'ordering' => '101');
 
$menu_items[] = Array( 'id' => '28', 'group' => '0', 'name' => 'Статистика просмотров', 'class' => 'menu-posts', 'parent' => '0', 'module' => '', 'menu_link' => 'mod=content', 'published' => '1', 'ordering' => '101');
 if ($_SESSION['gr'] == 0) {  
$menu_items[] = Array( 'id' => '29', 'group' => '0', 'name' => 'Добавить менеджера', 'class' => 'menu-posts', 'parent' => '0', 'module' => '', 'menu_link' => 'mod=users', 'published' => '1', 'ordering' => '101');
 }
 
 
 
$menu = array('id' => '0', 'name'=>'Быстрая навигация','parent' => '0','style'=>'wp-has-submenu menu-top wp-has-current-submenu wp-menu-open menu-top-first menu-top-last ','class'=>'menu-dashboard','count_items'=>'1', 'items'=>$menu_items);

if ($current == 0) {
	$menu['current'] = '1';
	$menu['style'] .= 'current';
}
/*
$menu_list[] = $menu;
*/
foreach ($groups as $group) {
	
$menu = array('type'=>'separator');
$menu_list[] = $menu;


	$result = $db->query("SELECT * FROM #__module WHERE published = '1' AND `groups` = '".$group['groups']."' ORDER BY `parent`,`ordering`");
	$menus = $db->loadTreeList($result);
	

		
	



$i = 1;
$count = count($menus);
foreach ($menus as $menu) {
	$menu['count_items'] = count($menu['items']);
	if (($menu['id'] == $current && $current  != 0) || ($menu['id'] == $parent && $parent !=0)) {
		if ($parent != 0) {
			$menu['items'][$current]['style'] = 'current';	
		}
		$menu['style'] .= 'wp-has-current-submenu ';
	 
		if (count($menu['items'] >0 )) {
			$menu['style'] .= 'wp-menu-open ';
			$menu['menu2'] = '1';
		} else {
			$menu['menu2'] = '0';
		}		
	}
	if ($i == 1) {
		$menu['style'] .= 'menu-top-first ';
	}; 
	if ($i == $count) {
		$menu['style'] .= 'menu-top-last ';
	};
	if ($menu['id'] == '65' and $_SESSION['gr'] != '0') {} else {$menu_list[] = $menu;}
	$i++;
}
}

$smarty->assign('menu_list',$menu_list);
$smarty->assign('session_us',$_SESSION['us']);
$smarty->assign('session_gr',$_SESSION['gr']);
$smarty->assign('REQUEST_URI', str_replace('/control/index.php?', '', $_SERVER['REQUEST_URI']));




if ($_SESSION['gr'] == '0') { 
$smarty->assign('session_mg','Администратор');
} else {
$smarty->assign('session_mg','Менеджер');
}

	if (! empty($_SESSION['us'])) {
		$user = $db->loadObject('#__users',$_SESSION['us']);
		$smarty->assign('session_user',$user);
	}
	

	$countresult1qq = $db->query("SELECT id, name FROM #__users ORDER BY name");
	$countcategories1qq = $db->loadAssocList($countresult1qq); 
	

	
$smarty->assign('useritems',$countcategories1qq);	

	
	
	
?>