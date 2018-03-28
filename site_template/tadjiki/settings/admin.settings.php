<?php


if ($_SESSION['gr'] == '0') { 



defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );

global $db,$err,$smarty;
if (!empty($_POST['id'])) {
	$id = intval($_POST['id']);
} else {
	$id = intval($_GET['id']);
}


// тестируем количество языков, создаем массив языков

	$result = $db->query("SELECT * FROM #__settings Where id <= 37 AND id >= 34 ");
	$langsetting = $db->loadAssocList($result,'id'); 
	$langsetting_val = 0;
	
	for($i=34; $i<38; $i++){if (strlen($langsetting[$i]['title']) > 1) {$langsetting_pref[] = '_'.($i-32); $langsetting_name[] = $langsetting[$i]['value']; $lang[] = $langsetting[$i]; $langsetting_val = 1;}}
	
$stylelangsetting = '<style type="text/css">.stylelangsetting{display:none;}</style>';

if ($langsetting_val == 1) {for ($im = 0; $im < count($langsetting_pref);$im++) {$stylelangsetting .= '<style type="text/css">#stylelangsetting'.$langsetting_pref[$im].'{display:block;}</style>';
	$smarty->assign('langsetting_name'.$langsetting_pref[$im].'',$langsetting_name[$im]);
}}

	$smarty->assign('stylelangsetting', $stylelangsetting);

switch ($task) {
	case 'save':
		save();
		edit();
		break;	
	
	default:
		edit();
	break;
}

}

