<?php /* Smarty version Smarty-3.1.7, created on 2023-08-22 17:56:59
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Invoice/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59365180664e4f6ebb7bd95-23334440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '149e4baaf46c815c0267647bbbf513a95f5e1675' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Invoice/ModuleSummaryView.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59365180664e4f6ebb7bd95-23334440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_64e4f6ebbb0f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64e4f6ebbb0f1')) {function content_64e4f6ebbb0f1($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>