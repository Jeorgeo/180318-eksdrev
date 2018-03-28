<?php 
function smarty_function_company($params, &$smarty) {
  $assign = $params['assign'];
  if ($params['assign']) {
  	$count = $params['count'];
  } else {
  	$count = 1;
  }
  include ('config_site.php');
  
  require_once ($abs_path.'/includes/incoc_db.php');
  
  $db = new db();

  $result = $db->query("SELECT id FROM #__firms_type WHERE published = 1");
  $types = $db->loadAssocList($result);
  
  $comps = array ();
  foreach ($types as $type) {
  	$result = $db->query("SELECT f.*,t.name as type_name FROM #__firms as f LEFT JOIN #__firms_type as t ON t.id = f.id_type WHERE f.id_type='".$type['id']."' AND f.published = 1 LIMIT ".$count);
  	$company = $db->loadAssocList($result);
  	if ($company) {
  		$comps []= $company[0];
  	}		
  }
  for ($i=0;$i<count($comps);$i++) {
  	$comps[$i]['name'] = stripslashes($comps[$i]['name']);
  }
  $smarty->assign($assign, $comps);
}
?>