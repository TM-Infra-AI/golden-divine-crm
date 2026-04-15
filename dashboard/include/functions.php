<?php
session_start();

function GetSelectRoleUsers($roleId){
    global  $adb;
    return getRoleUsers($role);
}
function GetSOData($user,$fromDate,$toDate){
    global $adb;
    $param = array();
    $sql = "SELECT DISTINCT vtiger_salesorder.subject AS 'Subject',vtiger_salesorder.salesorderid, 
    (CASE WHEN vtiger_quotesSalesOrder.subject NOT LIKE '' THEN (CASE WHEN trim(vtiger_quotesSalesOrder.subject) NOT LIKE '' THEN trim(vtiger_quotesSalesOrder.subject) ELSE '' END) ELSE '' END) AS 'Quote_Name', 
    (CASE WHEN vtiger_contactdetailsSalesOrder.lastname NOT LIKE '' THEN (CASE WHEN trim(CONCAT(vtiger_contactdetailsSalesOrder.firstname,' ',vtiger_contactdetailsSalesOrder.lastname)) NOT LIKE '' THEN trim(CONCAT(vtiger_contactdetailsSalesOrder.firstname,' ',vtiger_contactdetailsSalesOrder.lastname)) ELSE '' END) ELSE '' END) AS 'Contact_Name', 
    vtiger_salesorder.duedate AS 'Due_Date', 
    vtiger_salesorder.carrier AS 'Carrier', 
    vtiger_salesorder.sostatus AS 'Status', 
    (CASE WHEN vtiger_accountSalesOrder.accountname NOT LIKE '' THEN (CASE WHEN trim(vtiger_accountSalesOrder.accountname) NOT LIKE '' THEN trim(vtiger_accountSalesOrder.accountname) ELSE '' END) ELSE '' END) AS 'Account_Name', 
    vtiger_salesorder.salescommission AS 'Sales_Commission', 
    vtiger_salesorder.exciseduty AS 'Excise_Duty' 
    from vtiger_salesorder 
        inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_salesorder.salesorderid 
        left join vtiger_contactdetails as vtiger_contactdetailsSalesOrder on vtiger_contactdetailsSalesOrder.contactid = vtiger_salesorder.contactid 
        left join vtiger_quotes as vtiger_quotesSalesOrder on vtiger_quotesSalesOrder.quoteid = vtiger_salesorder.quoteid 
        left join vtiger_account as vtiger_accountSalesOrder on vtiger_accountSalesOrder.accountid = vtiger_salesorder.accountid 
        left join vtiger_groups as vtiger_groupsSalesOrder on vtiger_groupsSalesOrder.groupid = vtiger_crmentity.smownerid 
        left join vtiger_users as vtiger_usersSalesOrder on vtiger_usersSalesOrder.id = vtiger_crmentity.smownerid 
        left join vtiger_groups on vtiger_groups.groupid = vtiger_crmentity.smownerid 
        left join vtiger_users on vtiger_users.id = vtiger_crmentity.smownerid 
        WHERE vtiger_salesorder.salesorderid > 0 
        AND vtiger_crmentity.deleted=0";
    if($user){
        $sql .= " AND vtiger_crmentity.smownerid = ?";
        $param[] = $user;
    }
    if($fromDate && $toDate) {
        $sql .= " AND vtiger_crmentity.createdtime <= ? AND  vtiger_crmentity.createdtime >= ? ";
        $param[] = date("Y-m-d", strtotime($toDate)). ' 23:59:59';
        $param[] = date("Y-m-d", strtotime($fromDate)). ' 00:00:01';
    }
    $sql .= " ORDER BY vtiger_crmentity.createdtime DESC";
    // echo $result = $adb->convert2sql($sql,$param);exit;
    $result = $adb->pquery($sql,$param);
    $data = array();
    if($adb->num_rows($result) > 0 ) {
        while ($row = $adb->fetchByAssoc($result)) {
            $data[$row['salesorderid']] = $row;
        }
    }
    // echo "<pre>";print_r($data);exit;
    return $data;
}
function GetSOStatus(){
    global $adb;
    $module = Vtiger_Module_Model::getInstance('SalesOrder');
    $field = Vtiger_Field_Model::getInstance('sostatus', $module);
    $statuslist = $field->getPicklistValues();
    return $statuslist;
}
function GetAllRole(){
    $allRoles = Settings_Roles_Record_Model::getAll();
    foreach($allRoles as $roleId => $roleModel) {
        $rolearrlist[$roleId] = $roleModel->getName();
    }
    return $rolearrlist;
    // echo "<pre>";print_r($rolearray);exit;
}