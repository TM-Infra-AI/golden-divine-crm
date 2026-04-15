<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

/**
 * Inventory Record Model Class
 */
class SalesOrder_Record_Model extends Inventory_Record_Model {

	function getCreateInvoiceUrl() {
		$invoiceModuleModel = Vtiger_Module_Model::getInstance('Invoice');

		return "index.php?module=".$invoiceModuleModel->getName()."&view=".$invoiceModuleModel->getEditViewName()."&salesorder_id=".$this->getId();
	}

	function getCreatePurchaseOrderUrl() {
		$purchaseOrderModuleModel = Vtiger_Module_Model::getInstance('PurchaseOrder');
		return "index.php?module=".$purchaseOrderModuleModel->getName()."&view=".$purchaseOrderModuleModel->getEditViewName()."&salesorder_id=".$this->getId();
	}
	
	function getRoleidAssignedUser($assigned_user) {
		$db = PearDatabase::getInstance();
		$query = "SELECT `roleid` FROM `vtiger_user2role` WHERE `userid` = ?";
        $result = $db->pquery($query, array($assigned_user));
        if($result){
            $roleId = $db->query_result($result, 0,'roleid');
        }
		return $roleId;
	}

	function getMiniList(){
		$db = PearDatabase::getInstance();
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$cur_user_id = $currentUser->getId();
		$admin_check = $currentUser->isAdminUser(); 
		
// 		$sql = "SELECT vtiger_salesorder.salesorderid,vtiger_salesorder.subject,vtiger_salesorder.duedate,vtiger_salesorder.total,vtiger_salesorder.sostatus FROM vtiger_salesorder INNER JOIN vtiger_crmentity ON vtiger_salesorder.salesorderid = vtiger_crmentity.crmid WHERE vtiger_crmentity.deleted = 0 AND vtiger_salesorder.sostatus = 'Approved' OR vtiger_salesorder.sostatus = 'Created'";
		$sql = "SELECT vtiger_salesorder.salesorderid,vtiger_salesorder.subject,vtiger_salesorder.duedate,vtiger_salesorder.total,vtiger_salesorder.sostatus FROM vtiger_salesorder INNER JOIN vtiger_crmentity ON vtiger_salesorder.salesorderid = vtiger_crmentity.crmid WHERE vtiger_crmentity.deleted = 0";

		if($admin_check == 0){
			$sql .=" AND vtiger_crmentity.smownerid = $cur_user_id";
		}
		$res = $db->pquery($sql);
		$minilistResult = array();
		while($row = $db->fetch_row($res)){
			$minilistResult[] = $row;
			
		}
		return $minilistResult;
	}

	function checkRecordPerm($recordid,$currentid){
		$db = PearDatabase::getInstance();
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$cur_user_id = $currentUser->getId();
		$admin_check = $currentUser->isAdminUser();

		if ($admin_check==1) {
			return 1;
		}else{
			$sql = "SELECT crmid FROM vtiger_crmentity WHERE crmid = ? AND (smcreatorid=? OR smownerid = ?) and deleted =0";
	        $result = $db->pquery($sql, array($recordid,$currentid,$currentid));
	        $roleId = $db->query_result($result, 0,'crmid');
	        if ($roleId!='') {
	        	return 1;
	        }else{
	        	return 0;
	        }
		}
	}
}