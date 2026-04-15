<?php /* Smarty version Smarty-3.1.7, created on 2021-07-07 09:27:41
         compiled from "/home/marketingmindz/goldendivinecrm.marketingmindz.com/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37117373960e5738dbffe32-42976443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f514cbdf363babe035c11ab00f78da82364182e' => 
    array (
      0 => '/home/marketingmindz/goldendivinecrm.marketingmindz.com/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37117373960e5738dbffe32-42976443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60e5738dc03ef',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60e5738dc03ef')) {function content_60e5738dc03ef($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>