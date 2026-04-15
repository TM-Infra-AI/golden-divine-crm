<?php /* Smarty version Smarty-3.1.7, created on 2021-09-14 08:56:28
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:847011500614063bc723a90-41030977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b74728b0b88c91fcf07e526541666f9520a9711e' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847011500614063bc723a90-41030977',
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
  'unifunc' => 'content_614063bc82bc7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614063bc82bc7')) {function content_614063bc82bc7($_smarty_tpl) {?>
<form id="detailView" method="POST">
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LineItemsDetail.tpl','Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</form>
<?php }} ?>