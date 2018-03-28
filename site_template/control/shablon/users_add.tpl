
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
<script type="text/javascript">
$(function(){
  $.datepicker.setDefaults(
        $.extend($.datepicker.regional["ru"])
  );
  $("#datepicker").datepicker();
});
</script>
{/literal}	
{$stylelangsetting}	

<form action="index.php?mod=users&task=save" method="POST"   enctype="multipart/form-data">


<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0">
	<thead>
	


	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{php} echo _USER_NAME {/php}</span></td>
	<td class="admin-derr-60"><input type="text" name="name" value="{$user->name}" size="40" class="admin-derr-63"/></td>
	</tr>	


	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{php} echo _LOGIN{/php}</span></td>
	<td class="admin-derr-60"><input type="text" name="login" value="{$user->login}" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{php} echo _PHONE_WORK{/php}</span></td>
	<td class="admin-derr-60"><input type="text" name="phone_work" value="{$user->phone_work}" size="40" class="admin-derr-63"/><input type="hidden" name="group" value="5"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{php} echo _PHONE_HOME{/php}</span></td>
	<td class="admin-derr-60"><input type="text" name="phone_home" value="{$user->phone_home}" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">{php} echo _PHONE_MOBILE{/php}</span></td>
	<td class="admin-derr-60"><input type="text" name="mobile" value="{$user->mobile}" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">e-mail</span></td>
	<td class="admin-derr-60"><input type="text" name="email" value="{$user->email}" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Установить пароль</span></td>
	<td class="admin-derr-60"><input type="password" name="newpasswd" value="" size="40" class="admin-derr-63"/></td>
	</tr>	


	<tr>
	
	<td colspan="2" class="admin-derr-61" >
	
<input id="publish" class="admin-derr-62	" type="submit" value="{php}echo _SAVE{/php}" accesskey="p" tabindex="4" name="save"/>
	
	
	</td>
		
	</tr>		
		
	
	
	</thead>	
</table>	
	
 <input type="hidden" name="id" value="{$user->id}">	

</form>

	


	
	