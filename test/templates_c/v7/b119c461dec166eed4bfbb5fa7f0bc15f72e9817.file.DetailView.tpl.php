<?php /* Smarty version Smarty-3.1.7, created on 2020-03-04 11:06:36
         compiled from "/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/Settings/Webforms/DetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6199400545e5f8bbc789039-35352322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b119c461dec166eed4bfbb5fa7f0bc15f72e9817' => 
    array (
      0 => '/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/Settings/Webforms/DetailView.tpl',
      1 => 1583303862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6199400545e5f8bbc789039-35352322',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'RECORD_STRUCTURE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e5f8bbc7b858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e5f8bbc7b858')) {function content_5e5f8bbc7b858($_smarty_tpl) {?>
<div class="detailViewContainer"><div class="col-sm-12"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeader.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('FieldsDetailView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>
</div></div></div></div><?php }} ?>