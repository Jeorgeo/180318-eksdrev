<?php  
    function smarty_block_link($params,$string) {
    	if (!strstr($string,'&amp;')) {
    	 return str_replace('&','&amp;',$string);	
    	} else { 
  	     return $string;
    	}  
   }  
?>  