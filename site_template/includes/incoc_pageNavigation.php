<?php
 defined( '_MANAGE_MODE' ) or die( 'Доступ запрещен' );
 
 class pageNav {
 	var $total;
 	var $limitstart;
 	var $limit;

 	function pageNav ($total,$limitstart,$limit) {
 		$this->total = $total;
 		$this->limitstart = $limitstart;
 		$this->limit = $limit; 		
 	}
  	
    function writePageLinks($link) {
	
		$haystack = '/control/';
		if (substr_count($_SERVER[REQUEST_URI], $haystack) > 0) {     

		$displayed_pages = 1000;
		$txt .= "<div id='pagenav'><br/>";
    	$total_pages = $this->limit ? ceil( $this->total / $this->limit ) : 0;
    	$this_page = $this->limit ? ceil( ($this->limitstart+1) / $this->limit ) : 1; 
    	$start_loop = (floor(($this_page-1)/$displayed_pages))*$displayed_pages+1;
		if ($start_loop + $displayed_pages - 1 < $total_pages) {
			$stop_loop = $start_loop + $displayed_pages - 1;
		} else {
			$stop_loop = $total_pages;
		}

    		$link .= '&amp;limit='. $this->limit;

        if (!defined( '_PN_LT' ) || !defined( '_PN_RT' ) ) {
            DEFINE('_PN_LT','&lt;');
            DEFINE('_PN_RT','&gt;');
        }

		$pnSpace = '';
		if (_PN_LT || _PN_RT) $pnSpace = "&nbsp;";

		for ($i=$start_loop; $i <= $stop_loop; $i++) {
			$page = ($i - 1) * $this->limit;
			if (($i % 26) == 0) {
			  $txt.='<br/><br/>';
			}
			if ($i == $this_page) {
				$txt .= '<div id="number_active"><div class="number_active_pr">'. $i .'</div></div>';
			} else {
				$txt .= "<div id='number'><a href=\"$link&amp;limitstart=$page\" class=\"pagenav\"><strong>". $i .'</strong></a></div>';
			}
		}
		$txt .= "</div>";
		return $txt;	


		} else {	
 
		$displayed_pages = 21; 
		$displayed_pages_centr = floor($displayed_pages/2);
		
    	$total_pages = $this->limit ? ceil( $this->total / $this->limit ) : 0;   // всего страниц
 
		if ($total_pages > 0) {$txt .= '<div id="pagenav">';}
		if (isset($_GET['limitstart'])) {$sdvig_page = (($_GET['limitstart']/10)+1);} else  {$sdvig_page = 0;}   // текущая страница
		$this_page = $this->limit ? ceil( ($this->limitstart+1) / $this->limit ) : 1;   
		
		if (($sdvig_page-$displayed_pages_centr) <=0 ) {$start_loop = 1;} else {$start_loop = $sdvig_page-$displayed_pages_centr;} // стартовая страница
		if ($start_loop + $displayed_pages - 1 < $total_pages) {    // расчет конечной страницы
			$stop_loop = $start_loop + $displayed_pages - 1;
		} else {
			$stop_loop = $total_pages; if (($total_pages - $displayed_pages) <= 0) {} else {$start_loop = $total_pages - $displayed_pages ;}
		}

//    	if ($GLOBALS['CH_P_Y'] == 0)  {	$link .= '&amp;limit='. $this->limit; }

        if (!defined( '_PN_LT' ) || !defined( '_PN_RT' ) ) {
            DEFINE('_PN_LT','&lt;');
            DEFINE('_PN_RT','&gt;');
        }

		$pnSpace = '';
		if (_PN_LT || _PN_RT) $pnSpace = "&nbsp;";

		
		if ($start_loop == 1) {} else {
//		if ($GLOBALS['CH_P_Y'] == 0)  {$txt .= '<div id="number"><a href="'.$link.'&amp;limitstart=0" class="pagenav"><strong>1</strong></a></div><div id="number_07071">...</div>';}
		$txt .= '<div id="number"><a href="'.$link.'-0.html" class="pagenav"><strong>1</strong></a></div><div id="number_07071">...</div>';
		}
		
		for ($i=$start_loop; $i <= $stop_loop; $i++) {
			$page = ($i - 1) * $this->limit;
//			if (($i % 26) == 0) { $txt.='<br/><br/>';}
			if ($i == $this_page) {
				$txt .= '<div id="number_active"><div class="number_active_pr">'. $i .'</div></div>';
			} else {
//		if ($GLOBALS['CH_P_Y'] == 0)  {$txt .= "<div id='number'><a href=\"$link&amp;limitstart=$page\" class=\"pagenav\"><strong>". $i .'</strong></a></div>';}
$txt .= "<div id='number'><a href=\"$link-$page.html\" class=\"pagenav\"><strong>". $i .'</strong></a></div>';
			}
		}
		
		if ($stop_loop == $total_pages) {} else {
		$fix_tot_07072 = (($total_pages-1)*10); 
//		if ($GLOBALS['CH_P_Y'] == 0)  {$txt .= '<div id="number_07071">...</div><div id="number"><a href="'.$link.'&amp;limitstart=' . $fix_tot_07072 . '" class="pagenav"><strong>' . $total_pages . '</strong></a></div>';}
$txt .= '<div id="number_07071">...</div><div id="number"><a href="'.$link.'-' . $fix_tot_07072 . '.html" class="pagenav"><strong>' . $total_pages . '</strong></a></div>';
		}

		if ($total_pages > 0) {$txt .= "</div>";}
		return $txt;				

		}
    }
 }
?>