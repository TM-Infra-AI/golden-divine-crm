<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 05:50:40
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Vtiger/PopupNavigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:532345462614189b05f5ac1-97008059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb660644f11d110ebab3a68c8d26c5789e2f7ecd' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Vtiger/PopupNavigation.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '532345462614189b05f5ac1-97008059',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MULTI_SELECT' => 0,
    'LISTVIEW_ENTRIES' => 0,
    'MODULE' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_614189b062f43',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614189b062f43')) {function content_614189b062f43($_smarty_tpl) {?>

<div class="col-md-2"><?php if ($_smarty_tpl->tpl_vars['MULTI_SELECT']->value){?><?php if (!empty($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value)){?><button class="select btn btn-default" disabled="disabled"><strong><?php echo vtranslate('LBL_ADD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php }?><?php }else{ ?>&nbsp;<?php }?></div><div class="col-md-10"><?php $_smarty_tpl->tpl_vars['RECORD_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('SHOWPAGEJUMP'=>true), 0);?>
</div><?php }} ?>