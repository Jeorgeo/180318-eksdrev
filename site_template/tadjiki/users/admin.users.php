<?php


if ($_SESSION['gr'] == '0') { 

global $db,$err;


if (!empty($_POST['id'])) {
	$id = intval($_POST['id']);
} else {
	$id = intval($_GET['id']);
}


switch ($task) {
	case 'add':
		edit_users();
		break;
	case 'edit';
		edit_users($id);
		break;
	case 'save':
		save_users($id);
		list_users();
		break;
	case 'delete':
		$db->delete("#__users","`id` = '$id'");
		list_users();
	    break;	
	case 'publish':
		$db->update(array('`published`' => '1'),"#__users","`id` = '$id'");
		list_users();
		break;
	case 'unpublish':
		$db->update(array('`published`' => '0'),"#__users","`id` = '$id'");
		list_users();
		break;	
	case 'group':
		list_group();
		break;
	case 'add-group':
		edit_group();
		break;
	case 'edit-group';
		edit_group($id);
		break;	
	case 'save-group':
		save_group($id);
		list_group();
		break;	
	case 'delete-group':
		$db->delete("#__users_group","`id` = '$id'");
		list_group();
	    break;	
	case 'publish-group':
		$db->update(array('`published`' => '1'),"#__users_group","`id` = '$id'");
		list_group();
		break;
	case 'unpublish-group':
		$db->update(array('`published`' => '0'),"#__users_group","`id` = '$id'");
		list_group();
		break;
	case 'allow-group':
		list_allow();
		break;								
	default:
		list_users(intval($_GET['id']));
	break;	
}


} 

function list_users($id='') {
global $db,$smarty,$err,$abs_path;




if (isset($_POST['oper'])) {	
	$cid =  $_POST['box'];
	$cids = 'id=' . implode( ' OR id=', $cid );
	switch ($_POST['oper']) {
		case 'unpub':
			$db->update(array('`published`' => '0'),"#__users",$cids);
		break;
		case 'pub':
			$db->update(array('`published`' => '1'),"#__users",$cids);
		break;
		case 'delete':
			$db->delete("#__users",$cids);
		break;		
	}
}



// generait menu
$menus = array(
    '1' => array ( 'action' => 'add', 'title' => _ADD)/*,
    '2' => array('action' => 'group', 'title'=> _USER_GROUPS)*/
);
if (isset($id)) {
	$result = $db->query("SELECT count(*) as count FROM #__users as u, #__users_group as g WHERE u.id_group = g.id");
} else {
	$result = $db->query("SELECT count(*) as count FROM #__users as u, #__users_group as g WHERE u.id_group = g.id AND g.id=".$id);
}	
$rows = $db->loadAssocList($result);
$total = intval($rows[0]['count']);
if (!isset($_POST['count_sel'])) {
    $limit = 10;
} else {
	$limit = $_POST['count_sel'];
}

$limitstart = ($_GET['limitstart']) ? $_GET['limitstart'] : 0;
  if ($limit > $total) {
    $limitstart = 0;
  }
$top_menu = new menu;
$top_menu->mod = 'users';
$menu = $top_menu->create($menus);
$smarty->assign('menus',$menu);
if (empty($id)) {
	$result = $db->query("SELECT u.*,g.name as group_name FROM #__users as u, #__users_group as g WHERE u.id_group = g.id ORDER BY `id` LIMIT $limitstart,$limit");
} else {
	$result = $db->query("SELECT u.*,g.name as group_name FROM #__users as u, #__users_group as g WHERE u.id_group = g.id AND g.id=".$id." ORDER BY `id` LIMIT $limitstart,$limit");
}	
$users = $db->loadAssocList($result,'id');
//Menu gereration
foreach ($users as $user) {
	$action = array(
	  '1' => array ('action' => 'edit','title' => _EDIT),
	  '2' => array ('action' => 'delete','title' => _DELETE),
	);
	if ($user['published'] == 0) {
		$action[] = array ('action' => 'publish','title' => _PUBLISH);
		$user['pub'] = _UNPUB;
	} else {
		$action[] = array ('action' => 'unpublish','title' => _UNPUBLISH);
		$user['pub'] = _PUB;
	}
	$user['actions'] = $top_menu->create($action,$user['id']);
	$user_list[] = $user;
}
include_once($abs_path."/includes/incoc_pageNavigation.php" );
$pageNav = new pageNav( $total, $limitstart, $limit  );
$smarty->assign('page_nav',$pageNav->writePageLinks("index.php?mod=users&task=view"));
$smarty->assign('users',$user_list);
 $smarty->assign('caption',"Пользователи");
$smarty->assign('content_template','users_list.tpl');
}

