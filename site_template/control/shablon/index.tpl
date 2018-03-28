<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="ru-RU">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>{$title} - {$caption}</title>
	
	<link rel="icon" href="{$path}/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="{$path}/favicon.ico" type="image/x-icon" />	
	<link rel="stylesheet" href="{$path}/control/template/css/regadmin.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/regglobal.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/regdashboard.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/ui.all.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/regcolor.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/ru_RU.css" type="text/css" media="all">
	<link rel="stylesheet" href="{$path}/control/template/css/statics/main.css" type="text/css" media="all">

<!-- сайт -->	
{literal}	
	<link rel="shortcut icon" href="/img/favicon.png"  />

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script><![endif]-->
<!--[if IE 6 ]><link href="/css/ie6.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7 ]><link href="/css/ie7.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 8 ]><link href="/css/ie8.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->

<link rel="stylesheet" id="google-font-api-css"  href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" type="text/css" media="all" />
<link rel="stylesheet" href="/css/print.css" type="text/css" media="print" />

<script type="text/javascript">
          var body_parallax_speed = "0.5";
          var page_parallax_speed = "0.5";
</script>



		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>

<link rel="stylesheet" id="theme-my-login-css"  href="/css/theme-my-login.css" type="text/css" media="all" />
<link rel="stylesheet" id="wp-publication-archive-frontend-css"  href="/css/front-end.css" type="text/css" media="all" />
<link rel="stylesheet" id="cookielawinfo-style-css"  href="/css/cli-style.css" type="text/css" media="all" />
<link rel="stylesheet" id="responsive-lightbox-swipebox-css"  href="/css/swipebox.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="wp-email-css"  href="/css/email-css.css" type="text/css" media="all" />
<link rel="stylesheet" id="qts_front_styles-css"  href="/css/qts-default.css" type="text/css" media="all" />
<link rel="stylesheet" id="layerslider_css-css"  href="/css/layerslider.css" type="text/css" media="all" />
<link rel="stylesheet" id="theme-style-css"  href="/css/general.css" type="text/css" media="all" />


<link rel="stylesheet" id="theme-widgets-css"  href="/css/widgets.css" type="text/css" media="all" />
<link rel="stylesheet" id="theme-shortcodes-css"  href="/css/shortcodes.css" type="text/css" media="all" />
<link rel="stylesheet" id="theme-responsive-css"  href="/css/responsive.css" type="text/css" media="all" />
<link rel="stylesheet" id="theme-skin-css"  href="/css/skin.css" type="text/css" media="all" />

{/literal}




	
	
	
<script>
		var examples = [];
</script>
	
	<script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="{$path}/includes/js/ajaxupload.js" type="text/javascript" language="javascript"></script>
	<script type='text/javascript' src='{$path}/includes/js/hoverIntent.js'></script>
	<script type='text/javascript' src='{$path}/includes/js/common.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/jquery.color.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/jquery.form.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/suggest.js'></script>
	<script type='text/javascript' src='{$path}/includes/js/inline-edit-post.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/ui.core.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/ui.datepicker.js'></script>
	<script type='text/javascript' src='{$path}/includes/jquery/ui.datepicker-ru.js'></script>	
    <script type="text/javascript" src="{$path}/includes/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{$path}/js/fixForIpad.js"></script>

	
<!--[if gte IE 6]>
<link rel='stylesheet' href='{$path}/control/template/css/ie.css' type='text/css' media='all' />
<![endif]-->
<!--[if IE]>
<link rel='stylesheet' href='{$path}/control/template/css/ru_RU-ie.css' type='text/css' media='all' />
<![endif]-->
	
	
	
	
	</head>		
<body class="admin-derr-24">




<div class="admin-derr-23">

	<div id="wpwrap" class="admin-derr-09 admin-derr-22">
	 <div id="wpcontent">
	 	<div id="wphead">
				<h1><a href="index.php">Личный кабинет</a></h1>
				<div id="wphead-info">
					<div id="user_info">
						
					</div>
				</div>					
	 </div>	
			
		<div id="wpbody">
		
	{include file=menu.tpl}

{if $mod == 'content'}
{if $task != 'category'}
{if $task != 'add-category'}
{if $task != 'save-category'}
 	{include file=menu2.tpl}
{/if}
{/if}
{/if}
{/if}
 	
	<ul id="adminmenu" class="admin-derr-11b">

<li>	
	<div class="b-personal-manager">
	<div class="admin-derr-21">
	<div class="admin-derr-20">
	<div class="admin-derr-19">{$session_mg}</div>
	<div class="admin-derr-17">Ваш ID <span class="admin-derr-18">{$session_us}</span></div>
	</div>
	</div>
	
	<div class="body">
	
	<div class="admin-derr-15">
	<div class="admin-derr-16">{$session_user->name}</div>
	</div>

