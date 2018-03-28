{literal}
<script type="text/javascript">
function send() { 
if (confirm("Вы уверены что хотите выполнить данную операцию?"))
 { 
  document.forms["view"].submit();
  } else { 
  document.forms["view"].elements["operation"].value=""; 
  }
}
</script>
{/literal}  
{* Smarty *}
<div id="wpbody-content" style="overflow: hidden;">
	<div class="wrap">
		<div id="dashboard-widgets-wrap">
			<div id="dashboard-widgets" class="metabox-holder">

			
		</div>	
	</div>	
</div>
</div>