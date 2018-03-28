<?php
class paths {
	var $path;
	var $count;
	function paths() {
		$this->path = array();
	}
	function add($id,$title,$link) {
		$path['id'] = $id;
		$path['name'] = $title;
		$path['link'] = $link;
		$this->path[] = $path;
		$this->count = count($this->path);
	}
	
	function check($value) {
		foreach($this->path as $path) {
			if ($path['id'] == $value) {
				return true;		
			}
		}
		return false;
	}
}
class menu {
	var $prefix;
	var $mod;
	
	function create ($actions,$id='') {
		$act = array();
		$action_list = array();
		$id = empty($id) ? '': '&id='.$id;
		$count = count($actions);
		$i = 1;
		foreach ($actions as $action) {
			if (!empty($this->prefix)) {
				$act1 = $action['action'].'-'.$this->prefix;
			} else {
				$act1 = $action['action'];
			}			
			if ($i < ($count-1)) {
				$act['separator'] = '&nbsp;|&nbsp;';
			}
			if ($action['action'] != 'delete') {
			
// используется только в админке echo ('Параметры: mod' . $this->mod . ' - act1: ' . $act1 . ' - id:' . $id . ' - action[param]: ' . $action['param'] . '<br /><br /><br />');


			
				if (isset($action['param'])) {
			    	 $act['link'] = "index.php?mod=".$this->mod."&task=".$act1.$id.$action['param'];
				} else {
					$act['link'] = "index.php?mod=".$this->mod."&task=".$act1.$id;
				}
			} else {
				$act['link'] = "javascript: delets('".$this->mod."','".$act1.$id."');";
			}
			$act['title'] = $action['title'];
			$action_list[] = $act;
			$i++;
		}
		return $action_list;
	}
}
class error {
	var $err = array();
	function add($msg) {
		$this->err[] = $msg;
		$this->check();
	}
	function check() {
		global $smarty;
		if (count($this->err)>0) {
			$smarty->assign('error',$this->err);		
		}
		$smarty->assign('error_template','error.tpl');	
	}
}

class html {
	var $id;
	var $parent;
	var $field;
	function getSelectTree($val,$field,$id) {
		$this->field = $field;
		$this->id = $id;
		$this->parent = $id;
		$html_select .= $this->_getselect($val);
		return $html_select;
	}
	function getSelect($value,$id='0') {		
		$st='';
		foreach ($value as $key=>$val) {
			$select = ($key == $id) ? 'selected' : '';
			
			$st .= '<option value="'.$key.'" '.$select.'>'.$val."</option>\n";
		}
		return $st;
	}	
	function getelement($row) {
		global $db,$html;

		switch ($row->type) {
			case 'value':
				echo"<input type=\"text\" name=\"d[".$row->id."]\" style=\"width:200px\">";
			break;
			case 'checkbox':
				echo "<input type=\"checkbox\" name=\"d[".$row->id."]\">".$row->title;
			break;
			case 'select':
				$result = $db->query("SELECT * FROM #__complect_value WHERE `id_complect`='".$row->id."'");
				$values = $db->loadforSelect($result,'id','name');
			    echo "<select name=\"d[".$row->id."]\">";
			    echo "<option value='0'>"._NO."</option>";
			    echo $html->getSelect($values);
			    echo "</select>";
			break;
		}
		return $val;
	}
	function getSelectType($type='0') {	
		global $g_type;	
		foreach ($g_type as $key=>$val) {
			$select = ($key == $type) ? 'selected' : '';
			
			$st .= "<option value=\"$key\" $select>$val</option>\n";
		}
		return $st;
	}
	function _getselect($vals,$st='') {
		foreach ($vals as $key=>$val ) {
			if ($key == $this->parent) {
				$selec = ' selected';
			} else {
				$selec = '';
			}
			$html .= "<option value=\"$key\" $selec >".$st.$val[$this->field]."</option>\n";
			if (count($val['items']) > 0) {
				$html .= $this->_getselect($val['items'],$st.'&nbsp;&nbsp;&nbsp;');				
			}
		}
		return $html;
	}
}

function getModulePath() {
	global $mod,$abs_path;
	
	return $abs_path.'/tadjiki/'.$mod;
}

function getModuleUrl() {
	global $mod,$base_url;
	
	return $base_url.'tadjiki/'.$mod;
}

