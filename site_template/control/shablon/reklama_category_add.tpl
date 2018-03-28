{* Smarty *}
{literal}
<script type="text/javascript" language="javascript">
function kill(val) {
		vall = document.getElementById(val);
		vall.innerHTML = '';
	}
</script>
{/literal}
{literal}
<script type="text/javascript">
	function delete_files(val) {
		val.parentNode.innerHTML ='';
	}
</script>
{/literal}	
	
<form action="index.php?mod=reklama&task=save-category" method="POST"   enctype="multipart/form-data">





<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0">
	<thead>
	


	<tr>
	
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Название блока</span></td>
	<td class="admin-derr-60"><input type="text" name="name" value="{$category->name}" size="40" class="admin-derr-63"/></td>
		
	</tr>	

	

	<tr>
	
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Код блока</span></td>
	<td class="admin-derr-60"> <textarea name="text" cols="70" rows="20" id="MyTextarea" class="admin-derr-68b">{$text}</textarea></td>
		
	</tr>	


	<tr>
	
	<td colspan="2" class="admin-derr-61" >
	
<input id="publish" class="admin-derr-62	" type="submit" value="{php}echo _SAVE{/php}" accesskey="p" tabindex="4" name="save"/>
	
	
	</td>
		
	</tr>		
			
	
	
	</thead>	
</table>

 <input type="hidden" name="id" value="{$category->id}">
</form>


