<?php /* Smarty version Smarty-3.1.7, created on 2020-03-04 07:50:52
         compiled from "/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6472222115e5f5ddc21dd07-33542872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb9c114334b7f0189b520cb7127ac82487f20f88' => 
    array (
      0 => '/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6472222115e5f5ddc21dd07-33542872',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e5f5ddc24d1d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e5f5ddc24d1d')) {function content_5e5f5ddc24d1d($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>