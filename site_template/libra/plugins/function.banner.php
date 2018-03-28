<?php
function smarty_function_banner($params, &$smarty) { 
  $assign = $params['assign'];
  $id = $params['id'];
  
  if (empty($id)) return;
  
  require ('config_site.php');
  require_once ($abs_path.'/includes/incoc_db.php');
  
  $db = new db();
  
  $result = $db->query("SELECT * FROM #__banners_place WHERE id = '".$id."' AND published=1 ");
  $news = $db->loadAssocList($result);
  if (count($news)==0) {
  	  return;
  }
  $banner_place = $news[0];
  $result = $db->query("SELECT * FROM #__banners WHERE id_place = '".$banner_place['id']."' AND published=1 ");
  $banners = $db->loadAssocList($result);

  if (count($banners)==0) {
  	  return;
  }
  $text ='';
 // var_dump($banners);
  foreach ($banners as $banner) {
	switch ($banner['id_type']) {
  		case 1:  	
		  	if ($banner['count']!=0 && $banner['pcount'] > $banner['count']) {
  				return;
 		 	}
  			$today = date('Y-m-d');
  			if (($today >= $banner['begin'] || $banner['begin'] == '0000-00-00') && ($today <= $banner['end'] || $banner['end'] == '0000-00-00')) {  		
  					$fields = array();
  					$fields['pcount'] = $banner['pcount']+1;
  					$db->update($fields,'#__banners',"`id` = '".$banner['id']."'");
  					$text = "<div style=\"text-align:center;\"><a target=\"new\" href=\"".$banner['url']."\"><img src=\"banners/".$banner['banner']."\"/></a></div>";
	  		}
	  	break;	
  		case 2:
  			$text = $banner['code'];
  		break;
  	}
  	//var_dump($today);
  	//if ($banner->b)
  }
  $smarty->assign($assign, $text);
}
?>