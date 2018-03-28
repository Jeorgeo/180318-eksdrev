<?php /* Smarty version 2.6.22, created on 2017-06-05 16:02:03
         compiled from users_add.tpl */ ?>

<?php echo '
<script type="text/javascript" language="javascript">
function kill(val) {
		vall = document.getElementById(val);
		vall.innerHTML = \'\';
	}
</script>
'; ?>

<?php echo '
<script type="text/javascript">
	function delete_files(val) {
		val.parentNode.innerHTML =\'\';
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
'; ?>
	
<?php echo $this->_tpl_vars['stylelangsetting']; ?>
	

<form action="index.php?mod=users&task=save" method="POST"   enctype="multipart/form-data">


<table class="widefat post fixed admin-derr-35 admin-derr-41c" cellspacing="0">
	<thead>
	


	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54"><?php  echo _USER_NAME  ?></span></td>
	<td class="admin-derr-60"><input type="text" name="name" value="<?php echo $this->_tpl_vars['user']->name; ?>
" size="40" class="admin-derr-63"/></td>
	</tr>	


	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54"><?php  echo _LOGIN ?></span></td>
	<td class="admin-derr-60"><input type="text" name="login" value="<?php echo $this->_tpl_vars['user']->login; ?>
" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54"><?php  echo _PHONE_WORK ?></span></td>
	<td class="admin-derr-60"><input type="text" name="phone_work" value="<?php echo $this->_tpl_vars['user']->phone_work; ?>
" size="40" class="admin-derr-63"/><input type="hidden" name="group" value="5"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54"><?php  echo _PHONE_HOME ?></span></td>
	<td class="admin-derr-60"><input type="text" name="phone_home" value="<?php echo $this->_tpl_vars['user']->phone_home; ?>
" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54"><?php  echo _PHONE_MOBILE ?></span></td>
	<td class="admin-derr-60"><input type="text" name="mobile" value="<?php echo $this->_tpl_vars['user']->mobile; ?>
" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">e-mail</span></td>
	<td class="admin-derr-60"><input type="text" name="email" value="<?php echo $this->_tpl_vars['user']->email; ?>
" size="40" class="admin-derr-63"/></td>
	</tr>	

	<tr>
	<td width="30%" class="admin-derr-60"><span class="admin-derr-54">Установить пароль</span></td>
	<td class="admin-derr-60"><input type="password" name="newpasswd" value="" size="40" class="admin-derr-63"/></td>
	</tr>	


	<tr>
	
	<td colspan="2" class="admin-derr-61" >
	
<input id="publish" class="admin-derr-62	" type="submit" value="<?php echo _SAVE ?>" accesskey="p" tabindex="4" name="save"/>
	
	
	</td>
		
	</tr>		
		
	
	
	</thead>	
</table>	
	
 <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['user']->id; ?>
">	

</form>

	


	
	