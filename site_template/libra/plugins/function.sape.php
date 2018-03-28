<?php
function smarty_function_sape($params, &$smarty) {
   global $trustlink;
   
  $assign = $params['assign'];
  $id = $params['id'];
  $sape = $params['sape'];
  $count = $params['count'];

  if (empty($id)) return;
  
  //if (!$sape) return;
  
  include ('config_site.php');
  
  include_once ($abs_path.'/includes/incoc_db.php');
  
  $db = new db();

  $result = $db->query("SELECT * FROM #__banners_place WHERE id = '".$id."' AND published=1 AND id_type=2");
  $places = $db->loadAssocList($result);
    
  if (count($places)==0) {
  	  return;
  }  
  $banner_place = $places[0];
  $result = $db->query("SELECT * FROM #__banners WHERE id_place = '".$banner_place['id']."' AND published=1 AND id_type=3");
  $banners = $db->loadAssocList($result);
  
  if (count($banners)==0) {
  	  return;
  }
  $text = '';
  foreach ($banners as $banner) {
/*  	if ($banner['count_links'] != -1) {
  		//$text = $sape->return_links($banner['count_links']);
  	} else {
  		//$text = $sape->return_links();
  		$text = $trustlink->build_links();
  	}*/
   $text = $trustlink->build_links(); 	
  }
  $smarty->assign($assign, $text);
}
?>