{if $session_user->email != ''}	
	<div class="admin-derr-15">
	<div class="admin-derr-13">Эл. почта</div><div class="admin-derr-14">{$session_user->email}</div>
	</div>
{/if}
	
{if $session_user->phone_work != ''}
	<div class="admin-derr-15">
	<div class="admin-derr-13">Телефон</div><div class="admin-derr-14">{$session_user->phone_work}</div>
	</div>
{/if}

{if $session_user->mobile != ''}
	<div class="admin-derr-15">
	<div class="admin-derr-13">Телефон</div><div class="admin-derr-14">{$session_user->mobile}</div>
	</div>
{/if}
	
	<div class="admin-derr-15">
	<div class="admin-derr-13"><a href="index.php?mod=users&task=edit&id={$session_us}">Изменить данные</a></div><div class="admin-derr-14"><a href="index.php?task=logout">Выход</a></div>
	</div>
	
	</div>
	
	</div>
</li>

	</ul>
	
			<div id="wpbody-content" style="overflow: hidden;">
				<div class="wrap" style="padding-left:10px;">
				{*					<h2>{$caption}</h2>
				<div>{$MSG}</div>*}
				<div class="admin-derr-58">
				{include file=$content_template}
				</div>	
				</div>				
			</div>	
			<div class="clear"/>
		</div>	
	</div>	
	</div>
	</div></div>

	
	
	

<script src="{$path}/includes/FileAPI/FileAPI.min.js"></script>
<script src="{$path}/includes/jquery.fileapi.js"></script>

	{literal}
	<script>
		jQuery(function ($){
			var $blind = $('.splash__blind');

			$('.splash')
				.mouseenter(function (){
					$('.splash__blind', this)
						.animate({ top: -10 }, 'fast', 'easeInQuad')
						.animate({ top: 0 }, 'slow', 'easeOutBounce')
					;
				})
				.click(function (){
					if( !FileAPI.support.media ){
						$blind.animate({ top: -$(this).height() }, 'slow', 'easeOutQuart');
					}

					FileAPI.Camera.publish($('.splash__cam'), function (err, cam){
						if( err ){
							alert("Unfortunately, your browser does not support webcam.");
						} else {
							$('.splash').off();
							$blind.animate({ top: -$(this).height() }, 'slow', 'easeOutQuart');
						}
					});
				})
			;


			$('.example').each(function (){
				var $example = $(this);

				$example.find('h2').append('<div class="example__tabs"><a class="active" data-tab="javascript">code</a> <a data-tab="html">html</a></div>');

				$('<div></div>')
					.append('<div data-code="javascript"><pre><code>'+ $.trim(_getCode($example.find('script'))) +'</code></pre></div>')
					.append('<div data-code="html" style="display: none"><pre><code>'+ $.trim(_getCode($example.find('.example__left'), true)) +'</code></pre></div>')
					.appendTo($example.find('.example__right'))
					.find('[data-code]').each(function (){
						/** @namespace hljs -- highlight.js */
						if( window.hljs && (!$.browser.msie || parseInt($.browser.version, 10) > 7) ){
							this.className = 'example__code language-' + $.attr(this, 'data-code');
							hljs.highlightBlock(this);
						}
					})
				;
			});


			$('body').on('click', '[data-tab]', function (evt){
				evt.preventDefault();

				var el = evt.currentTarget;
				var tab = $.attr(el, 'data-tab');
				var $example = $(el).closest('.example');

				$example
					.find('[data-tab]')
						.removeClass('active')
						.filter('[data-tab="'+tab+'"]')
							.addClass('active')
							.end()
						.end()
					.find('[data-code]')
						.hide()
						.filter('[data-code="'+tab+'"]').show()
				;
			});


			function _getCode(node, all){
				var code = FileAPI.filter($(node).prop('innerHTML').split('\n'), function (str){ return !!str; });
				if( !all ){
					code = code.slice(1, -2);
				}

				var tabSize = (code[0].match(/^\t+/) || [''])[0].length;

				return $('<div/>')
					.text($.map(code, function (line){
						return line.substr(tabSize).replace(/\t/g, '   ');
					}).join('\n'))
					.prop('innerHTML')
						.replace(/ disabled=""/g, '')
						.replace(/&amp;lt;%/g, '<%')
						.replace(/%&amp;gt;/g, '%>')
				;
			}


			// Init examples
			FileAPI.each(examples, function (fn){
				fn();
			});
		});
	</script>
{/literal}
	
	
	
	
</body>
</html>	