function edit_users($id='') {
	global $db,$smarty;
	
	if (! empty($id)) {
		$user = $db->loadObject('#__users',$id);
		$smarty->assign('user',$user);
	}
// get GROUP
    $result = $db->query("SELECT id,name FROM #__users_group WHERE published='1'");
    $groups = $db->loadAssocList($result,'id');
    foreach ($groups as $group) {
    	$group_list[$group['id']] = $group['name'];
    }
    $smarty->assign('group',$group_list);	
     $smarty->assign('caption',"Пользователи >> ".($id ? 'Редактирование':'Добавление'));
	$smarty->assign('content_template','users_add.tpl');
}

function save_users($id='') {
	global $db,$err;
	if ($id != 0 ) {
		$fields = array();
		$fields['name'] = $db->escape($_POST['name']);
		$fields['login']= $db->escape($_POST['login']);
		$fields['email']= $db->escape($_POST['email']);
		$fields['phone_work']= $db->escape($_POST['phone_work']);		
		$fields['phone_home']= $db->escape($_POST['phone_home']);
		$fields['mobile']= $db->escape($_POST['mobile']);			
		$fields['id_group'] = intval($_POST['group']);
		if (!empty($_POST['newpasswd'])) {
			$fields['passwd'] = md5(md5(trim($_POST['newpasswd'])));
		}
		if ($id != '1') {
		$db->update($fields,'#__users',"`id` = '$id'");
		}
	} else {
		$result = $db->query("SELECT count(id) FROM #__users WHERE `login` = '".$db->escape($_POST['login'])."'");
		
		if (mysql_result($result, 0)>0 ) {
			$err->add (_USER_EXIST);
		} else {
		$fields = array();
		$fields['name'] = $db->escape($_POST['name']);
		$fields['login']= $db->escape($_POST['login']);
		$fields['email']= $db->escape($_POST['email']);
		$fields['phone_work']= $db->escape($_POST['phone_work']);		
		$fields['phone_home']= $db->escape($_POST['phone_home']);
		$fields['mobile']= $db->escape($_POST['mobile']);				
		$fields['id_group'] = intval($_POST['group']);
		$fields['passwd'] = md5(md5(trim($_POST['newpasswd'])));
		
if (strlen($fields['login']) > 3) {		
		$db->insert($fields,"#__users");
}		
		
		}		
	}
}

function list_group() {
global $db,$smarty;
// generait menu
$menus = array(
    '1' => array ( 'action' => 'add', 'title' => _ADD),
    '2' => array('action' => 'allow', 'title'=> _ALLOW)
);

$top_menu = new menu;
$top_menu->mod = 'users';
$top_menu->prefix = 'group';
//$smarty->assign('menus',$top_menu->create($menus));

$result = $db->query("SELECT * FROM #__users_group");
$groups = $db->loadAssocList($result,'id');
//Menu gereration
$action = array();
foreach ($groups as $group) { 
	$action = array(
	  '1' => array ('action' => 'edit','title' => _EDIT),
	  '2' => array ('action' => 'delete','title' => _DELETE),
	);
	if ($group['published'] == 0) {
		$action[] = array ('action' => 'publish','title' => _PUBLISH);
		$group['pub'] = _UNPUB;
	} else {
		$action[] = array ('action' => 'unpublish','title' => _UNPUBLISH);
		$group['pub'] = _PUB;
	}
//	$group['actions'] = $top_menu->create($action,$group['id']);
	$group_list[] = $group;
}
$smarty->assign('groups',$group_list);
$smarty->assign('caption',"Группы");
$smarty->assign('content_template','group_list.tpl');
}

function edit_group($id='') {
	global $db,$smarty;
	
	if (! empty($id)) {
		$group = $db->loadObject('#__users_group',$id);
		$smarty->assign('group',$group);
	}
	$smarty->assign('content_template','group_add.tpl');
}

function save_group($id='') {
	global $db;
	if ($id != 0 ) {
		$fields = array();
		$fields['name'] = $db->escape($_POST['name']);
		$db->update($fields,'#__users_group',"`id` = '$id'");
	} else {
		$fields = array();
		$fields['name'] = $db->escape($_POST['name']);
		$db->insert($fields,"#__users_group");		
	}
}

function list_allow() {
	global $db,$smarty,$g_action;
	
	$result = $db->query("SELECT id,name as title FROM #__users_group WHERE `published`='1'");
	$groups = $db->loadAssocList($result);
	$result = $db->query("SELECT id,name as title FROM #__module WHERE `published`='1' and `parent`='0'");
	$modules = $db->loadAssocList($result);
	$result = $db->query("SELECT * FROM #__allow_action");
	$allow_action = $db->loadAssocList($result,'id');
	
	$allows = array();
	foreach ($groups as $group) {
		foreach ($modules as $module) {
			$module['action'] = $g_action;
			$group['module'][] = $module;
		}
		$allows[] = $group;
	}
	$smarty->assign('content_template','allow.tpl');
}





?>