function getModuleName() {
	global $db;
	$link = $_SERVER['QUERY_STRING'];
	$lm = explode('&',$link);
	$result = $db->query("SELECT * FROM #__module WHERE `menu_link` = '".$lm[0]."'");
	$row = $db->loadAssocList($result);
	if (count($row) > 0) {
		return $row[0]; 
	} else {
		return null;
	}
}

function mosArrayToInts( &$array, $default=null ) {
        if (is_array( $array )) {
		foreach( $array as $key => $value ) {
			$array[$key] = (int) $value;
                }
        } else {
                if (is_null( $default )) {
			$array = array();
			return array(); // Kept for backwards compatibility
                } else {
			$array = array( (int) $default );
			return array( $default ); // Kept for backwards compatibility
                }
        }
}

function reg_generate_password($length = 12, $special_chars = true) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ( $special_chars )
		$chars .= '!@#$%^&*()';

	$password = '';
	for ( $i = 0; $i < $length; $i++ )
		$password .= substr($chars, rand(0, strlen($chars) - 1), 1);
	return $password;
}
function regGetUser() {
	global $db;

	$result = $db->query("SELECT * FROM #__users WHERE `hash` = '".$_COOKIE['hash']."'");
	$users = $db->loadAssocList($result);
	return $users[0];
}
function clink ($link) {
        if (!strstr($link,'&amp;')) {
         return str_replace('&','&amp;',$link);   
        } else { 
         return $link;
        }  
}


function resize_image($infile,$outfile,$neww,$newh,$quality) {
    $im=imagecreatefromjpeg($infile);
    $im1=imagecreatetruecolor($neww,$newh);
    imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
}


function revers_image($infile,$outfile,$neww,$newh,$thumb_qual_w,$thumb_qual_h,$quality) {
    $im=imagecreatefromjpeg($infile);
    $im1=imagecreatetruecolor($neww,$newh);
    imagecopy($im1,$im,0,0,$thumb_qual_w,$thumb_qual_h,$neww,$newh);

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
}

function killimage($fotoa,$id='0') {

}

function redirect($url) {

}

function revdata($val,$ex,$in) {


}

function vardump($val) {

}

function getfilname ($path,$name,$ch='') {

}

function transfersruseng($str) {

	$str = str_replace ('/','asldkeurhqkjbf4gwhjfr23ryg8dfshgf', $str);

    $tr = array(

	"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
   "."=>"","  "=>"_"," "=>"_","?"=>"","\\"=>"",
   "*"=>"",":"=>"","*"=>"","\""=>"","<"=>"",
   ">"=>"","|"=>"",","=>"","("=>"",")"=>"","«"=>"",
   "»"=>"","&laquo;"=>"","&raquo;"=>"","laquo"=>"","raquo"=>"",
   "’"=>"","“"=>"","”"=>"","!"=>"","–"=>"","&ndash;"=>"","quot"=>"","ndash"=>"","mdash_"=>"","mdash"=>"",
   "____"=>"_","___"=>"_","__"=>"_","__"=>"_"             
    );
	$str = rtrim($str);
	$temp = strtr($str,$tr);
	$temp = strtr($str,$tr);
	$temp = str_replace ('_-_','_', $temp);
	$temp = str_replace ('__','_', $temp);
	$temp = str_replace ('__','_', $temp);
	$temp = str_replace ('__','_', $temp);
	$temp = str_replace ('__','_', $temp);
	$temp = preg_replace("/[^a-zA-Z0-9-_]/s","",$temp);
	
	$temp = str_replace ('asldkeurhqkjbf4gwhjfr23ryg8dfshgf', '/', $temp);

	return $temp;
} 



function transfersutf8($str)
{
} 

function transferkov($str)
{
    $tr = array(
        "'"=>"\'"
    );
    return strtr($str,$tr);
} 

function randstrimage($length = 32) {
	$a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	for($i=0; $i<$length; $i++) $ret .= substr($a, rand(0, strlen($a)), 1);
		return $ret;
	}


function learndate ($date, $id_lang) {

}


function learndateh ($date, $id_lang) {


}


function GetRealIp()
{
	
}



function GetRealIpCity ($ip) {


}



