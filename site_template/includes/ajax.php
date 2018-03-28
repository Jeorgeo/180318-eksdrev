<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset='.$charset);
include ('../config_site.php');
include ($abs_path.'/parametric/admin.ru.php');
include ($abs_path.'/parametric/ru.php');
include ($abs_path.'/includes/incoc_db.php');
include ($abs_path.'/includes/incoc_regardo.php');
$db = new db();
$html = new html();
require_once($abs_path.'/libra/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $abs_path.'/control/shablon/';
$smarty->compile_dir = $abs_path.'/control/shablon_c/';
 switch ($_POST['task']) {
 	case 'marka':
 		getmarka(intval($_POST['id']),intval($_POST['id_marka']));
 	break;
 	case 'model':
 		getmodel(intval($_POST['id']),intval($_POST['id_model']));
 	break;
 	case 'banners_foto':
 		getfoto(intval($_POST['id']));
 	break; 	
 	case 'id_type_banner':
 		gettypebanner(intval($_POST['id']),intval($_POST['id_place']),intval($_POST['id_banner']));
 	break; 	 	
 	case 'complect':
 		getcomplect(intval($_POST['id']));
 	break; 	
  	case 'complect1':
 		getcomplect1(intval($_POST['id']));
 	break;	
  	case 'complect2':
 		getcomplect2(intval($_POST['id']));
 	break;	 	
   	case 'banner_param':
 		banner_param(intval($_POST['id']),intval($_POST['id_banner']));
 	break;		
 }
function banner_param ($id,$id_banner) {
	global $db,$smarty,$abs_path;
	
	header("Content-type: text/html; charset=utf-8");
	if (!empty($id_banner)) {
		$banner = $db->loadObject('#__banners',$id_banner);
	}
	$smarty->assign('banner',$banner);
	switch ($id) {
		case 1:
			if (!empty($id_banner)) {
			    $smarty->assign('foto_link','../banners/'.$banner->banner);
			    $begint = explode('-',$banner->begin);
				$endt = explode('-',$banner->end);
				$smarty->assign('begin',$begint[2].'.'.$begint[1].'.'.$begint[0]);
				$smarty->assign('end',$endt[2].'.'.$endt[1].'.'.$endt[0]);					
			}
			echo $smarty->fetch("banners_add_banner.tpl");
		break;
		case 2:
			echo $smarty->fetch("banners_add_code.tpl");
		break;
		case 3:
			echo $smarty->fetch("banners_add_sape.tpl");
		break;		
	}
	
} 
function gettypebanner ($id,$id_place,$id_banner) {
	global $db,$html;
	
	 header("Content-type: text/html; charset=utf-8");
	if ($id != 3) {
		$type=1;
	} else {
		$type=2;
	}
	
	$result = $db->query("SELECT * FROM #__banners_place WHERE `id_type`='".$type."' and published = 1 ORDER BY name");
	$banners = $db->loadAssocList($result,'id');
	$place_list = array();
	foreach ($banners as $place) {
		$result = $db->query("SELECT id FROM #__banners WHERE `id_place`='".$place['id']."' and published = 1");
		$count = $db->loadAssocList($result);
		
		if (count($count) == 0 || $count[0]['id'] == $id_banner) {
			$place_list[$place['id']] = $place['name'];

		}
	}
	//$place_sel = "<select multiple name=\"id_place\" style=\"height:15em;\" id=\"id_place\">";
	$place_sel .= $html->getSelect($place_list,$id_place);
	//$place_sel .= "</select>";
	echo $place_sel;
}

 function getfoto($id) {
 	global $db;
 	 header("Content-type: text/html; charset=utf-8");
 	$place = $db->loadObject('#__banners_place',$id);
 	if (!empty($place->foto)) {
 		echo "<a href=\"../banners/".$place->foto."\" target=\"new\"><img src=\"../banners/".$place->foto."\" width=\"500px\"></a>";
 	} else {
 		echo "Нет фото";
 	}	
 }
 
 function getmarka($id,$id_marka='') {
 global $db;
 header("Content-type: text/html; charset=utf-8");
 $result = $db->query("SELECT * FROM #__marka WHERE `id_category`='".$id."' and published = 1 ORDER BY name");
 $rows = $db->loadObjectList($result);
 echo "<option value=\"0\">",_NO_SELECT,"</option>";
 foreach ($rows as $row) {
 	if (!empty($id_marka) && $id_marka == $row->id) {
 		$sel = 'selected';
 	} else {
 		$sel = '';
 	}
 	echo "<option $sel value=\"",$row->id,"\">",$row->name,"</option>";
 	
 }
 }
 
 function getmodel($id,$id_model) {
 global $db;
 
 header("Content-type: text/html; charset=utf-8");
 $result = $db->query("SELECT * FROM #__model WHERE `id_marka`='".$id."' AND published = 1 ORDER BY name");
 $rows = $db->loadObjectList($result);
 echo "<option value=\"0\">",_NO_SELECT,"</option>";
 foreach ($rows as $row) {
  	if (!empty($id_model) && $id_model == $row->id) {
 		$sel = 'selected';
 	} else {
 		$sel = '';
 	} 	
 	echo "<option $sel value=\"",$row->id,"\">",$row->name,"</option>";
 	
 }
 }
 
 function getcomplect($id) {
 	global $db,$html;
 	
 	header("Content-type: text/html; charset=utf-8");
 	$result = $db->query("SELECT c.*,g.name as group_name FROM #__category_complect as cc LEFT JOIN #__complect as c ON c.id = cc.id_complect LEFT JOIN #__complect_category as g ON g.id = c.id_group  WHERE cc.id_category = '".$id."' AND c.published = 1  ORDER BY id_group,ordering");
 	//$result = $db->query("SELECT c.*,g.name as group_name FROM #__complect_category as cc LEFT JOIN #_complect as c ON cc.id_complect = c.id LEFT JOIN #__complect_category as g ON g.id=c.id_group WHERE cc.id_category = '".$id."' ORDER BY id_group,ordering");
 	$rows = $db->loadObjectList($result); 	
 	
 	?>
 	<table cellpadding="0" cellspacing="5px" border="0">
 	<?php
 	$group = '';
	foreach ($rows as $row) {
		if ($row->id_group != $group) {
				$group = $row->id_group;
			?>
		<tr>
		  <td colspan="2"><strong><?php echo $row->group_name; ?></strong></td>
		</tr>	
			<?php
		} 
		?>
		<tr>
		 <td><?php echo ($row->type == 'checkbox') ? '' : $row->title; ?></td>
		 <td><?php $html->getelement($row); ?></td>
		</tr>
		<?php
	}
 	?>
 	</table>
 	<?php
 }
 
  function getcomplect1($id) {
 	global $db,$html;
 	
 	header("Content-type: text/html; charset=utf-8");
 	$result = $db->query("SELECT c.*,g.name as group_name FROM #__category_complect as cc LEFT JOIN #__complect as c ON c.id = cc.id_complect LEFT JOIN #__complect_category as g ON g.id = c.id_group WHERE cc.id_category = '".$id."' AND c.id_group = '0' AND c.published = 1 ORDER BY `ordering` ");
 	//$result = $db->query("SELECT c.*,g.name as group_name FROM #__complect_category as cc LEFT JOIN #_complect as c ON cc.id_complect = c.id LEFT JOIN #__complect_category as g ON g.id=c.id_group WHERE cc.id_category = '".$id."' ORDER BY id_group,ordering");
 	$rows = $db->loadObjectList($result); 	
 	
 	?>
 	<table cellpadding="0" cellspacing="5px" border="0">
 	<?php
 	$group = '';
	foreach ($rows as $row) {
		if ($row->id_group != $group) {
			$group = $row->id_group;
			?>
		<tr>
		  <td colspan="2"><strong><?php echo $row->group_name; ?></strong></td>
		</tr>	
			<?php
		} 
		?>
		<tr>
		 <td><?php echo ($row->type == 'checkbox') ? '' : $row->title; ?></td>
		 <td><?php $html->getelement($row); ?></td>
		</tr>
		<?php
	}
 	?>
 	</table>
 	<?php
 }
 
   function getcomplect2($id) {
 	global $db,$html;
 	
 	header("Content-type: text/html; charset=utf-8");
 	$result = $db->query("SELECT c.*,g.name as group_name FROM #__category_complect as cc LEFT JOIN #__complect as c ON c.id = cc.id_complect LEFT JOIN #__complect_category as g ON g.id = c.id_group WHERE cc.id_category = '".$id."' AND c.id_group != '0' AND c.published = 1 ORDER BY `ordering`");
 	//$result = $db->query("SELECT c.*,g.name as group_name FROM #__complect_category as cc LEFT JOIN #_complect as c ON cc.id_complect = c.id LEFT JOIN #__complect_category as g ON g.id=c.id_group WHERE cc.id_category = '".$id."' ORDER BY id_group,ordering");
 	$rows = $db->loadObjectList($result); 	
 	
 	?>
 	<table cellpadding="0" cellspacing="5px" border="0">
 	<?php
 	$group = '';
	foreach ($rows as $row) {
		if ($row->id_group != $group) {
			$group = $row->id_group;
			?>
		<tr>
		  <td colspan="2"><strong><?php echo $row->group_name; ?></strong></td>
		</tr>	
			<?php
		} 
		?>
		<tr>
		 <td><?php echo ($row->type == 'checkbox') ? '' : $row->title; ?></td>
		 <td><?php $html->getelement($row); ?></td>
		</tr>
		<?php
	}
 	?>
 	</table>
 	<?php
 }
?>