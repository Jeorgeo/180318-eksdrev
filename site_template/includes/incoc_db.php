<?php
class DB {
	var $conn;
	var $prefix;
	var $deslpay_error = 1;
	var $show_query = 1;
	
	function show_error($mess,$sql='') {
		if ($this->deslpay_error == 1) { 
			echo $mess, ': ' , mysql_error(), "<br/>\n";
		}	 
		if ($this->show_query == 1 && !empty($sql)) {
			echo '<br/><strong>Query:</strong>&nbsp;</span><code>',$sql, "</code><br/>\n";
		}
		exit;
	}
	function move ($table, $id, $dirn, $where='') {
		$uid = $this->loadObject($table,$id);
		
		$sql = "SELECT id, ordering FROM $table";
		
		if ($dirn < 0)
		{
			$sql .= ' WHERE ordering < '.(int) $uid->ordering;
			$sql .= ($where ? ' AND '.$where : '');
			$sql .= ' ORDER BY ordering DESC';
		}
		else if ($dirn > 0)
		{
			$sql .= ' WHERE ordering > '.(int) $uid->ordering;
			$sql .= ($where ? ' AND '. $where : '');
			$sql .= ' ORDER BY ordering';
		}
 else
		{
			$sql .= ' WHERE ordering = '.(int) $uid->ordering;
			$sql .= ($where ? ' AND '.$where : '');
			$sql .= ' ORDER BY ordering';
		}		
		$result = $this->query($sql);
		$rows = $this->loadObjectList($result);
		$row = $rows[0];
		$this->update(array('`ordering`' => $row->ordering),$table,"`id` = '$uid->id'");
		$this->update(array('`ordering`' => $uid->ordering),$table,"`id` = '$row->id'");
	}
	
	function db($host='',$user='',$pass='',$db_name='',$char='',$method='',$table_prefix=''){

		$host = $host ? $host : $GLOBALS['db_host'];
		$user = $user ? $user : $GLOBALS['db_user'];
		$pass = $pass ? $pass : $GLOBALS['db_pass'];
		$db_name = $db_name ? $db_name : $GLOBALS['db_name'];
		$char = $char ? $char : $GLOBALS['database_connection_charset'];
		$method = $method ? $method : $GLOBALS['database_connection_method'];
		$this->prefix = $table_prefix ? $table_prefix : $GLOBALS['table_prefix']; 


		if (!$this->conn = mysql_connect($host,$user,$pass)) {
			$this->show_error(_NOT_CONNECT);
		}
		if (!mysql_select_db($db_name,$this->conn)) {
			$this->show_error(_NOT_SELECT_DB);
		}
		
		mysql_query("{$method} {$char}",$this->conn);
	}
	
   function disconnect() {
      @ mysql_close($this->conn);
   }

   function escape($s) {
   	  $s =  htmlentities($s,ENT_QUOTES,'utf-8');
      if (function_exists('mysql_real_escape_string') && $this->conn) {
         $s = mysql_real_escape_string($s, $this->conn);
      } else {
         $s = mysql_escape_string($s);
      }
      return $s;
   }

   function query($sql) {
   	  $sql = $this->replacePrefix($sql);
   	  if (!$result = @mysql_query($sql,$this->conn)) {
   	  	$this->show_error(_NOT_QUERY,$sql);
   	  }
   	  return $result;   	  
   }
   
   function delete($from,$where='',$fields='') {
      if (!$from)
         return false;
      else {
         $table = $this->replacePrefix($from);
         $where = ($where != "") ? "WHERE $where" : "";


mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


         return $this->query("DELETE $fields FROM $table $where");
      }
   }
   
   function update($fields, $table, $where = "") {
   	  $table = $this->replacePrefix($table);
      if (!$table)
         return false;
      else {
         if (!is_array($fields))
            $flds = $fields;
         else {
            $flds = '';
            foreach ($fields as $key => $value) {
               if (!empty ($flds))
                  $flds .= ",";
               $flds .= $key . "=";
               $flds .= "'" . $value . "'";
            }
         }
         $where = ($where != "") ? "WHERE $where" : "";

//echo ('<br>UPDATE' . $table . ' SET ' . $flds . ' ' . $where . '<br>');
//$flds = iconv( 'utf-8', 'cp1251', $flds );
//echo ('<br>UPDATE' . $table . ' SET ' . $flds . ' ' . $where . '<br>');

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");

         return $this->query("UPDATE $table SET $flds $where");
      }
   }


