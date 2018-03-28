{* Smarty *}


{* Smarty *}

{literal}			
<script type="text/javascript">
function send() { 
if (confirm("Вы уверены что хотите выполнить данную операцию?"))
 { 
document.getElementById('oper').innerHTML = '<input type=\'hidden\' name=\'oper\' value=\'delete\'>';
document.forms["view"].submit();
  } else { 
  }
}



function myformuserbox(id) { 
document.getElementById('my_form_user_box_id').innerHTML = '<input type=\'hidden\' name=\'select_user\' value=\''+id+'\'>';
document.forms['my_form_user'].submit();
}

function myformuserboxU(id,user) { 
document.getElementById('my_form_user_box_idd').innerHTML = '<input type=\'hidden\' name=\'select_vis\' value=\''+id+'\'><input type=\'hidden\' name=\'select_user\' value=\''+user+'\'>';
document.forms['my_form_user_d'].submit();
}

function myformuserboxUser(id) { 

var textarea = document.getElementById('textarea-'+id).value;
var email = document.getElementById('email-'+id).value;
var idd = document.getElementById('id-'+id).value;
var text = document.getElementById('text-'+id).value;
alert ('Сообщение отправлено пользователю');

document.getElementById('formsenderbox').innerHTML = '<input type=\'hidden\' name=\'textarea\' value=\''+textarea+'\'><input type=\'hidden\' name=\'email\' value=\''+email+'\'><input type=\'hidden\' name=\'text\' value=\''+text+'\'><input type=\'hidden\' name=\'id\' value=\''+idd+'\'><input type=\'hidden\' name=\'form_id\' value=\'18\'><input type=\'hidden\' name=\'select_vis\' value=\'{$read_id}\'><input type=\'hidden\' name=\'select_user\' value=\'{$user_id}\'>'; 
document.forms['my_form_user_q'].submit();

}




function mycnop() { 

var count = document.getElementById('count_content_list').value;
var bord = 0;

for (var i = 0; i < count; i++) {
	if (document.getElementById('mycheckbox-'+i).checked == true) {bord = 1;}
}

if (bord == 0) {
fixForIpad('admin-derr-30', 0);
fixForIpad('admin-derr-28', 1);
fixForIpad('admin-derr-28b', 0);
	} else {
fixForIpad('admin-derr-30', 1);
fixForIpad('admin-derr-28', 0);
fixForIpad('admin-derr-28b', 1);
}

}

function mycnops() { 

fixForIpad('admin-derr-30', 0);
if (document.getElementById('checkAllbox').checked != true) 
{
fixForIpad('admin-derr-28', 1);
fixForIpad('admin-derr-28b', 0);
	} else {
fixForIpad('admin-derr-28', 0);
fixForIpad('admin-derr-28b', 1);
}

}




</script>
{/literal}			




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

<a href="index.php?mod=reklama&task=add-category"><button class="admin-derr-28b"><div class="i-messenger i-messenger-abuse"></div>Добавить</button></a>


{assign var="count_no_read" value="0"}
{ foreach from=$content_list item=content }
{if $content.read_id == 1}
{assign var="count_no_read" value="1"}
{/if}
{ /foreach }






<div style="clear:both;"></div>

</div>




<form name="view" method="post">


<table class="widefat post fixed admin-derr-35" cellspacing="0">
	<thead>
	
	
{assign var="count_content_list" value="0"}		
	{ foreach from=$category_list item=category }
	<tr>
		<td style="width:25px;"><input type="checkbox" name="box[]" value="{$category.id}" onclick="mycnop();" id="mycheckbox-{$count_content_list}"></td>

		<td style="" class="admin-derr-31" colspan="2">
		<a href="index.php?mod=reklama&task=edit-category&id={$category.id}">
		<span class="admin-derr-31">Чанк {$category.id}</span> <span class="admin-derr-31b">&#91;&#123;{$category.name}&#125;&#93;</span></a></td>
		
		<td style="text-align:right; width:300px;" colspan="2" class="admin-derr-37">
<a href="index.php?mod=reklama&task=edit-category&id={$category.id}"><span class="admin-derr-38c">Редактировать</span></a>&nbsp;&nbsp;&nbsp;		
{foreach from=$category.actions item=action}
<a href="{$action.link}"><span class="admin-derr-38c">{$action.title}</span></a>&nbsp;&nbsp;&nbsp;
{/foreach}</td>
		
	</tr>	 

	
{assign var="count_content_list" value=$count_content_list+1}		
	{ /foreach }


	
	
	
	
	
	
	
	
	
	
	
	</thead>	
</table>

<input id="count_content_list" name="count_content_list" type="hidden" value="{$count_content_list}">
<div id="oper"></div>

</form>	



<form name="my_form_user_q" action="" method="POST" enctype="multipart/form-data">
<div id="formsenderbox"></div>
</form>	

















