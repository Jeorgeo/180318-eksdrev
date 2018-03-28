<?php /* Smarty version 2.6.22, created on 2017-03-15 13:01:43
         compiled from users_list.tpl */ ?>


<?php echo '			
<script type="text/javascript">
function send() { 
if (confirm("Вы уверены что хотите выполнить данную операцию?"))
 { 
document.getElementById(\'oper\').innerHTML = \'<input type=\\\'hidden\\\' name=\\\'oper\\\' value=\\\'delete\\\'>\';
document.forms["view"].submit();
  } else { 
  }
}



function myformuserbox(id) { 
document.getElementById(\'my_form_user_box_id\').innerHTML = \'<input type=\\\'hidden\\\' name=\\\'select_user\\\' value=\\\'\'+id+\'\\\'>\';
document.forms[\'my_form_user\'].submit();
}

function myformuserboxU(id,user) { 
document.getElementById(\'my_form_user_box_idd\').innerHTML = \'<input type=\\\'hidden\\\' name=\\\'select_vis\\\' value=\\\'\'+id+\'\\\'><input type=\\\'hidden\\\' name=\\\'select_user\\\' value=\\\'\'+user+\'\\\'>\';
document.forms[\'my_form_user_d\'].submit();
}

function myformuserboxUser(id) { 

var textarea = document.getElementById(\'textarea-\'+id).value;
var email = document.getElementById(\'email-\'+id).value;
var idd = document.getElementById(\'id-\'+id).value;
var text = document.getElementById(\'text-\'+id).value;
alert (\'Сообщение отправлено пользователю\');

document.getElementById(\'formsenderbox\').innerHTML = \'<input type=\\\'hidden\\\' name=\\\'textarea\\\' value=\\\'\'+textarea+\'\\\'><input type=\\\'hidden\\\' name=\\\'email\\\' value=\\\'\'+email+\'\\\'><input type=\\\'hidden\\\' name=\\\'text\\\' value=\\\'\'+text+\'\\\'><input type=\\\'hidden\\\' name=\\\'id\\\' value=\\\'\'+idd+\'\\\'><input type=\\\'hidden\\\' name=\\\'form_id\\\' value=\\\'18\\\'><input type=\\\'hidden\\\' name=\\\'select_vis\\\' value=\\\'{$read_id}\\\'><input type=\\\'hidden\\\' name=\\\'select_user\\\' value=\\\'{$user_id}\\\'>\'; 
document.forms[\'my_form_user_q\'].submit();

}




function mycnop() { 

var count = document.getElementById(\'count_content_list\').value;
var bord = 0;

for (var i = 0; i < count; i++) {
	if (document.getElementById(\'mycheckbox-\'+i).checked == true) {bord = 1;}
}

if (bord == 0) {
fixForIpad(\'admin-derr-30\', 0);
fixForIpad(\'admin-derr-28\', 1);
fixForIpad(\'admin-derr-28b\', 0);
	} else {
fixForIpad(\'admin-derr-30\', 1);
fixForIpad(\'admin-derr-28\', 0);
fixForIpad(\'admin-derr-28b\', 1);
}

}

function mycnops() { 

fixForIpad(\'admin-derr-30\', 0);
if (document.getElementById(\'checkAllbox\').checked != true) 
{
fixForIpad(\'admin-derr-28\', 1);
fixForIpad(\'admin-derr-28b\', 0);
	} else {
fixForIpad(\'admin-derr-28\', 0);
fixForIpad(\'admin-derr-28b\', 1);
}

}




</script>
'; ?>
			




<form name="my_form_user" action="" method="POST" enctype="multipart/form-data">
<div id="my_form_user_box_id"></div>
</form>	

<form name="my_form_user_d" action="" method="POST" enctype="multipart/form-data">
<div id="my_form_user_box_idd"></div>
</form>	


<div class="admin-derr-25">
<label class="admin-derr-26 admin-derr-27">
<input onclick="mycnops(); checkAll(this, 'box[]');" type="checkbox" id="checkAllbox">
<div class="admin-derr-30" id="admin-derr-30"></div>
</label>

<!--button class="admin-derr-28" disabled=""><div class="i-messenger i-messenger-abuse"></div>Спам</button-->

<button class="admin-derr-28" id="admin-derr-28" ><div class="i-messenger i-messenger-trash"></div>Удалить</button>

<button class="admin-derr-28b" id="admin-derr-28b" onclick="send();"><div class="i-messenger i-messenger-trash-active"></div>Удалить</button>

<a href="index.php?mod=users&task=add"><button class="admin-derr-28b"><div class="i-messenger i-messenger-abuse"></div>Добавить</button></a>


<?php $this->assign('count_no_read', '0'); ?>
<?php $_from = $this->_tpl_vars['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content']):
?>
<?php if ($this->_tpl_vars['content']['read_id'] == 1): ?>
<?php $this->assign('count_no_read', '1'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>






<div style="clear:both;"></div>

</div>









<form name="view" method="post">


<table class="widefat post fixed admin-derr-35" cellspacing="0">
	<thead>
	
	
<?php $this->assign('count_content_list', '0'); ?>		
	<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
	<tr>
		<td style="width:25px;"><input type="checkbox" name="box[]" value="<?php echo $this->_tpl_vars['user']['id']; ?>
" onclick="mycnop();" id="mycheckbox-<?php echo $this->_tpl_vars['count_content_list']; ?>
"></td>

		<td style="" class="admin-derr-31" colspan="2">
		<a href="index.php?mod=users&task=edit&id=<?php echo $this->_tpl_vars['user']['id']; ?>
">
		<span class="admin-derr-31"><?php echo $this->_tpl_vars['user']['name']; ?>
</span></a></td>
		
		<td style="text-align:right; width:150px;" colspan="2" class="admin-derr-37"><?php echo $this->_tpl_vars['user']['group_name']; ?>
</td>
		
	</tr>	 
<?php $this->assign('count_content_list', $this->_tpl_vars['count_content_list']+1); ?>		
	<?php endforeach; endif; unset($_from); ?>		
	</thead>	
</table>
<div style="padding-top:0px;"><?php echo $this->_tpl_vars['page_nav']; ?>
</div><br/><br/>	
	
<input id="count_content_list" name="count_content_list" type="hidden" value="<?php echo $this->_tpl_vars['count_content_list']; ?>
">
<div id="oper"></div>

</form>	



<form name="my_form_user_q" action="" method="POST" enctype="multipart/form-data">
<div id="formsenderbox"></div>
</form>	



	
	
	
	




	