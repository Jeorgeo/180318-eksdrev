{* Smarty *}
{ foreach from=$menu_list item=menu}
{if  $menu.id == 30}		
	

	<ul id="adminmenu" class="admin-derr-10 admin-derr-11">

	
				<li id="{$menu.class}" class="wp-has-submenu menu-top {$menu.style} admin-derr-05">

				
	{assign var="menu_link_new" value=`$menu.menu_link`}

					<div class="wp-has-submenu menu-top {$menu.style} admin-derr-04 admin-derr-06 admin-derr-07 {if $REQUEST_URI_new == $menu_link_new}admin-derr-39{/if} {if $url_catalog == $menu_link_new}admin-derr-39{/if}" ><span id="span001" onclick="fixForIpad('span001b', 1);fixForIpad('span001c', 1);fixForIpad('span001', 0);" {if $cont_razdel_id == '0'} style="display:none;"{/if}">Все разделы</span><span class="admin-derr-81" id="span001b" onclick="fixForIpad('span001b', 0);fixForIpad('span001c', 0);fixForIpad('span001', 1);"{if $cont_razdel_id == '0'} style="display:block;"{/if}>Все разделы</span></div>
							
{if $menu.items|count > 0}				
<div class="wp-submenu admin-derr-06" {if $cont_razdel_id == '0'} style="display:block;"{else}style="display:none;"{/if} id="span001c">
	<ul class="admin-derr-02 admin-derr-06 admin-derr-12">
 	{ foreach from=$menu.items item=submenu }
		{if $submenu.razdel_id == '0'}
	{assign var="menu_link_new" value=`$submenu.menu_link`}
	

		  		{if $submenu.group == '2'}
	  <li class="{$submenu.style}"><span style="float:left;"><a href="index.php?mod=content&task=edit-category&id={$submenu.id}{if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if}" style="border-width: 0px 0px 0px 0px;" alt="редактировать" title="редактировать"><img src="shablon/img/edit_ico.png" alt="редактировать" title="редактировать" /></a></span><a href="index.php?{ $submenu.menu_link }{*if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if*}" class="{$submenu.style} ">{ $submenu.name }</a></li>	
			 {else}	
	  <li class="admin-derr-01 {$submenu.style} admin-derr-06"><a href="index.php?{ $submenu.menu_link }{*if $read_id != ''}&select_vis={$read_id}{/if}{if $user_id != ''}&select_user={$user_id}{/if*}" class="{$submenu.style} admin-derr-06 admin-derr-07 admin-derr-08  {if $REQUEST_URI == $menu_link_new}admin-derr-39{/if} {if $url_catalog == $menu_link_new}admin-derr-39{/if}">{ $submenu.name }</a></li>	
		  {/if}
{/if}
	{assign var="menu_link_new" value=``}
	{ /foreach }
	</ul>
 </div>	
 {/if}
 </li>



{if $session_gr == 0}	
				<li id="{$menu.class}" class="wp-has-submenu menu-top {$menu.style} admin-derr-05">

				
	{assign var="menu_link_new" value=`$menu.menu_link`}

					<div class="wp-has-submenu menu-top {$menu.style} admin-derr-04 admin-derr-06 admin-derr-07 {if $REQUEST_URI_new == $menu_link_new}admin-derr-39{/if} {if $url_catalog == $menu_link_new}admin-derr-39{/if}" ><span id="span003" onclick="fixForIpad('span003b', 1);fixForIpad('span003c', 1);fixForIpad('span003', 0);"{if $cont_user_id != '-1'} style="display:none;"{/if}>Все менеджеры</span><span class="admin-derr-81" id="span003b" onclick="fixForIpad('span003b', 0);fixForIpad('span003c', 0);fixForIpad('span003', 1);"{if $cont_user_id != '-1'} style="display:block;"{/if}>Все менеджеры</span></div>
							
{if $useritems|count > 0}				
<div class="wp-submenu admin-derr-06" {if $cont_user_id != '-1'} style="display:block;"{else} style="display:none;"{/if} id="span003c">
	<ul class="admin-derr-02 admin-derr-06 admin-derr-12">
 	{ foreach from=$useritems item=submenu }
	
	  <li class="admin-derr-01 {$submenu.style} admin-derr-06"><a href="index.php?mod={$mod}&user={ $submenu.id }" class="admin-derr-06 admin-derr-07 admin-derr-08  {if $cont_user_id == $submenu.id}admin-derr-39{/if}">{ $submenu.name } ({ $submenu.count })</a></li>	

	{ /foreach }
	</ul>
 </div>	
 {/if}
 </li>
{/if}



 

</ul>





{/if}
{ /foreach }


