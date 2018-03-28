<?php
function smarty_function_partners($params, &$smarty) {
  $count = $params['count'];
  $assign = $params['assign'];
  
  include ('config_site.php');
  
  include_once ($abs_path.'/includes/incoc_db.php');
  
  $db = new db();
  
  $result = $db->query("SELECT * FROM #__partners WHERE published = 1  LIMIT ".$count);
  $news = $db->loadAssocList($result);
  $smarty->assign($assign, $news);
}
?>