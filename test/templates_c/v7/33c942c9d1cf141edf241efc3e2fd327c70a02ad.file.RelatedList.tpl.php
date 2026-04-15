<?php /* Smarty version Smarty-3.1.7, created on 2021-10-19 13:49:32
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Products/RelatedList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1226245428616eccec0ef811-65131039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33c942c9d1cf141edf241efc3e2fd327c70a02ad' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Products/RelatedList.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1226245428616eccec0ef811-65131039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RELATED_MODULE' => 0,
    'MODULE' => 0,
    'RELATED_MODULE_NAME' => 0,
    'TAB_LABEL' => 0,
    'RELATED_LIST_LINKS' => 0,
    'PARENT_RECORD' => 0,
    'SUB_PRODUCTS_COSTS_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_616eccec20a4f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_616eccec20a4f')) {function content_616eccec20a4f($_smarty_tpl) {?>



<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('RelatedList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php $_smarty_tpl->tpl_vars['RELATED_MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_MODULE']->value->get('name'), null, 0);?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Products'&&$_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value=='Products'&&$_smarty_tpl->tpl_vars['TAB_LABEL']->value==='Product Bundles'&&$_smarty_tpl->tpl_vars['RELATED_LIST_LINKS']->value&&$_smarty_tpl->tpl_vars['PARENT_RECORD']->value->isBundle()){?><div class="bundleCostContainer"><?php if ($_smarty_tpl->tpl_vars['SUB_PRODUCTS_COSTS_INFO']->value){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('BundleCostView.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></div><?php }?>
<?php }} ?>