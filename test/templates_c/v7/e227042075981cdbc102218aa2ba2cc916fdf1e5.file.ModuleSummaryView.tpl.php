<?php /* Smarty version Smarty-3.1.7, created on 2020-03-04 07:50:52
         compiled from "/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/SalesOrder/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1742351835e5f5ddc20b301-77726219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e227042075981cdbc102218aa2ba2cc916fdf1e5' => 
    array (
      0 => '/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/SalesOrder/ModuleSummaryView.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1742351835e5f5ddc20b301-77726219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e5f5ddc217eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e5f5ddc217eb')) {function content_5e5f5ddc217eb($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>