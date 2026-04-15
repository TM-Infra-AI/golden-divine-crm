<?php /* Smarty version Smarty-3.1.7, created on 2020-09-11 05:29:09
         compiled from "/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/RecycleBin/ListViewRecordActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7015922425f5b0b251e9c35-78991900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef464c8cfa424ef6ba1f48942348701b8bc79045' => 
    array (
      0 => '/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/RecycleBin/ListViewRecordActions.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7015922425f5b0b251e9c35-78991900',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SEARCH_MODE_RESULTS' => 0,
    'LISTVIEW_ENTRY' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f5b0b25297dc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f5b0b25297dc')) {function content_5f5b0b25297dc($_smarty_tpl) {?>
<!--LIST VIEW RECORD ACTIONS--><div class="table-actions"><?php if (!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value){?><span class="input" ><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" class="listViewEntriesCheckBox"/></span><?php }?><span class="restoreRecordButton"><i title="<?php echo vtranslate('LBL_RESTORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-refresh alignMiddle"></i></span><span class="deleteRecordButton"><i title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-trash alignMiddle"></i></span></div><?php }} ?>