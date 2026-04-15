<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
require_once 'pdfLibrary/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class SalesOrder_SalesorderBill_Action extends Vtiger_Action_Controller {

  function checkPermission(Vtiger_Request $request) {
    $moduleName = $request->getModule();
    $moduleModel = Vtiger_Module_Model::getInstance($moduleName);

    $currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
    if(!$currentUserPriviligesModel->hasModuleActionPermission($moduleModel->getId(), 'Save')) {
      throw new AppException(vtranslate($moduleName).' '.vtranslate('LBL_NOT_ACCESSIBLE'));
    }
  }

  public function process(Vtiger_Request $request) {
    
    $recordId = $request->get('record');
    $actions = SalesOrder_Module_Model::quotes_get($recordId);   

    $gettemplate = $this->invoiceFormat($actions);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf->set_option('enable_html5_parser', TRUE);
    $dompdf->loadHtml($gettemplate);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    $dompdf->set_option('defaultMediaType', 'all');
    $dompdf->set_option('isFontSubsettingEnabled', true);
    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("goldendivine");
  }

  

  public function invoiceFormat($actions){
    ob_start();
  ?>  


<!DOCTYPE html>
<html>
<head>
<title>PDF</title>
</head>
  <body style="margin:0;">

<div style="width: 100%; padding:0px;box-sizing: border-box;">

<table style="width:100%; border:2px solid #000;border-bottom:none;padding:8px;box-sizing: border-box;font-family: sans-serif;font-size: 14px;">

  <tr style="font-weight:600;">
    <td width="33%" align="left">GSTIN: 08AACCG1222B1ZE</td>
    <td width="33%" align="center">|| Shri ||</td> 
    <td width="33%" align="right">Tel.: +91 141 4015592, 2605592</td>
  </tr>
  <tr style="font-weight:600;">
    <td width="33%" align="left">PAN No.: AACCG1222B</td>
    <td width="33%" align="center">
      <?php
          if ( date('m') > 6 ) {
            $year = date('Y') + 1;
          }
          else {
              $year = date('Y');
          }

          echo $year-1 ."/".$year;
      ?>
    </td>
    <td width="33%" align="right">Accounts: +91 141 4020858</td>
  </tr>

  <table style="width: 100%;padding: 0 8px;box-sizing: border-box;font-family: sans-serif;border:2px solid #000;border-bottom:none;border-top:none;">
    <tr>
      <td width="60"><img src="pdf_img/logo.png" style="filter: grayscale(100%);width: 60px;"></td>
      <td colspan="2" style="text-align: left;"><span style="font-size: 34px;width: 100%;display: block;font-family: sans-serif;font-weight: 600;text-align: left;">Golden Divine Creations Pvt. Ltd. </span>
        
        <span style="font-size: 14px;padding: 0 15px 0px;font-family: sans-serif;text-align: center;">Supplier's & Mfg. of Corporate Gifts, Trophies Memontoes, Hand Crafted Item's</span>
        <span style="display:block; width:85%;border-bottom: 2px solid #000; padding: 0 5px 1px;text-align: center;height:1px;margin:0 auto 0 5px;">&nbsp;</span>
      </td>
      
    </tr>
    <tr>
    <td colspan="3" style="text-align: center;font-size: 13px;font-family: sans-serif;padding: 5px 0px;">E-mail : goldendivine@gmail.com, Web : www.goldendivine.co.in , Designer's E-mail : design@goldendivine.in</td>
    </tr>
  </table>

  <table style="width: 100%;padding: 1px 5px;box-sizing: border-box;font-family: sans-serif;font-size: 14px;border:2px solid #000;">
    <tr>
      <td style="">Estimate No. <?php echo $actions['salesorder_no']; ?></td>
      <td style="text-align: center;padding-bottom: 5px;"><span style="border-bottom: 2px solid #000;">Estimate Form</span></td>
      <td style="text-align: right;">Date <?php echo date('d/m/Y', strtotime($actions['createdon'])); ?></td>
    </tr>
  </table>

  <table style="width: 100%;padding: 0px;box-sizing: border-box;font-family: sans-serif;font-size: 14px;border:2px solid #000;border-top:none;border-spacing: 0;border-bottom:none;">
    <tr>
      <td width="280" style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">M/s.: <?php echo $actions['accountname'];?></td>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px 2px;">Delivery Date</td>
      <td style="border-bottom:2px solid #000;padding: 5px;"><?php echo date('d/m/Y', strtotime($actions['duedate']));?></td>
    </tr>

    <tr>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Billing Address: <?php echo $actions['bill_street']; ?></td>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px 2px;">Sales Person</td>
      <td style="border-bottom:2px solid #000;padding: 5px;">
        <?php echo $actions['first_name'].' '.$actions['last_name']; ?></td>
    </tr>

    <tr>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Cont. Person: <?php echo $actions ['contact_name']; ?></td>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px 2px;">Contact No.</td>
      <td style="border-bottom:2px solid #000;padding: 5px;">
        <?php echo $actions ['phone_mobile']; ?></td>
    </tr>

    <tr>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Cont. No.: <?php echo $actions ['conta_mobile']; ?> </td>
      <td style="border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px 2px;">Designer Name</td>
      <td style="padding: 5px;border-bottom:2px solid #000;">
        <?php echo $actions ['des_full_name']; ?></td>
    </tr>

    <tr>
      <td style="border-right:2px solid #000;padding: 5px;border-bottom:none;">GST No. </td>
      <td style="border-right:2px solid #000;padding: 5px 2px;border-bottom:none;">Contact No.</td>
      <td style="padding: 5px;border-bottom:none;"><?php echo $actions ['des_mobile']; ?></td></td>
    </tr>
  </table>

  <table style="width: 100%;padding: 0px;box-sizing: border-box;font-family: sans-serif;font-size: 14px;border:2px solid #000;border-top:none;border-spacing: 0;">
  <thead>
    <tr>
      <td width="25" style="border-top:2px solid #000;border-right:2px solid #000;padding: 5px;border-bottom:2px solid #000;">S.No.</td>
      <td width="300" style="text-align: center;border-top:2px solid #000;border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Material Description</td>
      <td width="45" style="text-align: center;border-top:2px solid #000;border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Qty.</td>
      <td style="text-align: center;border-top:2px solid #000;border-right:2px solid #000;border-bottom:2px solid #000;padding: 5px;">Rate</td>
      <td style="text-align: center;padding: 5px;border-top:2px solid #000;border-bottom:2px solid #000;">Amount</td>
    </tr>
    </thead>
    <tbody style="position: relative;">
    	<span style="position: absolute;left:18%;top:45%;margin-top: 0;"><img src="pdf_img/logo-background.png" style="opacity: .3;width: 50%;margin:0 auto;"></span>
        <?php echo $actions['product_list']; ?>
    </tbody>

    <tfoot>
    	<tr>
        	<td style="border-right:2px solid #000;padding: 1px 5px;">&nbsp;</td>
        	<td style="border-right:2px solid #000;padding: 1px 5px;">&nbsp;</td>
        	<td style="border-right:2px solid #000;padding: 1px 5px;">&nbsp;</td>
        	<td style="border-right:2px solid #000;padding: 1px 5px;">&nbsp;</td>
        	<td style="padding: 1px 5px;"></td>
        </tr>
	    <tr>
	      <td style="border-right:2px solid #000;padding: 5px;"></td>
	      <td style="font-size:12px;text-align: left;border-right:2px solid #000;padding: 5px;"><b>Our Bankers :</b>
	        <!--<span style="display: block;font-size: 10px;padding: 0px;">1. Indusind Bank Ltd., Raja Park, Jaipur <b>A/c 650014079679 IFSC Code INDB0000278</b></span>-->
	        <!--<span style="display: block;font-size: 10px;padding: 0px;">2. Axis Bank Ltd., Raja Park, Jaipur &nbsp;<b>A/c 910020006259631 IFSC Code UTIB0000031</b></span>-->
          <span style="display: block;font-size: 10px;padding: 0px;">1. ICICI Bank Ltd., Transport Nagar, Jaipur &nbsp;<b>A/c 729105500030 IFSC Code ICIC0007291</b></span>
	      </td>
	      <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
	      <td style="text-align: center;border-right:2px solid #000;padding: 5px;"></td>
	      <td style="text-align: center;padding: 5px;"></td>
	    </tr>
    </tfoot>

    <tr>
      <td colspan="2" style="border-top:2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000;font-size: 11px;padding: 5px;">White - Customer, Yellow - Designer, Pink - Transporter/Dispatch, Off. White - Off. Copy</td>
      <td colspan="2" style="padding: 5px 10px;border-top:2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000;font-weight: 600;">Sub Total</td>
      <td style="text-align: center;padding: 5px 0;border-top:2px solid #000;border-bottom: 2px solid #000;">
        <?php echo number_format($actions['subtotal'],2); ?>
      </td>
    </tr>


    <tr>      
      <td colspan="2" rowspan="4" style="padding: 0px;border-right: 2px solid #000;border-bottom: 2px solid #000;font-size: 14px;font-weight: 600;">
        <span style="margin: 0 15px 5px; border-bottom: 2px solid #000;">Conditions:</span>
        <ul style="margin:0;padding-top:5px;padding-left:15px;font-size: 10px;font-weight: 400;">
          <li style="padding: 2px 0;">Delivery Self / Transport.</li>
          <!--
          <li style="padding: 2px 0;">Dispatch Point : 482, Shrishti Residency, Near Tadka Hotel, Jaipur Ph.: 0141-4019175</li>
          <li style="padding: 2px 0;">
            Delivery Charges :
            <span style="display: block;padding: 2px 0;">(Bike) Rs. 50/-(Fixed) + 10/- Per Km. Extra.</span>
            <span style="display: block;padding: 2px 0;">(Auto) Rs. 100/-(Fixed) + 10/- Per Km. Extra.</span>
          </li>
          -->
          <li style="padding: 2px 0;">Advance 50% on Estimate Booking and Remaining on Before Delivery.</li>
          <li style="padding: 2px 0;">Payment is Preferred in Cheque Only.</li>
          <li style="padding: 2px 0;">Packaging And Freight Are Extra.</li>
        </ul>
      </td>
      <td colspan="2" style="padding: 2px 10px;border-right: 2px solid #000;border-bottom: 2px solid #000;font-weight: 600;">Discount</td>
      <td style="padding: 2px 0;border-bottom: 2px solid #000; text-align:center">
        (-)&nbsp;<?php echo number_format($actions['discount_amount'],2);?>
      </td>
    </tr>

    <tr>     
      <td colspan="2" style="padding: 2px 10px;border-right: 2px solid #000;border-bottom: 2px solid #000;font-weight: 600;">Freight Charges</td>
      <td style="padding: 2px 0;border-bottom: 2px solid #000;text-align:center">
        (+)&nbsp;<?php echo number_format($actions['shipping'],2);?>
      </td>
    </tr>

    <tr> 
      <td colspan="2" style="padding: 2px 10px;border-right: 2px solid #000;border-bottom: 2px solid #000;font-weight: 600;">GST</td>
      <td style="padding: 2px 0;border-bottom: 2px solid #000;text-align: center;">
        
      </td>
    </tr>
    <tr> 
      <td colspan="2" style="padding: 2px 10px;border-right: 2px solid #000;border-bottom: 2px solid #000;font-weight: 600;">G.Total</td>
      <td style="padding: 2px 0;border-bottom: 2px solid #000;text-align: center;">
        <?php echo number_format($actions['total'],2);?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align: center;padding: 5px 0;font-weight: 500;font-size:10px;">Showroom : 119 A, Ram Gali No 4, Rajapark, Jaipur - 302004 INDIA | Factory : J 1101, Sitapura Industrial Area (Phase 3), Jaipur</td>
    </tr>

  </table>

</table>

</div>

</body>
</html>
<?php
  $message = ob_get_contents();
  ob_clean();
  return $message;
  }
  
}
