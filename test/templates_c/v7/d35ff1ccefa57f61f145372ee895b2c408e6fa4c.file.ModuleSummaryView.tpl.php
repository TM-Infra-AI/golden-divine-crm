<?php /* Smarty version Smarty-3.1.7, created on 2021-10-14 05:32:20
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/SalesOrder/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11772608776167c0e4eab294-55761172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd35ff1ccefa57f61f145372ee895b2c408e6fa4c' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/SalesOrder/ModuleSummaryView.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11772608776167c0e4eab294-55761172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6167c0e4ec222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6167c0e4ec222')) {function content_6167c0e4ec222($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>