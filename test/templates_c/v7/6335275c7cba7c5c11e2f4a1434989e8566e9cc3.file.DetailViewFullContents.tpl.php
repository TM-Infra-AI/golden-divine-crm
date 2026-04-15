<?php /* Smarty version Smarty-3.1.7, created on 2023-09-10 17:01:29
         compiled from "/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/EmailTemplates/DetailViewFullContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51750578964fdf6692233d5-36463565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6335275c7cba7c5c11e2f4a1434989e8566e9cc3' => 
    array (
      0 => '/home/goldendivinecrmm/public_html/includes/runtime/../../layouts/v7/modules/EmailTemplates/DetailViewFullContents.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51750578964fdf6692233d5-36463565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'MODULE' => 0,
    'USER_MODEL' => 0,
    'MODULE_NAME' => 0,
    'WIDTHTYPE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_64fdf669255d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64fdf669255d5')) {function content_64fdf669255d5($_smarty_tpl) {?>

<input id="recordId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" /><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="detailview-content container-fluid"><div class="details row"><div class="block"><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><div><h4><?php echo vtranslate('Email Template - Properties of ',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 " <?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get('templatename');?>
 "</h4></div><hr><table class="table detailview-table no-border"><tbody><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted marginRight10px"><?php echo vtranslate('Templatename',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get('templatename');?>
</td></tr><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted marginRight10px"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['RECORD']->value->get('description'));?>
</td></tr><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted marginRight10px"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['RECORD']->value->get('module')){?> <?php echo vtranslate($_smarty_tpl->tpl_vars['RECORD']->value->get('module'),$_smarty_tpl->tpl_vars['RECORD']->value->get('module'));?>
<?php }?></td></tr><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted marginRight10px"><?php echo vtranslate('Subject',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get('subject');?>
</td></tr><tr><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted marginRight10px"><?php echo vtranslate('Message',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><iframe id="TemplateIFrame" style="height:400px;" class="col-sm-12 col-xs-12 overflowScrollBlock"></iframe></td></tr></tbody></table></div></div></div></div></div>
<?php }} ?>