<?php
function smarty_function_news($params, &$smarty) {
  $category = $params['cat'];
  $count = $params['count'];
  $assign = $params['assign'];
  
  include ($_SERVER['REQUEST_URI'].'config_site.php');
  
  include ($abs_path.'/includes/incoc_db.php');
  
  $db = new db();
  
  $result = $db->query("SELECT c.*, DATE_FORMAT(c.created, '%d %m %y') as created_name,cc.name as category_name FROM #__content as c LEFT JOIN #__content_category as cc ON cc.id = c.id_category WHERE c.id_category='".$category."' ORDER BY c.created  LIMIT ".$count);
  $news = $db->loadAssocList($result);

  if (isset($params['catassign']) && count($news) > 0) {
  	$smarty->assign($params['catassign'], $news[0]['category_name']);
  }
  $smarty->assign($assign, $news);
}
?>