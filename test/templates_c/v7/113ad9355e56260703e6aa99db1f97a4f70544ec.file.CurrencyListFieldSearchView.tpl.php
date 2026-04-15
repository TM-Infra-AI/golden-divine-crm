<?php /* Smarty version Smarty-3.1.7, created on 2020-03-11 11:50:54
         compiled from "/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/CurrencyListFieldSearchView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17654858225e68d09eb68591-80308962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '113ad9355e56260703e6aa99db1f97a4f70544ec' => 
    array (
      0 => '/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/CurrencyListFieldSearchView.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17654858225e68d09eb68591-80308962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'FIELD_INFO' => 0,
    'CURRENCY_LIST' => 0,
    'CURRENCY_NAME' => 0,
    'SEARCH_INFO' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e68d09ecd6dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e68d09ecd6dd')) {function content_5e68d09ecd6dd($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()), null, 0);?><?php $_smarty_tpl->tpl_vars['CURRENCY_LIST'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCurrencyList(), null, 0);?><div class="select2_search_div"><input type="text" class="listSearchContributor inputElement select2_input_element"/><select class="select2 listSearchContributor" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
" data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
' style="display:none"><option value=""><?php echo vtranslate('LBL_SELECT_OPTION','Vtiger');?>
</option><?php  $_smarty_tpl->tpl_vars['CURRENCY_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CURRENCY_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CURRENCY_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CURRENCY_NAME']->key => $_smarty_tpl->tpl_vars['CURRENCY_NAME']->value){
$_smarty_tpl->tpl_vars['CURRENCY_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['CURRENCY_ID']->value = $_smarty_tpl->tpl_vars['CURRENCY_NAME']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_NAME']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['CURRENCY_NAME']->value==$_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'])&&($_smarty_tpl->tpl_vars['CURRENCY_NAME']->value!='')){?> selected<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['CURRENCY_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php } ?></select></div><?php }} ?>