function save() {
	global $db,$smarty,$abs_path;
	
	foreach ($_POST['set'] as $key=>$set) {
		$fields['value'] = str_replace('"', '&quot;', addslashes($set));  
		$db->update($fields,'#__settings',"`name` = '".$key."'");
	}
	
	$fields['value'] = $_POST['counter'];
	$db->update($fields,'#__settings',"`name` = 'counter'");
	
	$fields['value'] = $_POST['counter_2'];
	$db->update($fields,'#__settings',"`name` = 'counter_2'");
	
	$fields['value'] = $_POST['counter_3'];
	$db->update($fields,'#__settings',"`name` = 'counter_3'");
	
	$fields['value'] = $_POST['counter_4'];
	$db->update($fields,'#__settings',"`name` = 'counter_4'");
	
	$fields['value'] = $_POST['counter_5'];
	$db->update($fields,'#__settings',"`name` = 'counter_5'");
	
	$fields['value'] = $_POST['informer'];
	$db->update($fields,'#__settings',"`name` = 'informer'");
	
	$fields['value'] = $_POST['copyright'];
	$db->update($fields,'#__settings',"`name` = 'copyright'");	

	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv1']);
	$fields['value'] = addslashes($_POST['rezerv1']);
	$fields['title'] = addslashes($_POST['nrezerv1']);
	$db->update($fields,'#__settings',"`name` = 'rezerv1'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv2']);
	$fields['value'] = addslashes($_POST['rezerv2']);
	$fields['title'] = addslashes($_POST['nrezerv2']);
	$db->update($fields,'#__settings',"`name` = 'rezerv2'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv3']);
	$fields['value'] = addslashes($_POST['rezerv3']);
	$fields['title'] = addslashes($_POST['nrezerv3']);
	$db->update($fields,'#__settings',"`name` = 'rezerv3'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv4']);
	$fields['value'] = addslashes($_POST['rezerv4']);
	$fields['title'] = addslashes($_POST['nrezerv4']);
	$db->update($fields,'#__settings',"`name` = 'rezerv4'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv5']);
	$fields['value'] = addslashes($_POST['rezerv5']);
	$fields['title'] = addslashes($_POST['nrezerv5']);
	$db->update($fields,'#__settings',"`name` = 'rezerv5'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv6']);
	$fields['value'] = addslashes($_POST['rezerv6']);
	$fields['title'] = addslashes($_POST['nrezerv6']);
	$db->update($fields,'#__settings',"`name` = 'rezerv6'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv7']);
	$fields['value'] = addslashes($_POST['rezerv7']);
	$fields['title'] = addslashes($_POST['nrezerv7']);
	$db->update($fields,'#__settings',"`name` = 'rezerv7'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv8']);
	$fields['value'] = addslashes($_POST['rezerv8']);
	$fields['title'] = addslashes($_POST['nrezerv8']);
	$db->update($fields,'#__settings',"`name` = 'rezerv8'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv9']);
	$fields['value'] = addslashes($_POST['rezerv9']);
	$fields['title'] = addslashes($_POST['nrezerv9']);
	$db->update($fields,'#__settings',"`name` = 'rezerv9'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv10']);
	$fields['value'] = addslashes($_POST['rezerv10']);
	$fields['title'] = addslashes($_POST['nrezerv10']);
	$db->update($fields,'#__settings',"`name` = 'rezerv10'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv11']);
	$fields['value'] = addslashes($_POST['rezerv11']);
	$fields['title'] = addslashes($_POST['nrezerv11']);
	$db->update($fields,'#__settings',"`name` = 'rezerv11'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv12']);
	$fields['value'] = addslashes($_POST['rezerv12']);
	$fields['title'] = addslashes($_POST['nrezerv12']);
	$db->update($fields,'#__settings',"`name` = 'rezerv12'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv13']);
	$fields['value'] = addslashes($_POST['rezerv13']);
	$fields['title'] = addslashes($_POST['nrezerv13']);
	$db->update($fields,'#__settings',"`name` = 'rezerv13'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv14']);
	$fields['value'] = addslashes($_POST['rezerv14']);
	$fields['title'] = addslashes($_POST['nrezerv14']);
	$db->update($fields,'#__settings',"`name` = 'rezerv14'");
	
	$fields['value_rezerv'] = addslashes($_POST['rrezerv15']);
	$fields['value'] = addslashes($_POST['rezerv15']);
	$fields['title'] = addslashes($_POST['nrezerv15']);
	$db->update($fields,'#__settings',"`name` = 'rezerv15'");
	
	$fields['value_rezerv'] = transfersruseng(addslashes($_POST['rrezerv16']));
	$fields['value_val'] = addslashes($_POST['rezerv16_val']);
	$fields['value'] = addslashes($_POST['rezerv16']);
	$fields['title'] = addslashes($_POST['nrezerv16']);
	$db->update($fields,'#__settings',"`name` = 'rezerv16'");
	
	$fields['value_rezerv'] = transfersruseng(addslashes($_POST['rrezerv17']));
	$fields['value_val'] = addslashes($_POST['rezerv17_val']);
	$fields['value'] = addslashes($_POST['rezerv17']);
	$fields['title'] = addslashes($_POST['nrezerv17']);
	$db->update($fields,'#__settings',"`name` = 'rezerv17'");
	
	$fields['value_rezerv'] = transfersruseng(addslashes($_POST['rrezerv18']));
	$fields['value_val'] = addslashes($_POST['rezerv18_val']);
	$fields['value'] = addslashes($_POST['rezerv18']);
	$fields['title'] = addslashes($_POST['nrezerv18']);
	$db->update($fields,'#__settings',"`name` = 'rezerv18'");
	
	$fields['value_rezerv'] = transfersruseng(addslashes($_POST['rrezerv19']));
	$fields['value_val'] = addslashes($_POST['rezerv19_val']);
	$fields['value'] = addslashes($_POST['rezerv19']);
	$fields['title'] = addslashes($_POST['nrezerv19']);
	$db->update($fields,'#__settings',"`name` = 'rezerv19'");
	
	$fields['value_rezerv'] = transfersruseng(addslashes($_POST['rrezerv20']));
	$fields['value_val'] = addslashes($_POST['rezerv20_val']);
	$fields['value'] = addslashes($_POST['rezerv20']);
	$fields['title'] = addslashes($_POST['nrezerv20']);
	$db->update($fields,'#__settings',"`name` = 'rezerv20'");

	
	
		foreach ($_POST["box"] as $key=>$set) {
	unset($fields);
	$fields['id'] = addslashes($set);
	$fields['name'] = addslashes($_POST["box_name"][$key]);
	$fields['name_box'] = addslashes($_POST["box_name_box"][$key]);
	$fields['text'] = addslashes($_POST["box_text"][$key]);
	$fields['dop_text'] = addslashes($_POST["box_dop_text"][$key]);
	$fields['published'] = addslashes($_POST["box_published"][$key]);
		
	if ( $fields['id'] >= intval($_POST["last_id"])) {
	$db->insert($fields,"#__main_category");		
	} else {
	$db->update($fields,'#__main_category',"`id` = '$set'");
	}
		}
	
	
}

function edit() {
	global $db, $smarty;
	
	$result = $db->query("SELECT * FROM #__settings");
	$setting = $db->loadAssocList($result,'name');
	$smarty->assign('copyright', stripslashes($setting['copyright']['value']));
	$smarty->assign('sets',$setting);
	
	$smarty->assign('caption',stripslashes($setting['caption']['value']));
	$smarty->assign('counter',stripslashes($setting['counter']['value']));
	$smarty->assign('counter_2',stripslashes($setting['counter_2']['value']));
	$smarty->assign('counter_3',stripslashes($setting['counter_3']['value']));
	$smarty->assign('counter_4',stripslashes($setting['counter_4']['value']));
	$smarty->assign('counter_5',stripslashes($setting['counter_5']['value']));
	$smarty->assign('informer',stripslashes($setting['informer']['value']));
	$smarty->assign('rezerv1',stripslashes($setting['rezerv1']['value']));
	$smarty->assign('rezerv2',stripslashes($setting['rezerv2']['value']));
	$smarty->assign('rezerv3',stripslashes($setting['rezerv3']['value']));
	$smarty->assign('rezerv4',stripslashes($setting['rezerv4']['value']));
	$smarty->assign('rezerv5',stripslashes($setting['rezerv5']['value']));
	$smarty->assign('rezerv6',stripslashes($setting['rezerv6']['value']));
	$smarty->assign('rezerv7',stripslashes($setting['rezerv7']['value']));
	$smarty->assign('rezerv8',stripslashes($setting['rezerv8']['value']));
	$smarty->assign('rezerv9',stripslashes($setting['rezerv9']['value']));
	$smarty->assign('rezerv10',stripslashes($setting['rezerv10']['value']));
	$smarty->assign('rezerv11',stripslashes($setting['rezerv11']['value']));
	$smarty->assign('rezerv12',stripslashes($setting['rezerv12']['value']));
	$smarty->assign('rezerv13',stripslashes($setting['rezerv13']['value']));
	$smarty->assign('rezerv14',stripslashes($setting['rezerv14']['value']));
	$smarty->assign('rezerv15',stripslashes($setting['rezerv15']['value']));
	$smarty->assign('rezerv16',stripslashes($setting['rezerv16']['value']));
	$smarty->assign('rezerv17',stripslashes($setting['rezerv17']['value']));
	$smarty->assign('rezerv18',stripslashes($setting['rezerv18']['value']));
	$smarty->assign('rezerv19',stripslashes($setting['rezerv19']['value']));
	$smarty->assign('rezerv20',stripslashes($setting['rezerv20']['value']));
	$smarty->assign('nrezerv1',stripslashes($setting['rezerv1']['title']));
	$smarty->assign('nrezerv2',stripslashes($setting['rezerv2']['title']));
	$smarty->assign('nrezerv3',stripslashes($setting['rezerv3']['title']));
	$smarty->assign('nrezerv4',stripslashes($setting['rezerv4']['title']));
	$smarty->assign('nrezerv5',stripslashes($setting['rezerv5']['title']));
	$smarty->assign('nrezerv6',stripslashes($setting['rezerv6']['title']));
	$smarty->assign('nrezerv7',stripslashes($setting['rezerv7']['title']));
	$smarty->assign('nrezerv8',stripslashes($setting['rezerv8']['title']));
	$smarty->assign('nrezerv9',stripslashes($setting['rezerv9']['title']));
	$smarty->assign('nrezerv10',stripslashes($setting['rezerv10']['title']));
	$smarty->assign('nrezerv11',stripslashes($setting['rezerv11']['title']));
	$smarty->assign('nrezerv12',stripslashes($setting['rezerv12']['title']));
	$smarty->assign('nrezerv13',stripslashes($setting['rezerv13']['title']));
	$smarty->assign('nrezerv14',stripslashes($setting['rezerv14']['title']));
	$smarty->assign('nrezerv15',stripslashes($setting['rezerv15']['title']));
	$smarty->assign('nrezerv16',stripslashes($setting['rezerv16']['title']));
	$smarty->assign('nrezerv17',stripslashes($setting['rezerv17']['title']));
	$smarty->assign('nrezerv18',stripslashes($setting['rezerv18']['title']));
	$smarty->assign('nrezerv19',stripslashes($setting['rezerv19']['title']));
	$smarty->assign('nrezerv20',stripslashes($setting['rezerv20']['title']));
	$smarty->assign('rrezerv1',stripslashes($setting['rezerv1']['value_rezerv']));
	$smarty->assign('rrezerv2',stripslashes($setting['rezerv2']['value_rezerv']));
	$smarty->assign('rrezerv3',stripslashes($setting['rezerv3']['value_rezerv']));
	$smarty->assign('rrezerv4',stripslashes($setting['rezerv4']['value_rezerv']));
	$smarty->assign('rrezerv5',stripslashes($setting['rezerv5']['value_rezerv']));
	$smarty->assign('rrezerv6',stripslashes($setting['rezerv6']['value_rezerv']));
	$smarty->assign('rrezerv7',stripslashes($setting['rezerv7']['value_rezerv']));
	$smarty->assign('rrezerv8',stripslashes($setting['rezerv8']['value_rezerv']));
	$smarty->assign('rrezerv9',stripslashes($setting['rezerv9']['value_rezerv']));
	$smarty->assign('rrezerv10',stripslashes($setting['rezerv10']['value_rezerv']));
	$smarty->assign('rrezerv11',stripslashes($setting['rezerv11']['value_rezerv']));
	$smarty->assign('rrezerv12',stripslashes($setting['rezerv12']['value_rezerv']));
	$smarty->assign('rrezerv13',stripslashes($setting['rezerv13']['value_rezerv']));
	$smarty->assign('rrezerv14',stripslashes($setting['rezerv14']['value_rezerv']));
	$smarty->assign('rrezerv15',stripslashes($setting['rezerv15']['value_rezerv']));
	$smarty->assign('rrezerv16',stripslashes($setting['rezerv16']['value_rezerv']));
	$smarty->assign('rrezerv17',stripslashes($setting['rezerv17']['value_rezerv']));
	$smarty->assign('rrezerv18',stripslashes($setting['rezerv18']['value_rezerv']));
	$smarty->assign('rrezerv19',stripslashes($setting['rezerv19']['value_rezerv']));
	$smarty->assign('rrezerv20',stripslashes($setting['rezerv20']['value_rezerv']));
	
	// валюты
	$result = $db->query("SELECT * FROM #__settings WHERE id <= 32  AND id >= 28 ORDER BY id ASC");
	$setting = $db->loadAssocList($result);	
	
	// языки
	$result1 = $db->query("SELECT * FROM #__settings WHERE id <= 37  AND id >= 33 ORDER BY id ASC");
	$setting1 = $db->loadAssocList($result1);	
	
	
	for($i=0; $i<count($setting1); $i++){
	
	$sets = '<select name="rezerv'.($i+16).'_val">';
		
	for($ie=0; $ie<count($setting); $ie++){
	
	if ($setting[$ie]['title'] != '') {
if ($setting[$ie]['id'] == $setting1[$i]['value_val']) {
	$sets .= '	<option selected="" value="'.$setting[$ie]['id'].'">'.$setting[$ie]['title'].'</option>';
} else {
	$sets .= '	<option value="'.$setting[$ie]['id'].'">'.$setting[$ie]['title'].'</option>';
}}

	if ($i == 0) {
	if (strlen($setting[$ie]['value_rezerv']) == 3) {
	$smarty->assign('kurs'.($ie+11), val_edit($setting['0']['value_rezerv'],$setting[$ie]['value_rezerv']));
	}	else {
	$smarty->assign('kurs'.($ie+11), '');
	}}
	} 

	$sets .= '</select>';
	
	$smarty->assign('val'.$setting[$i]['id'],$sets);	
	}
	

	// блоки на главную
	$result1 = $db->query("SELECT * FROM #__main_category ORDER BY id ASC");
	$setting1 = $db->loadAssocList($result1);	
	$smarty->assign('main_box',$setting1);	
	


	
	$smarty->assign('caption',"Настройки");
	$smarty->assign('content_template','settings.tpl');
}




?>	