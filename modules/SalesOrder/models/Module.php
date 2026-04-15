<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class SalesOrder_Module_Model extends Inventory_Module_Model{

	public function quotes_get($recordId){
        $db = PearDatabase::getInstance();
        $sql = "SELECT vtiger_crmentity.createdtime,vtiger_crmentity.smownerid,vtiger_salesorder.subject,vtiger_salesorder.total,vtiger_salesorder.total,vtiger_salesorder.salesorder_no,vtiger_salesorder.duedate,vtiger_salesorder.contactid,vtiger_salesorder.discount_amount as order_dis_amt,(vtiger_salesorder.discount_percent/100*vtiger_salesorder.subtotal) as order_dis_per,vtiger_contactdetails.firstname, vtiger_contactdetails.lastname,vtiger_contactdetails.mobile,vtiger_sobillads.bill_street,vtiger_users.first_name,vtiger_users.last_name, vtiger_users.phone_mobile,vtiger_inventoryproductrel.sequence_no,vtiger_products.productname,vtiger_inventoryproductrel.quantity,vtiger_inventoryproductrel.comment,vtiger_inventoryproductrel.listprice,vtiger_inventoryproductrel.discount_amount,(vtiger_inventoryproductrel.discount_percent/100*(vtiger_inventoryproductrel.listprice*vtiger_inventoryproductrel.quantity)) as per_disc_amt, vtiger_inventoryproductrel.tax3,vtiger_inventoryproductrel.purchase_cost,vtiger_salesorder.s_h_amount,vtiger_crmentity.description,vtiger_account.accountname,vtiger_accountbillads.bill_street as accou_addr FROM vtiger_salesorder INNER JOIN vtiger_crmentity ON vtiger_salesorder.salesorderid = vtiger_crmentity.crmid LEFT JOIN vtiger_contactdetails ON vtiger_salesorder.contactid = vtiger_contactdetails.contactid INNER JOIN vtiger_sobillads ON vtiger_salesorder.salesorderid = vtiger_sobillads.sobilladdressid INNER JOIN vtiger_users ON vtiger_crmentity.smcreatorid = vtiger_users.id INNER JOIN vtiger_inventoryproductrel ON vtiger_salesorder.salesorderid = vtiger_inventoryproductrel.id INNER JOIN vtiger_products ON vtiger_inventoryproductrel.productid = vtiger_products.productid LEFT JOIN vtiger_account on vtiger_salesorder.accountid = vtiger_account.accountid LEFT JOIN vtiger_accountbillads on vtiger_account.accountid = vtiger_accountbillads.accountaddressid WHERE vtiger_crmentity.deleted=0 AND vtiger_salesorder.salesorderid = '".$recordId."'";
        $result = $db->pquery($sql, array());
        $quotes_array = array();
        $pro_name = array();          
        $i = 0;
        // die();
        while($row = $db->fetch_row($result)) {
            $createdon = $row['createdtime'];
            $accountAdd = $row['accou_addr'];
            $accountname = $row['accountname'];
            $desription = $row['description'];
            $order_no = $row['salesorder_no'];
            $duedate = $row['duedate'];
            $order_dis_amt = $row['order_dis_amt'];
            $order_dis_per = $row['order_dis_per'];
            $first_name = $row['firstname'];
            $Conta_mobile = $row['mobile'];
            $last_name = $row['lastname'];
            $full_name = $first_name.' '.$last_name;
            $address = $row['bill_street'];
            $sales_fname = $row['first_name'];
            $sales_lname = $row['last_name'];
            $sales_person = $sales_fname.' '.$sales_lname;
            $sales_contact = $row['phone_mobile'];
            $pro_name[$i]['sequence_no'] = $row['sequence_no'];
            $pro_name[$i]['productname'] = $row['productname'];
            $pro_name[$i]['quantity'] = $row['quantity'];
            $pro_name[$i]['listprice'] = $row['listprice'];
            $pro_name[$i]['comment'] = $row['comment'];
            $pro_name[$i]['total_disc'] = $row['discount_amount']+$row['per_disc_amt'];
            $amount = $row['quantity']*$row['listprice'];
            $shipping = $row['s_h_amount'];
            $assignToId = $row['smownerid'];
            $total = $row['total'];
            $i++;
        }
        if ($accountAdd !='') {
            $final_add = $accountAdd;
        }else{
            $final_add =$address;
        }
        /*
        $query = "SELECT cf_854 FROM vtiger_salesordercf WHERE salesorderid = $recordId";
        $result1 = $db->pquery($query, array());
        $row1 = $db->fetch_row($result1);
        $desid = $row1['cf_854'];
        */
        $desid = $assignToId;

        if ($desid!='') {
            $query2 = "SELECT CONCAT(first_name,' ',last_name) AS full_name,phone_mobile,phone_work  FROM vtiger_users WHERE id = $desid";
            $result2 = $db->pquery($query2, array());
            $row2 = $db->fetch_row($result2);
            $desfullname = $row2['full_name'];
            $desmobile = $row2['phone_work'];
            if($desmobile == ''){
                $desmobile = $row2['phone_mobile'];
            }
        }else{
            $desfullname = '';
            $desmobile = '';
        }
        

        $currentUser = Users_Record_Model::getCurrentUserModel();
        $cur_user_id = $currentUser->getId();
        $rolesid = $currentUser->get('roleid');
        $admin_check = $currentUser->isAdminUser();

        $product_list = '';
        $trnum = 0;
        foreach ($pro_name as $products) {
            $trnum++;
            $total_before_discount += ($products['quantity']*$products['listprice']);
            $total_discount += $products['total_disc'];
            if ($rolesid == 'H5' || $rolesid == 'H4' || $admin_check == 1) {
                $listpr = number_format($products['listprice'],2);
                $linetotal = number_format($products['quantity']*$products['listprice'],2);
            }else{
                $listpr = "-";
                $linetotal = "-";
            }
          $product_list .='
          
          <tr style="vertical-align:top;">
            <td style="border-right:2px solid #000;padding: 5px;text-align: center;">
              '.$products['sequence_no'].'</td>

            <td style="border-right:2px solid #000;padding: 5px;text-align: left;">
              '.$products['productname'].' ('.$products['comment'].')</td>
                             
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;">'. number_format($products['quantity'],2).'</td>
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;">'.$listpr.'</td>
            <td style="text-align: center;padding: 5px;">
              '.$linetotal.'</td>
            
          </tr>';
        }
        $product_list .='
          
          <tr style="vertical-align:top;">
            <td style="border-right:2px solid #000;padding: 5px;text-align: center;">
              </td>

            <td style="border-right:2px solid #000;padding: 5px;text-align: left;">Estimate Description : 
              '.$desription.'</td>
                             
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
            <td style="text-align: center;padding: 5px;">
              </td>
            
          </tr>';
        for ($i=$trnum; $i < 12; $i++) { 
            $product_list .='
          
          <tr style="vertical-align:top;">
            <td style="border-right:2px solid #000;padding: 5px;text-align: center;">&nbsp;</td>

            <td style="border-right:2px solid #000;padding: 5px;text-align: left;">
              </td>
                             
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
            <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
            <td style="text-align: center;padding: 5px;">
              </td>
            
          </tr>';
        }
        $total_discount = $total_discount+$order_dis_per+$order_dis_amt;
        $sales = array();
        $sales['createdon'] = $createdon;
        $sales['accountname'] =$accountname;
        $sales['conta_mobile'] = $Conta_mobile;
        $sales['contact_name'] =  $full_name;
        $sales['salesorder_no'] = $order_no;
        $sales['duedate'] = $duedate;
        $sales['firstname'] = $first_name;
        $sales['lastname'] = $last_name;
        $sales['bill_street'] = $final_add;
        $sales['first_name'] = $sales_fname;
        $sales['last_name'] = $sales_lname;
        $sales['phone_mobile'] = $sales_contact;
        
        $sales['product_list'] = $product_list;
        // $sales['amount'] = 55;
        // $sales['GST'] = $GST;
        // $sales['tax'] = $tax;
        $sales['des_full_name'] = $desfullname;
        $sales['des_mobile'] = $desmobile;
        if ($rolesid == 'H5' || $rolesid == 'H4' || $admin_check == 1) {
            $sales['subtotal'] = $total_before_discount;
            $sales['discount_amount'] = $total_discount;
            $sales['shipping'] = $shipping;
            $sales['total'] = $total;
        }else{
            $sales['subtotal'] = "-";
            $sales['discount_amount'] = "-";
            $sales['shipping'] = "-";
            $sales['total'] = "-";
        }
        // echo "<pre>";print_r($sales);die();
        return $sales;
    }
}
?>
