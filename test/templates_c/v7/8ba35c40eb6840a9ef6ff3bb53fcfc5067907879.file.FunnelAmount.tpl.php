<?php /* Smarty version Smarty-3.1.7, created on 2020-10-22 05:40:10
         compiled from "/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Potentials/dashboards/FunnelAmount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13572221525f911b3a2cf028-84942012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ba35c40eb6840a9ef6ff3bb53fcfc5067907879' => 
    array (
      0 => '/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Potentials/dashboards/FunnelAmount.tpl',
      1 => 1583395309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13572221525f911b3a2cf028-84942012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5f911b3a33874',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f911b3a33874')) {function content_5f911b3a33874($_smarty_tpl) {?>

<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="dashboardWidgetContent">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="widgeticons dashBoardWidgetFooter">
    <div class="footerIcons pull-right">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>



<script type="text/javascript">
	Vtiger_Barchat_Widget_Js('Vtiger_FunnelAmount_Widget_Js',{},{});
</script>
<?php }} ?>