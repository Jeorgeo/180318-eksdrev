<?



//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset='.$charset);


//Start DB
include ($abs_path.'includes/incoc_db.php');
$db = new db();

$result = $db->query("SELECT * FROM #__settings");
$sets = $db->loadAssocList($result,'name');

include ($abs_path.'includes/incoc_regardo.php');




?>