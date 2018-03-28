<?php


header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

include ('../../../config_site.php');
include ($abs_path.'/includes/admin.ru.php');
include ($abs_path.'/includes/incoc_regardo.php');
include ($abs_path.'/includes/incoc_db.php');
include ($abs_path.'/includes/incoc_images.class.php');

$db = new db();	
$image = new Images;


include    './FileAPI.class.php';

function randstr($length = 32) {
	$a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	for($i=0; $i<$length; $i++) $ret .= substr($a, rand(0, strlen($a)), 1);
		return $ret;
	} 	


function save_cachefile_yty ($cache_file='',$file_cache) {
$fp = fopen($cache_file, 'w'); 
$textarray=serialize($file_cache);
fwrite($fp, $textarray); 
fclose($fp);
}

if( !empty($_SERVER['HTTP_ORIGIN']) ){
	// Enable CORS
	FileAPI::enableCORS();
}


if( $_SERVER['REQUEST_METHOD'] == 'OPTIONS' ){
	exit;
}


if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ){
	$files	= FileAPI::getFiles(); // Retrieve File List
	$images	= array();

$ext = strtolower(substr($_FILES['filedata']['name'], 1 + strrpos($_FILES['filedata']['name'], ".")));
$new_name = randstr();	
if ($ext == 'jpeg') {$ext = 'jpg'; $file_name = str_replace('.jpeg','.jpg',$_FILES['filedata']['name']);} else {$file_name = $_FILES['filedata']['name'];}


if ($ext == 'jpg' OR $ext == 'JPG' OR $ext == 'Jpg') {
// копируем изображение в папку картинок
copy($_FILES['filedata']['tmp_name'], $abs_path."/images/_original_images/".$file_name);

	// Fetch all image-info from files list
	fetchImages($files, $images);


	// JSONP callback name
	$jsonp	= isset($_REQUEST['callback']) ? trim($_REQUEST['callback']) : null;


	// JSON-data for server response
	$json	= array(
		  'images'	=> $images
		, 'data'	=> array('_REQUEST' => $_REQUEST, '_FILES' => $files)
	);


	// Server response: "HTTP/1.1 200 OK"
	FileAPI::makeResponse(array(
		  'status' => FileAPI::OK
		, 'statusText' => 'OK'
		, 'body' => $json
	), $jsonp);
	
}
	exit;
}




function fetchImages($files, &$images, $name = 'file'){
	if( isset($files['tmp_name']) ){
		$mime = $files['type'];
		$filename = $files['tmp_name'];

		if( strpos($mime, 'image/') !== false ){
			$size = getimagesize($filename);
			$base64 = base64_encode(file_get_contents($filename));

			$images[$name] = array(
				  'width'	=> $size[0]
				, 'height'	=> $size[1]
				, 'mime'	=> $mime
				, 'size'	=> filesize($filename)
				, 'dataURL'	=> 'data:'. $mime .';base64,'. $base64
			);
		}
	}
	else {
		foreach( $files as $name => $file ){
			fetchImages($file, $images, $name);
		}
	}
}
?>
