<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="Content-Language" content="ru" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
{if $mod == ''}
	<meta http-equiv="keywords" content="{$sets.meta_key.value}" />
	<meta http-equiv="description" content="{$sets.meta_desc.value}" />
{/if}
{if $mod == 'opisanie' or $mod == 'opisanie_model' or $mod == 'autoproizv'}
	<meta http-equiv="keywords" content="{$dop_keywords}" />
	<meta http-equiv="description" content="{$dop_descr}" />
{/if}
<link rel="stylesheet" href="{$path}/template/style.css" type="text/css" />
<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="{$path}/template/ie.css" />
<![endif]-->
<link rel="icon" href="{$path}/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="{$path}/images/favicon.ico" type="image/x-icon" />
<title>{$title|default:$sets.title.value}</title>
<script type='text/javascript' src='{$path}/includes/jquery/jquery.js'></script>
<script type='text/javascript' src='{$path}/template/ajax.js'></script>
<script src="{$path}/includes/js/ajaxupload.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="{$path}/includes/custom.js"></script>
<script type="text/javascript" src="{$path}/includes/featuredcontentglider.js"></script>
<script type="text/javascript" src="{$path}/template/jquery-1.js"></script>
<script type="text/javascript" src="{$path}/template/tools000.js"></script>


{literal}
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
{/literal}
</head>
<body style="overflow-y:scroll;">
  <div id="centerggrtf">
<div id="login-form2" class="ligthWindow-container2" style="valign: middle;">
    <div class="border2">
    	<div class="w2">
            <h3>Форма напоминания пароля</h3>
			<form name="lostpasswordform" id="lostpasswordform" action="/password_recower.php?task=checkmail" id="frmAuthorize" method="post">
                <fieldset>
					{$mess}
					 <label for="login" class="name">E-Mail:</label><input type="text" name="email" size="20" tabindex="10" />
					
                    <input type="submit" class="submit2" value="Получить пароль" name="submit" tabindex="100" />

                </fieldset>
            </form>
		
            <a href="/"><div class="close"></div></a>
        </div>
    </div>
</div></div>


</body>
</html>


