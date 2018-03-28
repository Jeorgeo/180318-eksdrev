<?php /* Smarty version 2.6.22, created on 2017-03-15 12:33:55
         compiled from menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'menu.tpl', 24, false),)), $this); ?>

	<ul id="adminmenu" class="admin-derr-10 admin-derr-11">

	
<?php $_from = $this->_tpl_vars['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
	<?php if ($this->_tpl_vars['menu']['type'] == 'separator'): ?>
<!--		<li class="wp-menu-separator">
			<br/>
		</li>		 -->
	<?php else: ?>
<?php if ($this->_tpl_vars['menu']['id'] != 0): ?>		
	
	
				<li id="<?php echo $this->_tpl_vars['menu']['class']; ?>
" class="wp-has-submenu menu-top <?php echo $this->_tpl_vars['menu']['style']; ?>
 admin-derr-05">
			<!--		<div class="wp-menu-image">
						<br/>
					</div>   -->
	<?php $this->assign('menu_link_new', ($this->_tpl_vars['menu']['menu_link'])); ?>

					<a class="wp-has-submenu menu-top <?php echo $this->_tpl_vars['menu']['style']; ?>
 admin-derr-04 admin-derr-06 admin-derr-07 <?php if ($this->_tpl_vars['REQUEST_URI_new'] == $this->_tpl_vars['menu_link_new']): ?>admin-derr-39<?php endif; ?> <?php if ($this->_tpl_vars['url_catalog'] == $this->_tpl_vars['menu_link_new']): ?>admin-derr-39<?php endif; ?>" tabindex="1" href="index.php?<?php echo $this->_tpl_vars['menu']['menu_link']; ?>
"><?php echo $this->_tpl_vars['menu']['name']; ?>
</a>
					
<?php if ($this->_tpl_vars['menu']['id'] != 30): ?>					
<?php if (((is_array($_tmp=$this->_tpl_vars['menu']['items'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) > 0): ?>				
<div class="wp-submenu admin-derr-06" style="">
	<ul class="admin-derr-02 admin-derr-06 admin-derr-12">
 	<?php $_from = $this->_tpl_vars['menu']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submenu']):
?>
	<?php $this->assign('menu_link_new', ($this->_tpl_vars['submenu']['menu_link'])); ?>

		  		<?php if ($this->_tpl_vars['submenu']['group'] == '2'): ?>
	  <li class="<?php echo $this->_tpl_vars['submenu']['style']; ?>
"><span style="float:left;"><a href="index.php?mod=content&task=edit-category&id=<?php echo $this->_tpl_vars['submenu']['id']; ?>
<?php if ($this->_tpl_vars['read_id'] != ''): ?>&select_vis=<?php echo $this->_tpl_vars['read_id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['user_id'] != ''): ?>&select_user=<?php echo $this->_tpl_vars['user_id']; ?>
<?php endif; ?>" style="border-width: 0px 0px 0px 0px;" alt="редактировать" title="редактировать"><img src="shablon/img/edit_ico.png" alt="редактировать" title="редактировать" /></a></span><a href="index.php?<?php echo $this->_tpl_vars['submenu']['menu_link']; ?>
" class="<?php echo $this->_tpl_vars['submenu']['style']; ?>
 "><?php echo $this->_tpl_vars['submenu']['name']; ?>
</a></li>	
			 <?php else: ?>	
	  <li class="admin-derr-01 <?php echo $this->_tpl_vars['submenu']['style']; ?>
 admin-derr-06"><a href="index.php?<?php echo $this->_tpl_vars['submenu']['menu_link']; ?>
" class="<?php echo $this->_tpl_vars['submenu']['style']; ?>
 admin-derr-06 admin-derr-07 admin-derr-<?php if ($this->_tpl_vars['submenu']['menu1published'] == 1): ?>08b<?php else: ?>08<?php endif; ?>  <?php if ($this->_tpl_vars['REQUEST_URI'] == $this->_tpl_vars['menu_link_new']): ?>admin-derr-39<?php endif; ?> <?php if ($this->_tpl_vars['url_catalog'] == $this->_tpl_vars['menu_link_new']): ?>admin-derr-39<?php endif; ?>"><?php echo $this->_tpl_vars['submenu']['name']; ?>
</a></li>	
		  <?php endif; ?>
	<?php $this->assign('menu_link_new', "``"); ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
 </div>	
 </li>
<?php endif; ?>   	
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</ul>