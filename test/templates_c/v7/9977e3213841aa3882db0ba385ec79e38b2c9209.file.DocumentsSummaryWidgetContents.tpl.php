<?php /* Smarty version Smarty-3.1.7, created on 2020-03-13 06:51:34
         compiled from "/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Vtiger/DocumentsSummaryWidgetContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16522639545e60b6428bc885-70328353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9977e3213841aa3882db0ba385ec79e38b2c9209' => 
    array (
      0 => '/home/devmindz/public_html/Golden_divine/includes/runtime/../../layouts/v7/modules/Vtiger/DocumentsSummaryWidgetContents.tpl',
      1 => 1584082244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16522639545e60b6428bc885-70328353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e60b6429bb71',
  'variables' => 
  array (
    'RELATED_RECORDS' => 0,
    'RELATED_RECORD' => 0,
    'MODULE' => 0,
    'RELATED_MODULE' => 0,
    'DOWNLOAD_STATUS' => 0,
    'RECORD_ID' => 0,
    'DOCUMENT_RECORD_MODEL' => 0,
    'NUMBER_OF_RECORDS' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e60b6429bb71')) {function content_5e60b6429bb71($_smarty_tpl) {?>
<div class="paddingLeft5px"><span class="col-sm-5"><strong><?php echo vtranslate('Title','Documents');?>
</strong></span><span class="col-sm-7"><strong><?php echo vtranslate('File Name','Documents');?>
</strong></span><?php  $_smarty_tpl->tpl_vars['RELATED_RECORD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_RECORD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_RECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_RECORD']->key => $_smarty_tpl->tpl_vars['RELATED_RECORD']->value){
$_smarty_tpl->tpl_vars['RELATED_RECORD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['DOWNLOAD_FILE_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDownloadFileURL(), null, 0);?><?php $_smarty_tpl->tpl_vars['DOWNLOAD_STATUS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('filestatus'), null, 0);?><?php $_smarty_tpl->tpl_vars['DOWNLOAD_LOCATION_TYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('filelocationtype'), null, 0);?><div class="recentActivitiesContainer row"><ul class="" style="padding-left: 0px;list-style-type: none;"><li><div class="" id="documentRelatedRecord pull-left"><span class="col-sm-5 textOverflowEllipsis"><a href="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDetailViewUrl();?>
" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE']->value;?>
_Related_Record_<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('id');?>
" title="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('notes_title');?>
"><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('notes_title');?>
</a></span><span class="col-sm-5 textOverflowEllipsis" id="DownloadableLink"><?php if ($_smarty_tpl->tpl_vars['DOWNLOAD_STATUS']->value==1){?><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('filename',$_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RELATED_RECORD']->value);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('filename');?>
<?php }?></span><span class="col-sm-2"><?php $_smarty_tpl->tpl_vars['RECORD_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getId(), null, 0);?><?php if (isPermitted('Documents','DetailView',$_smarty_tpl->tpl_vars['RECORD_ID']->value)=='yes'){?><?php $_smarty_tpl->tpl_vars["DOCUMENT_RECORD_MODEL"] = new Smarty_variable(Vtiger_Record_Model::getInstanceById($_smarty_tpl->tpl_vars['RECORD_ID']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filename')&&$_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filestatus')){?><a name="viewfile" class="custom_img_view" href="javascript:void(0)" data-filelocationtype="<?php echo $_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filelocationtype');?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->getDownloadFileURL();?>
" data-filename="<?php echo $_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filename');?>
" ><i title="<?php echo vtranslate('LBL_VIEW_FILE','Documents');?>
" class="fa fa-picture-o alignMiddle"></i></a>&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filename')&&$_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filestatus')&&$_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->get('filelocationtype')=='I'){?><a name="downloadfile" href="<?php echo $_smarty_tpl->tpl_vars['DOCUMENT_RECORD_MODEL']->value->getDownloadFileURL();?>
"><i title="<?php echo vtranslate('LBL_DOWNLOAD_FILE','Documents');?>
" class="fa fa-download alignMiddle"></i></a>&nbsp;<?php }?><?php }?></span></div></li></ul></div><?php } ?></div><?php $_smarty_tpl->tpl_vars['NUMBER_OF_RECORDS'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['RELATED_RECORDS']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['NUMBER_OF_RECORDS']->value==5){?><div class="row"><div class="pull-right"><a class="moreRecentDocuments cursorPointer"><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div><?php }?><!-- image popup --><div id="ImagePOP" class="modal fade" role="dialog" data-backdrop="static" style="display: none;"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h3 class="imgName"></h3><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><img class="customImageBox" src=""></div><div class="modal-footer"><button type="button" class="btn btn-danger" style="float: left;" id="cancelgiftcard" data-dismiss="modal"><strong><?php echo vtranslate('LBL_CANCEL','Vtiger');?>
</strong></button></div></div></div></div><!-- image popup -->
<script type="text/javascript">
    $( document ).ready(function() {
        $( ".custom_img_view" ).click(function() {
            var imagesrc = $(this).attr("data-url") // will return the string "123"
            var filename = $(this).attr("data-filename") // will return the string "123"
            $("#ImagePOP").modal("show");
            $(".customImageBox").attr("src",imagesrc);
            $(".imgName").html(filename);
        });
    });
</script>
<?php }} ?>