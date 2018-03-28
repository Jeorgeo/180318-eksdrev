<?php
if ($_SESSION['gr'] == '0') { 


defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );


global $db,$err;
if (!empty($_POST['id'])) {
	$id = intval($_POST['id']);
} else {
	$id = intval($_GET['id']);
}

switch ($task) {
	case 'delete':
		$db->delete("#__reklama","`id` = '$id'");
		list_reklama();
	    break;	
	case 'publish':
		$db->update(array('`published`' => '1'),"#__reklama","`id` = '$id'");
		list_reklama();
		break;
	case 'unpublish':
		$db->update(array('`published`' => '0'),"#__reklama","`id` = '$id'");
		list_reklama();
	break;	
	case 'add-category':
		edit_category($id);
	break;
	case 'edit-category':
		edit_category($id);
	break;			
	case 'save-category':
		save_category($id);
		list_category();
	break;	
	case 'delete-category':
		$db->delete("#__reklama_category","`id` = '$id'");
		list_category();
	    break;	
	case 'publish-category':
		$db->update(array('`published`' => '1'),"#__reklama_category","`id` = '$id'");
		list_category();
		break;
	case 'unpublish-category':
		$db->update(array('`published`' => '0'),"#__reklama_category","`id` = '$id'");
		list_category();
	break;		
	case 'category':
		list_category();
	break;
	default:
		list_reklama();
	break;
}

}

function save_category($id='') {
	global $db,$err,$smarty,$abs_path;

$temp_link = transfersruseng($db->escape($_POST['name']));	
	
	$temp_dl = $temp_link; $temp_dd = 0; $temp_dq = 1; 
	
while ($temp_dd < 1) {

$result2 = $db->query("SELECT *, count(*) as count FROM #__reklama_category WHERE name = '".$temp_link."' AND id != '".intval($id)."' ");
$content2 = $db->loadAssocList($result2); $content2 = $content2[0];

$result_count = $content2['count'];

if ($result_count == 0) {
$temp_dd = 1; $temp_link2 = $temp_link;
} else {
$temp_link = $temp_dl.'_'.$temp_dq;
}
$temp_dq = $temp_dq + 1;
}

	$fields['name'] = $temp_link2;

	
	if ($id != 0 ) {
		$fields['text'] = str_replace ("'", "\'", $_POST['text']);
		$db->update($fields,'#__reklama_category',"`id` = '$id'");
	} else {
		$fields['text'] = str_replace ("'", "\'", $_POST['text']);
if ((strlen($fields['name']) > 3) AND (strlen($fields['text']) > 3)) {
		$db->insert($fields,"#__reklama_category");		
}
	}
	
	
	
}

function edit_category($id='') {
	global $db,$smarty,$html,$abs_path,$base_url,$photo_path;
	
	if (! empty($id)) {
		$category = $db->loadObject('#__reklama_category',$id);
		$smarty->assign('category',$category);
		$blok_id = '#'.$id;
	} else {
		$blok_id = '';
	}
	
	
	
    $smarty->assign('text',$category->text);	
    $smarty->assign('blok_id',$blok_id);	
	
	$smarty->assign('caption',"Чанк >> ".($id ? 'Редактирование':'Добавление'));
	$smarty->assign('content_template','reklama_category_add.tpl');
}

function list_category() {
global $db,$smarty,$err;




if (isset($_POST['oper'])) {	
	$cid =  $_POST['box'];
	$cids = 'id=' . implode( ' OR id=', $cid );
	switch ($_POST['oper']) {
		case 'unpub':
			$db->update(array('`published`' => '0'),"#__reklama_category",$cids);
		break;
		case 'pub':
			$db->update(array('`published`' => '1'),"#__reklama_category",$cids);
		break;
		case 'delete':
			$db->delete("#__reklama_category",$cids);
		break;		
	}
}




// generait menu
$menus = array(
    '1' => array ( 'action' => 'add', 'title' => _ADD),
);
$top_menu = new menu;
$top_menu->mod = 'reklama';
$top_menu->prefix = 'category';
$menu = $top_menu->create($menus);
$smarty->assign('menus',$menu);
$result = $db->query("SELECT * FROM #__reklama_category ORDER BY `id` DESC");
$categories = $db->loadAssocList($result,'id');
//Menu gereration
foreach ($categories as $category) {
	$action = array(
	  '1' => array ('action' => 'delete','title' => _DELETE),
	);

	if ($category['generalcategory'] != 0) {
			$result2 = $db->query("SELECT * FROM #__reklama_category WHERE id = '".$category['generalcategory']."' ORDER BY `name`");
			$categories2 = $db->loadAssocList($result2);
			$categories2 = $categories2[0];
			$category['headcat'] = $categories2['name'];
	} else {
	$category['headcat'] = 'нет';
	}
	
	$category['actions'] = $top_menu->create($action,$category['id']);
	$category_list[] = $category;
}
$smarty->assign('category_list',$category_list);
$smarty->assign('caption',"Чанки");
$smarty->assign('content_template','reklama_category_list.tpl');
	
}




?>