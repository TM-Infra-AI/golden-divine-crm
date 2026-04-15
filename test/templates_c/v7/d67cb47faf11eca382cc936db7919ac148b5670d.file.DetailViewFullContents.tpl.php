<?php /* Smarty version Smarty-3.1.7, created on 2020-03-04 07:51:10
         compiled from "/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12322000345e5f5dee815cc8-53013442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd67cb47faf11eca382cc936db7919ac148b5670d' => 
    array (
      0 => '/var/www/html/gold_new/includes/runtime/../../layouts/v7/modules/Inventory/DetailViewFullContents.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12322000345e5f5dee815cc8-53013442',
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
  'unifunc' => 'content_5e5f5dee81aa7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e5f5dee81aa7')) {function content_5e5f5dee81aa7($_smarty_tpl) {?>
<form id="detailView" method="POST">
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LineItemsDetail.tpl','Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</form>
<?php }} ?>