<?php /* Smarty version Smarty-3.1.7, created on 2023-08-22 17:56:59
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Invoice/DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138425571764e4f6ebc14130-69463106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24d555c8d24e592765ecc50f1d320cfc832c2c96' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Invoice/DetailViewSummaryContents.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138425571764e4f6ebc14130-69463106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_64e4f6ebc1907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64e4f6ebc1907')) {function content_64e4f6ebc1907($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>