function learndatedm ($date, $id_lang) {

	$date_array = explode('-', $date);
	$mn = $date_array['1'];
	$day = $date_array['2'];
	$creatednew = $day.'.'.$mn.'';
	unset($date_array);
	return($creatednew);

}



function translate_main_category ($rows11,$id_lang,$pref_lang) {
	for ($io = 0; $io < count($rows11);$io++) {
	$id = $rows11[$io]['id'];
	unset($rows13);	
	$rows13['name'] = $rows11[$io]['name'];	
	$rows13['text'] = $rows11[$io]['text'];	
	$rows13['dop_text'] = $rows11[$io]['dop_text'];	
	$rows12[$id] = $rows13;
	}
	return($rows12);
}


function translate_lang ($rows11,$rows11_2,$rows11_3,$rows11_4,$rows11_5,$id_lang) {

	if (($id_lang == 2) AND (strlen($rows11_2) > 0)) {$rows11 = $rows11_2;}
	if (($id_lang == 3) AND (strlen($rows11_3) > 0)) {$rows11 = $rows11_3;}
	if (($id_lang == 4) AND (strlen($rows11_4) > 0)) {$rows11 = $rows11_4;}
	if (($id_lang == 5) AND (strlen($rows11_5) > 0)) {$rows11 = $rows11_5;}

	return($rows11);

}


function chank ($key,$text) {
for ($io = 0; $io < count($key);$io++) {$text = str_replace('[{'.$key[$io]['name'].'}]', ''.$key[$io]['text'].'', $text);}
	return($text);
}

function category_name ($key,$text) {
for ($io = 0; $io < count($key);$io++) {$text = str_replace('[{category_name_'.$key[$io]['id'].'}]', ''.$key[$io]['name'].'', $text);}
	return($text);
}

function long_name ($key, $text) {
	if (strlen($key) < 2) {return($text);} else {return($key);}
}


function save_cachefile ($cache_file='',$file_cache) {
$fp = fopen($cache_file, 'w'); 
$textarray = $file_cache;
fwrite($fp, $textarray); 
fclose($fp);
}

function datename($sdvig) {
return(date('Y-m-d', time()+$sdvig));
}

function val_edit ($val1, $val2) {

global $db;
$result = $db->query("SELECT * FROM #__val_kurs WHERE val1 = '".$val1."' and val2 = '".$val2."' and created = '".datename()."'");
$category = $db->loadAssocList($result);

if (count($category) > 0) {
return($category['0']['kurs']);
} else {
/*$tmp = @file_get_contents('https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+%22'.$val1.$val2.'%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=');
$tmp_kurs = json_decode($tmp)->query->results->rate->Rate;*/
$tmp_kurs = 1;

if ($tmp_kurs != 0) {

		$fields['val1'] = $val1;
		$fields['val2'] = $val2;
		$fields['created'] = datename();
		$fields['kurs'] = $tmp_kurs;
		$db->insert($fields,"#__val_kurs");		
		return($tmp_kurs);
		
} else {

		$result = $db->query("SELECT * FROM #__val_kurs WHERE val1 = '".$val1."' and val2 = '".$val2."' ORDER BY id DESC LIMIT 1");
		$category = $db->loadAssocList($result);
		$tmp_kurs = $category['0']['kurs'];

	return($tmp_kurs);
}}}


function num2str($num) {
	$nul='ноль';
	$ten=array(
		array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
		array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
	);
	$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
	$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
	$hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
	$unit=array( // Units
		array('копейка' ,'копейки' ,'копеек',	 1),
		array('рубль'   ,'рубля'   ,'рублей'    ,0),
		array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
		array('миллион' ,'миллиона','миллионов' ,0),
		array('миллиард','милиарда','миллиардов',0),
	);
	//
	list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub)>0) {
		foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1; // unit key
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
			// mega-logic
			$out[] = $hundred[$i1]; # 1xx-9xx
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
			// units without rub & kop
			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		} //foreach
	}
	else $out[] = $nul;
	$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}


function morph($n, $f1, $f2, $f5) {
	$n = abs(intval($n)) % 100;
	if ($n>10 && $n<20) return $f5;
	$n = $n % 10;
	if ($n>1 && $n<5) return $f2;
	if ($n==1) return $f1;
	return $f5;
}


	
?>