{* Smarty *}

	<ul id="adminmenu" class="admin-derr-10 admin-derr-11">

	
{ foreach from=$menu_list item=menu}
	{ if $menu.type == "separator" }
<!--		<li class="wp-menu-separator">
			<br/>
		</li>		 -->
	{else}
{if  $menu.id != 0}		
	
	
				<li id="{$menu.class}" class="wp-has-submenu menu-top {$menu.style} admin-derr-05">
			<!--		<div class="wp-menu-image">
						<br/>
					</div>   -->
	{assign var="menu_link_new" value=`$menu.menu_link`}

					<a class="wp-has-submenu menu-top {$menu.style} admin-derr-04 admin-derr-06 admin-derr-07 {if $REQUEST_URI_new == $menu_link_new}admin-derr-39{/if} {if $url_catalog == $menu_link_new}admin-derr-39{/if}" tabindex="1" href="index.php?{ $menu.menu_link }{*if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if*}">{ $menu.name }</a>
					
{if  $menu.id != 30}					
{if $menu.items|count > 0}				
<div class="wp-submenu admin-derr-06" style="">
	<ul class="admin-derr-02 admin-derr-06 admin-derr-12">
 	{ foreach from=$menu.items item=submenu }
	{assign var="menu_link_new" value=`$submenu.menu_link`}

		  		{if $submenu.group == '2'}
	  <li class="{$submenu.style}"><span style="float:left;"><a href="index.php?mod=content&task=edit-category&id={$submenu.id}{if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if}" style="border-width: 0px 0px 0px 0px;" alt="редактировать" title="редактировать"><img src="shablon/img/edit_ico.png" alt="редактировать" title="редактировать" /></a></span><a href="index.php?{ $submenu.menu_link }{*if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if*}" class="{$submenu.style} ">{ $submenu.name }</a></li>	
			 {else}	
	  <li class="admin-derr-01 {$submenu.style} admin-derr-06"><a href="index.php?{ $submenu.menu_link }{*if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if*}" class="{$submenu.style} admin-derr-06 admin-derr-07 admin-derr-{if $submenu.menu1published == 1}08b{else}08{/if}  {if $REQUEST_URI == $menu_link_new}admin-derr-39{/if} {if $url_catalog == $menu_link_new}admin-derr-39{/if}">{ $submenu.name }</a></li>	
		  {/if}
	{assign var="menu_link_new" value=``}
	{ /foreach }
	</ul>
 </div>	
 </li>
{/if}   	
{/if}
{/if}
{/if}
{ /foreach }

</ul>