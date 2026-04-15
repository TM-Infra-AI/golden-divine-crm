<?php /* Smarty version Smarty-3.1.7, created on 2023-03-23 11:40:01
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Portal/ListViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:480768283641c3a917423f3-18498029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ed0bcd5106992a7889418e5f2d0d0b3b0c1f8e3' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/Portal/ListViewActions.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '480768283641c3a917423f3-18498029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_641c3a9177e2e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_641c3a9177e2e')) {function content_641c3a9177e2e($_smarty_tpl) {?>






<div class="listViewActionsContainer" id="listview-actions"><div class="row"><div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"><div class="btn-group col-md-3" role="group" araia-label="Portal actions"><button type="button" class="btn btn-default" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listview_massAction" onclick="Portal_List_Js.massDeleteRecords()" disabled="disabled"><i class="fa fa-trash"></i></button></div><div class="col-md-6"><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="selectAllMsgDiv"><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;(<span id="totalRecordsCount" value=""></span>)</a></center></div><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="deSelectAllMsgDiv"><?php echo vtranslate('LBL_DESELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></div><div class="col-md-3"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('SHOWPAGEJUMP'=>true), 0);?>
</div></div></div></div>            <?php }} ?>