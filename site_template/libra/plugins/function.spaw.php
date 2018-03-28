<?php
/**
* Smarty plugin
* @package Smarty
* @subpackage plugins
*/
/**
* Smarty {spaw} function plugin
*
* Type: function
* Name: spaw
* Date: Nov 11, 2007
* Purpose: automate creation Spaw Editor
* Input:
*     - name = name of textarea, default - 'Text'
*     - value = default value
*     - lang =
*     - toolbarset
*     - theme
*     - width
*     - height
*     - stylesheet
*     - page_caption
* Examples:
*     <pre>
*     {spaw}
*     {spaw name='Description' lang='en'}
*    
* @version 1.0
* @author Kirill Pavliukov <kirill></kirill>
* @param array
* @param Smarty
* @return string
* @todo Spaw Pages
*/
function smarty_function_spaw($params, &$smarty)
{
	global $abs_path;
	
    if (!defined('WWW_DIR')) define('WWW_DIR',$_SERVER['DOCUMENT_ROOT']);
    $name = ((isset($params['name'])) ? $params['name'] : null);
    $value = ((isset($params['name'])) ? $params['value'] : '');
    $lang = ((isset($params['lang'])) ? $params['lang'] : null);
    $toolbarset = ((isset($params['toolbarset'])) ? $params['toolbarset'] : '');
    $theme = ((isset($params['theme'])) ? $params['theme'] : '');
    $width = ((isset($params['width'])) ? $params['width'] : '');
    $height = ((isset($params['height'])) ? $params['height'] : '');
    $stylesheet = ((isset($params['stylesheet'])) ? $params['stylesheet'] : '');
    $page_caption= ((isset($params['page_caption'])) ? $params['page_caption'] : '');
    /*if ($name == null) $smarty->trigger_error('(SPAW) Parameter `Name` must be specified');
    if ($lang == null) {
        $lang = $front->getRequest()->getParam('language');
    }*/

    $pages = ((isset($params['pages'])) ? $params['pages'] : null);
    if ($name == '') $name = 'Text';
    
    //echo WWW_DIR . 'includes/spaw2/spaw.inc.php';
    //require_once(WWW_DIR . 'includes/spaw2/spaw.inc.php');
    require_once($abs_path.'/includes/spaw2/spaw.inc.php');
    $spaw = new SpawEditor($name, $value, $lang, $toolbarset, $theme, $width, $height, $stylesheet, $page_caption);
    
    if ($pages) {
        $pages = split(';',$pages);
        foreach ($pages as &$page) {
            $page = split('::',$page);
            if (!isset($page[0]) or empty($page[0])) $smarty->trigger_error('(SPAW) Page name myst be specified!');
            if (!isset($page[1]) or empty($page[1])) $smarty->trigger_error('(SPAW) Page caption myst be specified!');
            if (!isset($page[2])) $page[2] = '';
            if (!isset($page[3])) $page[3] = 'ltr';
            $spawPage = new SpawEditorPage($page[0],$page[1],$page[2],$page[3]);
            $spaw->addPage($spawPage);
        }
    }
    $spaw->show();
}

?>