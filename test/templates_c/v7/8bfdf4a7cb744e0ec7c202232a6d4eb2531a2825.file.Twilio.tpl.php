<?php /* Smarty version Smarty-3.1.7, created on 2020-10-29 12:07:31
         compiled from "/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/Twilio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21065963295f9ab083db5f23-40471124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bfdf4a7cb744e0ec7c202232a6d4eb2531a2825' => 
    array (
      0 => '/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/Twilio.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21065963295f9ab083db5f23-40471124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE_NAME' => 0,
    'RECORD_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f9ab083df5b4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9ab083df5b4')) {function content_5f9ab083df5b4($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('BaseProviderEditFields.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_MODEL'=>$_smarty_tpl->tpl_vars['RECORD_MODEL']->value), 0);?>
<?php }} ?>