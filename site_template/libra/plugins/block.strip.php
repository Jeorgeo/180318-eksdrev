<?php  
    function smarty_block_strip($params,$string) {
echo "Hi";
    	return stripslashes($string);
   }  
?>  