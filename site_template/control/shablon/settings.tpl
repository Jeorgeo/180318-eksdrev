{* Smarty *}

{$stylelangsetting}	
{literal}	
<script type="text/javascript">
function boxadd(id) {
var newid = id + 1;
document.getElementById('new_box_'+id).innerHTML = '<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0" id="published_'+id+'"><thead><tr><td width="30%" class="admin-derr-60"><span class="admin-derr-54">Блок '+id+'</span><br /><span style="color:red; font-size:10px; cursor:pointer;" onclick="boxunpublished('+id+');">Удалить блок '+id+'</span><div id="unpublished_'+id+'"><input type="hidden" name="box_published['+id+']" value="1" /></div></td><td class="admin-derr-60"><input type="text" name="box_name['+id+']" value="" size="40" class="admin-derr-63"/><input type="hidden" name="box['+id+']" value="'+id+'" /></td></tr><tr><td colspan="2" class="admin-derr-60"><div class="admin-derr-80"><textarea name="box_text['+id+']" id="box_text_'+id+'" style="width: 100%; height: 200px; display: none; overflow: scroll;" rows="10" cols="10"></textarea></div></td></tr><tr><td width="30%" class="admin-derr-60"><span class="admin-derr-54">Дополнительная информация</span></td><td class="admin-derr-60"><input type="text" name="box_dop_text['+id+']" value="" size="40" class="admin-derr-63"/></td></tr><tr><td width="100%" colspan="2" class="admin-derr-60"><hr style="border: none;  background-color: #ddd;  color: #ddd;  height: 1px;"></td></tr></thead></table><div id="new_box_'+newid+'"></div>';
CKEDITOR.replace( 'box_text_'+id+'');
document.getElementById('new_box').innerHTML = '<button class="admin-derr-76" onclick="boxadd('+newid+');">Добавить блок</button>';

}
function boxunpublished(id) {
document.getElementById('unpublished_'+id).innerHTML = '<input type="hidden" name="box_published['+id+']" value="0" />';
fixForIpad('published_'+id, 0);
}
</script>
{/literal}	

<form action="index.php?mod=settings&task=save" method="POST" enctype="multipart/form-data">




<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0">
	<thead>
	
	
{assign var="count_content_list" value="0"}		

	<tr>
	
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{$sets.title.title}</span></td>
	<td class="admin-derr-60"><input  type="text" name="set[{$sets.title.name}]" value="{$sets.title.value}" size="40" class="admin-derr-63"/></td>
		
	</tr>		
		
	<tr>
	
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{$sets.meta_key.title}</span></td>
	<td class="admin-derr-60"><input type="text" name="set[{$sets.meta_key.name}]" value="{$sets.meta_key.value}" size="40" class="admin-derr-63"/></td>
		
	</tr>		
		
	<tr>
	
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{$sets.meta_desc.title}</span></td>
	</tr>		
		
	
	<tr>
	
	<td colspan="2" class="admin-derr-60">
	<div class="admin-derr-80">
<textarea name="set[{$sets.meta_desc.name}]" id="counter" style="width: 100%; height: 100px;" rows="5" cols="10">{$sets.meta_desc.value}</textarea>
	
	</div>
	</td>
		
	</tr>		
	
	
	</thead>	
</table>
		
		{if count($main_box) > 0}
{ foreach from=$main_box item=box}		
	{if $box.published == 1}	
<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0" id="published_{$box.id}">
	<thead>
	
<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Блок {$box.id}</span><br /><span style="color:red; font-size:10px; cursor:pointer;" onclick="boxunpublished({$box.id});">Удалить блок {$box.id}</span>
<div id="unpublished_{$box.id}"><input type="hidden" name="box_published[{$box.id}]" value="{$box.published}" /></div></td>
	<td class="admin-derr-60"><input type="text" name="box_name[{$box.id}]" value="{$box.name}" size="40" class="admin-derr-63"/><input type="hidden" name="box[{$box.id}]" value="{$box.id}" /></td>
</tr>		
		
	
<tr>
	
	<td colspan="2" class="admin-derr-60">
	<div class="admin-derr-80">
<textarea name="box_text[{$box.id}]" id="box_text_{$box.id}" style="width: 100%; height: 200px; display: none; overflow: scroll;" rows="10" cols="10">{$box.text}</textarea>
<script type="text/javascript">
CKEDITOR.replace( 'box_text_{$box.id}');
</script>	
	</div>
	</td>
</tr>

	
<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Дополнительная информация</span></td>
	<td class="admin-derr-60"><input type="text" name="box_dop_text[{$box.id}]" value="{$box.dop_text}" size="40" class="admin-derr-63"/></td>
</tr>		

<tr>
	<td width="100%" colspan="2" class="admin-derr-60"><hr style="border: none;  background-color: #ddd;  color: #ddd;  height: 1px;"></td>
</tr>
			
	</thead>	
</table>
{/if}
{assign var="id_main_box" value=$box.id+1}		
{ /foreach }		
		{else}
			{assign var="id_main_box" value="1"}		
		{/if}

<input type="hidden" name="last_id" value="{$id_main_box}" />		
<div id="new_box_{$id_main_box}"></div>

<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0">
	<thead>
	
	<tr>
	
	<td colspan="2" class="admin-derr-60" >
<input id="publish" class="admin-derr-62" type="submit" value="Сохранить" accesskey="p" tabindex="4" name="save"/>
	</td>
		
	<td colspan="2" class="admin-derr-60" >
<div class="admin-derr-74 admin-derr-77" id="new_box">
<button class="admin-derr-76" onclick="boxadd({$id_main_box});">Добавить блок</button>
</div>
	</td>
		
	</tr>		
		
	
	
	
	</thead>	
</table>


</form>
