<?php  
    function smarty_modifier_link($string) {  
        if (!strstr($string,'&amp;')) {
         return str_replace('&','&amp;',$string);   
        } else { 
         return $string;
        }  
   }  
?>  