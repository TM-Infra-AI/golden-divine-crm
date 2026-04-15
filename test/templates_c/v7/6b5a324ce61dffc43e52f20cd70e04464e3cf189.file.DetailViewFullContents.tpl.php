<?php /* Smarty version Smarty-3.1.7, created on 2021-06-16 07:04:09
         compiled from "/home/marketingmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46825454060c9a269df3f73-56901623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b5a324ce61dffc43e52f20cd70e04464e3cf189' => 
    array (
      0 => '/home/marketingmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46825454060c9a269df3f73-56901623',
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
  'unifunc' => 'content_60c9a269df858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c9a269df858')) {function content_60c9a269df858($_smarty_tpl) {?>
<form id="detailView" method="POST">
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LineItemsDetail.tpl','Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</form>
<?php }} ?>