<?php /* Smarty version Smarty-3.1.7, created on 2021-09-10 11:31:35
         compiled from "/var/www/html/Pankaj/goldendivinecrm/includes/runtime/../../layouts/v7/modules/Vtiger/dashboards/MiniListContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1255448051613b421718c3c4-86021553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ec7d7b74d40b832cb1114e21e872532e74c459a' => 
    array (
      0 => '/var/www/html/Pankaj/goldendivinecrm/includes/runtime/../../layouts/v7/modules/Vtiger/dashboards/MiniListContents.tpl',
      1 => 1626247737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255448051613b421718c3c4-86021553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'WIDGET' => 0,
    'CURRENT_PAGE' => 0,
    'MINILIST_WIDGET_MODEL' => 0,
    'HEADER_COUNT' => 0,
    'HEADER_FIELDS' => 0,
    'SPANSIZE' => 0,
    'FIELD' => 0,
    'BASE_MODULE' => 0,
    'MINILIST_WIDGET_RECORDS' => 0,
    'NAME' => 0,
    'RECORD' => 0,
    'USER_MODEL' => 0,
    'RECORD_ID' => 0,
    'CURRENCY_ID' => 0,
    'CURRENCY_INFO' => 0,
    'MODULE_NAME' => 0,
    'CUSTOM_MINILIST' => 0,
    'DATA' => 0,
    'cmp_date' => 0,
    'pr_date' => 0,
    'st_pr' => 0,
    'MORE_EXISTS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_613b42171bf10',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613b42171bf10')) {function content_613b42171bf10($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/Pankaj/goldendivinecrm/libraries/Smarty/libs/plugins/modifier.date_format.php';
?>
<div style='padding-top: 0;margin-bottom: 2%;padding-right:15px;'>
    <input type="hidden" id="widget_<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('id');?>
_currentPage" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_PAGE']->value;?>
">
	
	<?php $_smarty_tpl->tpl_vars["SPANSIZE"] = new Smarty_variable(12, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['HEADER_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getHeaderCount(), null, 0);?>
	<?php if ($_smarty_tpl->tpl_vars['HEADER_COUNT']->value){?>
		<?php $_smarty_tpl->tpl_vars["SPANSIZE"] = new Smarty_variable(12/$_smarty_tpl->tpl_vars['HEADER_COUNT']->value, null, 0);?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getTargetModule()!='SalesOrder'){?>
		<div class="row" style="padding:5px">
			<?php $_smarty_tpl->tpl_vars['HEADER_FIELDS'] = new Smarty_variable($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getHeaders(), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['HEADER_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD']->key => $_smarty_tpl->tpl_vars['FIELD']->value){
$_smarty_tpl->tpl_vars['FIELD']->_loop = true;
?>
			<div class="col-lg-<?php echo $_smarty_tpl->tpl_vars['SPANSIZE']->value;?>
"><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['BASE_MODULE']->value);?>
</strong></div>
			<?php } ?>
		</div>
	<?php }?>

	<?php $_smarty_tpl->tpl_vars["MINILIST_WIDGET_RECORDS"] = new Smarty_variable($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getRecords(), null, 0);?>

	<?php  $_smarty_tpl->tpl_vars['RECORD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RECORD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MINILIST_WIDGET_RECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RECORD']->key => $_smarty_tpl->tpl_vars['RECORD']->value){
$_smarty_tpl->tpl_vars['RECORD']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getTargetModule()!='SalesOrder'){?>
	<div class="row miniListContent" style="padding:5px">
			<?php  $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD']->_loop = false;
 $_smarty_tpl->tpl_vars['NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['HEADER_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['FIELD']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['FIELD']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD']->key => $_smarty_tpl->tpl_vars['FIELD']->value){
$_smarty_tpl->tpl_vars['FIELD']->_loop = true;
 $_smarty_tpl->tpl_vars['NAME']->value = $_smarty_tpl->tpl_vars['FIELD']->key;
 $_smarty_tpl->tpl_vars['FIELD']->iteration++;
 $_smarty_tpl->tpl_vars['FIELD']->last = $_smarty_tpl->tpl_vars['FIELD']->iteration === $_smarty_tpl->tpl_vars['FIELD']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["minilistWidgetModelRowHeaders"]['last'] = $_smarty_tpl->tpl_vars['FIELD']->last;
?>
				<div class="col-lg-<?php echo $_smarty_tpl->tpl_vars['SPANSIZE']->value;?>
 textOverflowEllipsis" title="<?php echo strip_tags($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME']->value));?>
" style="padding-right: 5px;">
	               <?php if ($_smarty_tpl->tpl_vars['FIELD']->value->get('uitype')=='71'||($_smarty_tpl->tpl_vars['FIELD']->value->get('uitype')=='72'&&$_smarty_tpl->tpl_vars['FIELD']->value->getName()=='unit_price')){?>
						<?php $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_id'), null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['FIELD']->value->get('uitype')=='72'&&$_smarty_tpl->tpl_vars['NAME']->value=='unit_price'){?>
							<?php $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_variable(getProductBaseCurrency($_smarty_tpl->tpl_vars['RECORD_ID']->value,$_smarty_tpl->tpl_vars['RECORD']->value->getModuleName()), null, 0);?>
						<?php }?>
						<?php $_smarty_tpl->tpl_vars['CURRENCY_INFO'] = new Smarty_variable(getCurrencySymbolandCRate($_smarty_tpl->tpl_vars['CURRENCY_ID']->value), null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME']->value)!=null){?>
							&nbsp;<?php echo CurrencyField::appendCurrencySymbol($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME']->value),$_smarty_tpl->tpl_vars['CURRENCY_INFO']->value['symbol']);?>
&nbsp;
						<?php }?>
					<?php }else{ ?>
						<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME']->value);?>
&nbsp;
					<?php }?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['minilistWidgetModelRowHeaders']['last']){?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDetailViewUrl();?>
" class="pull-right"><i title="<?php echo vtranslate('LBL_SHOW_COMPLETE_DETAILS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" class="fa fa-list"></i></a>
					<?php }?>
				</div>
			<?php } ?>
	</div>
	<?php }?>
	<?php } ?>
    
	<?php if ($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getTargetModule()=='SalesOrder'){?>
		<div class="customSO miniListContent" style="padding:5px">
			<table class="table">
				<tr>
					<th>Subject</th>
					<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H2'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H4'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H5'){?>
						<th>Total</th>
					<?php }?>
					<th>Status</th>
				</tr>
					<?php ob_start();?><?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["cmp_date"] = new Smarty_variable($_tmp1, null, 0);?>
			
				<?php  $_smarty_tpl->tpl_vars['DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATA']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CUSTOM_MINILIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATA']->key => $_smarty_tpl->tpl_vars['DATA']->value){
$_smarty_tpl->tpl_vars['DATA']->_loop = true;
?>
					<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DATA']->value['duedate'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["pr_date"] = new Smarty_variable($_tmp2, null, 0);?>
				<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DATA']->value['sostatus'];?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["st_pr"] = new Smarty_variable($_tmp3, null, 0);?>
				
				<?php if (strtotime($_smarty_tpl->tpl_vars['cmp_date']->value)>strtotime($_smarty_tpl->tpl_vars['pr_date']->value)&&$_smarty_tpl->tpl_vars['st_pr']->value!='Delivered'&&$_smarty_tpl->tpl_vars['pr_date']->value!=''&&$_smarty_tpl->tpl_vars['pr_date']->value!=null){?>
					<tr style="background-color: antiquewhite;">
						<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo $_smarty_tpl->tpl_vars['DATA']->value['subject'];?>
</a></td>
						<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H2'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H4'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H5'){?>
							<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['DATA']->value['total']);?>
</a></td>
						<?php }?>
						<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['sostatus']);?>
</a></td>
					</tr>
					<?php }else{ ?>
						<tr>
						<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo $_smarty_tpl->tpl_vars['DATA']->value['subject'];?>
</a></td>
						<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H2'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H4'||$_smarty_tpl->tpl_vars['USER_MODEL']->value->get('roleid')=='H5'){?>
							<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['DATA']->value['total']);?>
</a></td>
						<?php }?>
						<td><a href="index.php?module=SalesOrder&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['DATA']->value['salesorderid'];?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['sostatus']);?>
</a></td>
					</tr>
					<?php }?>
				<?php } ?>
			</table>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['MINILIST_WIDGET_MODEL']->value->getTargetModule()!='SalesOrder'){?>
    <?php if ($_smarty_tpl->tpl_vars['MORE_EXISTS']->value){?>
        <div class="moreLinkDiv" style="padding-top:10px;padding-bottom:5px;">
            <a class="miniListMoreLink" data-linkid="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
" data-widgetid="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('id');?>
" onclick="Vtiger_MiniList_Widget_Js.registerMoreClickEvent(event);"><?php echo vtranslate('LBL_MORE');?>
...</a>
        </div>
    <?php }?>
    <?php }?>
</div><?php }} ?>