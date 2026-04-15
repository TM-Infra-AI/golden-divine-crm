<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
class SalesOrder_Save_Action extends Inventory_Save_Action {
	protected function getRecordModelFromRequest(Vtiger_Request $request) {
		$assigned_user= $request->get('assigned_user_id');
		$roleId = SalesOrder_Record_Model::getRoleidAssignedUser($assigned_user);

		$currentUser = Users_Record_Model::getCurrentUserModel();
		$current_user_id=$currentUser->get('id');
		$current_user_fname = $currentUser->get('first_name');
		$current_user_lname = $currentUser->get('last_name');
		$current_user_name = $current_user_fname.' '.$current_user_lname;
				
		if($roleId == 'H10'){
			$request->set('cf_856','GDMFR-J');
			$request->set('cf_862' ,$current_user_name);
		}
		
		return parent::getRecordModelFromRequest($request);
	}
}