   function insert($fields, $intotable, $fromfields = "*", $fromtable = "", $where = "", $limit = "") {


   	 $intotable = $this->replacePrefix($intotable);
      if (!$intotable)
         return false;
      else {
         if (!is_array($fields))
            $flds = $fields;
         else {
            $keys = array_keys($fields);
            $values = array_values($fields);
            $flds = "(" . implode(",", $keys) . ") " .
             (!$fromtable && $values ? "VALUES('" . implode("','", $values) . "')" : "");
            if ($fromtable) {
               $where = ($where != "") ? "WHERE $where" : "";
               $limit = ($limit != "") ? "LIMIT $limit" : "";
               $sql = "SELECT $fromfields FROM $fromtable $where $limit";
            }
         }


// echo ('<br>INSERT INTO  ' . $intotable . ' SET ' . $flds . ' ' . $sql . '<br>');
mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


         $rt = $this->query("INSERT INTO $intotable $flds $sql");
         $lid = $this->getInsertId();
         return $lid ? $lid : $rt;
      }
   }
   function getInsertId($conn=NULL) {
      if( !is_resource($conn)) $conn =& $this->conn;
      return mysql_insert_id($conn);
   }
	function loadObjectList( $query, $key='' ) {
		if (!$query) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_object( $query )) {
			if ($key) {
				$array[$row->$key] = $row;
			} else {
				$array[] = $row;
			}
		}
		mysql_free_result( $query );
		return $array;
	}
	
	function loadTreeList ($query) {
		$val = array();
		while ($row = mysql_fetch_assoc($query)) {
			$val[$row['parent']][$row['id']] = $row;
		}
		$vals = $this->ShowTree($val);
		return $vals;		
	}
function getlastordering ($table,$where) {

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


	$result = $this->query("SELECT max(ordering) as max FROM $table WHERE $where");
	return mysql_result($result,0);
}	

function getlastid ($table,$where) {

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


	$result = $this->query("SELECT max(id) as max FROM $table WHERE $where");
	return mysql_result($result,0);
}	

function ShowTree($tree, $pid=0){
$val = array();
	foreach( $tree as $id=>$root){
		if($pid!=$id)continue;
		if(count($root)){
			foreach($root as $key => $title){		
				if(count($tree[$key]))$title ['items'] = $this->ShowTree($tree,$key);
				$val[$title['id']] = $title;
			}
		}
	}
return $val;
}
	
	function loadAssocList($query, $key='' ) {
		if (!$query) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_assoc( $query )) {
			if ($key) {
				$array[$row[$key]] = $row;
			} else {
				$array[] = $row;
			}
		}
		mysql_free_result( $query );
		return $array;
	}
	
	function loadAssocListnumber($query) {
		if (!$query) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_assoc( $query )) {

	$count = mysql_query("SELECT COUNT(*) FROM ".$GLOBALS['table_prefix']."mainr01 where id_model='".$row['id']."'");
    $count = mysql_fetch_array($count);
    $count = $count[0];
	if ($count != 0) {$array[] = $row;}

//		$array[] = $row;
		}
		mysql_free_result( $query );
		return $array;
	}
	
	function loadforSelect($query, $key,$value ) {
		if (!$query) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_assoc( $query )) {
				$array[$row[$key]] = $row[$value];
		};
		
		mysql_free_result( $query );
		return $array;
	}	
	function loadObject ($table, $id) {
		$table = $this->replacePrefix($table);

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


		$result = $this->query("SELECT * FROM $table WHERE `id`='$id'");
		if ($row = mysql_fetch_object( $result )) {
			return $row;
		} else {
			return null;
		}
	}
	function replacePrefix( $sql, $prefix='#__' ) {
		$sql = trim( $sql );

		$escaped = false;
		$quoteChar = '';

		$n = strlen( $sql );

		$startPos = 0;
		$literal = '';
		while ($startPos < $n) {
			$ip = strpos($sql, $prefix, $startPos);
			if ($ip === false) {
				break;
			}

			$j = strpos( $sql, "'", $startPos );
			$k = strpos( $sql, '"', $startPos );
			if (($k !== FALSE) && (($k < $j) || ($j === FALSE))) {
				$quoteChar	= '"';
				$j			= $k;
			} else {
				$quoteChar	= "'";
			}

			if ($j === false) {
				$j = $n;
			}

			$literal .= str_replace( $prefix, $this->prefix, substr( $sql, $startPos, $j - $startPos ) );
			$startPos = $j;

			$j = $startPos + 1;

			if ($j >= $n) {
				break;
			}

			// quote comes first, find end of quote
			while (TRUE) {
				$k = strpos( $sql, $quoteChar, $j );
				$escaped = false;
				if ($k === false) {
					break;
				}
				$l = $k - 1;
				while ($l >= 0 && $sql{$l} == '\\') {
					$l--;
					$escaped = !$escaped;
				}
				if ($escaped) {
					$j	= $k+1;
					continue;
				}
				break;
			}
			if ($k === FALSE) {
				// error in the query - no end quote; ignore it
				break;
			}
			$literal .= substr( $sql, $startPos, $k - $startPos + 1 );
			$startPos = $k+1;
		}
		if ($startPos < $n) {
			$literal .= substr( $sql, $startPos, $n - $startPos );
		}
		return $literal;
	}   
}
?>