<?php /* Smarty version 2.6.22, created on 2017-03-15 12:33:44
         compiled from auth.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'auth.tpl', 20, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="Content-Language" content="ru" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php if ($this->_tpl_vars['mod'] == ''): ?>
	<meta http-equiv="keywords" content="<?php echo $this->_tpl_vars['sets']['meta_key']['value']; ?>
" />
	<meta http-equiv="description" content="<?php echo $this->_tpl_vars['sets']['meta_desc']['value']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['mod'] == 'opisanie' || $this->_tpl_vars['mod'] == 'opisanie_model' || $this->_tpl_vars['mod'] == 'autoproizv'): ?>
	<meta http-equiv="keywords" content="<?php echo $this->_tpl_vars['dop_keywords']; ?>
" />
	<meta http-equiv="description" content="<?php echo $this->_tpl_vars['dop_descr']; ?>
" />
<?php endif; ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['path']; ?>
/template/style.css" type="text/css" />
<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['path']; ?>
/template/ie.css" />
<![endif]-->
<link rel="icon" href="<?php echo $this->_tpl_vars['path']; ?>
/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['path']; ?>
/images/favicon.ico" type="image/x-icon" />
<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['sets']['title']['value']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['sets']['title']['value'])); ?>
</title>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['path']; ?>
/includes/jquery/jquery.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['path']; ?>
/template/ajax.js'></script>
<script src="<?php echo $this->_tpl_vars['path']; ?>
/includes/js/ajaxupload.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/includes/custom.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/includes/featuredcontentglider.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/template/jquery-1.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/template/tools000.js"></script>


<?php echo '
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
-->
</script>

<!--[if lte IE 6]><script type="text/javascript" src="includes/supersleight.js"></script><![endif]-->

	<script type="text/javascript">
	featuredcontentglider.init({
		gliderid: "headline-content",
		contentclass: "glidecontent",
		togglerid: "teaser",
		remotecontent: "",
		selected: 0,
		persiststate: false,
		speed: 500,
		direction: "leftright",
		autorotate: true,
		autorotateconfig: [5000, 5]
	})
		</script>
'; ?>

</head>
<body style="overflow-y:scroll;">
   <div id="centerggrtf">

<div id="login-form2" class="ligthWindow-container2">
    <div class="border2">
    	<div class="w2">
            <h3>Вход на сайт</h3>
            <form name="loginform" action="" id="frmAuthorize" method="post">
                <fieldset>
                    <label for="login" class="name">Пользователь:</label> <input id="login" type="text" class="text" name="log" value="" tabindex="10" />
                    <br />
                    <label for="pass" class="name">Пароль:</label> <input id="pass" type="password" class="text" name="pwd" value="" tabindex="20" />
                    <div class="r">
                    <input type="submit" class="submit" value="Войти" name="submit" tabindex="100" />
					<input name="testcookie" value="1" type="hidden">
                       
                    </div>

                </fieldset>
            </form>
		
            <a href="/"><div class="close"></div></a>
        </div>
    </div>
</div>

</div>

	

	<!-- foter end -->
  </div>	
</body>
</html>