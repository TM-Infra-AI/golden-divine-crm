<?php
header('Access-Control-Allow-Origin: *');
require_once('config.php');
require_once('include/utils/CommonUtils.php');
require_once('include/database/PearDatabase.php');
include_once('vtlib/Vtiger/Module.php');
$db = PearDatabase::getInstance();
$sql = "SELECT vtiger_users.id,CONCAT(vtiger_users.first_name,' ',vtiger_users.last_name) as user_name FROM vtiger_users INNER JOIN vtiger_user2role ON vtiger_users.id = vtiger_user2role.userid where vtiger_users.deleted = 0 AND vtiger_user2role.roleid = 'H4' ORDER BY vtiger_users.id desc";
$result = $db->pquery($sql, array());
$HairdresserName=array();
$i=0;
while($row = $db->fetch_array($result)){
	$HairdresserName[$i]['name']=$row['user_name'];
	$HairdresserName[$i]['id']='19x'.$row['id'];
	$i++;
}
?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style>
html, body {
	margin: 0;
	padding: 0;
	height: 100%;
}
body, input, textarea, .form-control {
	font-size: 14px;
	line-height: 1.5;
	font-family: 'Open Sans', sans-serif;
	font-weight: 400;
}
.main {
	padding: 30px 15px;
	height:100%;
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
	-webkit-justify-content: center;
	-ms-flex-pack: center;
	justify-content: center;
	-webkit-box-align: center;
	-webkit-align-items: center;
	-ms-flex-align: center;
	align-items: center;
}
.main h1{
	text-align: center;
}
form {
	max-width: 500px;
	width: 100%;
	margin: 0 auto;
	padding: 20px;
	box-shadow: 0 0 20px rgba(0,0,0,.2);
}
.form-group {
	margin-bottom: 1rem;
}
label {
	display: inline-block;
 	margin-bottom: .5rem;
}
.form-control {
	display: block;
	width: 100%;
 	padding: .375rem .75rem;
	font-size: 14px;
	color: #495057;
	background-color: #fff;
	border: 1px solid #ced4da;
 	border-radius: .25rem;
	transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.btn {
	background: #f93a00;
	border: solid 1px #f93a00;
	text-transform: uppercase;
	font-weight: 600;
	transition: all .3s ease;
	padding: .375rem 1.75rem;
	font-size: 14px;
	color: #ffffff;
 border-radius: .25rem;
	cursor: pointer;
}
.btn:hover {
	background: transparent;
	color: #f93a00;
}
.red {
	color: red;
}
.text-center {
	text-align:center;
}
.logo{
	text-align: center;
}
.logo img{
	height: 110px;
}
</style>
<div class="main">
	<form id="__vtigerWebForm" name="Save contact with salesman" action="https://dev.marketingmindz.com/Golden_divine/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="logo">
			<img src="test/logo/GoldenDivine.jpg" alt="logo-image">
		</div>
		<h1><b>Contacts Capture Form</b></h1>
		<input type="hidden" name="__vtrftk" value="sid:ea9daca8571bc3e6c84f8fdcbe09c12183c8cafb,1583320026">
		<input type="hidden" name="publicid" value="c030da1c05dd7446f4255641b56e3e4a">
		<input type="hidden" name="urlencodeenable" value="1">
		<input type="hidden" name="name" value="Save contact with salesman">
			<div class="form-group">
				<label>Name
					<spen class="red">*</spen>
				</label>
				<input type="text" name="lastname" class="form-control" data-label="" value="" required="">
			</div>
			
			<div class="form-group">	
				<label>Email-ID</label>
				<input type="email" name="email" class="form-control" data-label="" value="">
			</div>

			<div class="form-group">
				<label>Contact Number
					<spen class="red">*</spen>
				</label>
				<input type="text" name="mobile" class="form-control" data-label="" value="" required="">
			</div>
			
			<div class="form-group">
				<label>Message</label>	
				<textarea name="description" class="form-control"></textarea>
			</div>
			
			<div class="form-group">
				<label>Salesman</label>
				<select class="form-control" name="cf_858" data-label="label:salesman">
					<option value="">Select Value</option>
					<?php foreach ($HairdresserName as $assigned) {
						echo "<option value='".$assigned['id']."'>".$assigned['name']."</option>";
					} ?>
				</select>
			</div>
		<input type="submit" value="Submit" class="btn">
	</form>
</div>

<script  type="text/javascript">
	window.onload = function() { 
		var N=navigator.appName, ua=navigator.userAgent, tem;var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];M=M? [M[1], M[2]]: [N, navigator.appVersion, "-?"];var browserName = M[0];var form = document.getElementById("__vtigerWebForm"), inputs = form.elements; form.onsubmit = function() { var required = [], att, val; for (var i = 0; i < inputs.length; i++) { att = inputs[i].getAttribute("required"); val = inputs[i].value; type = inputs[i].type; if(type == "email") {if(val != "") {var elemLabel = inputs[i].getAttribute("label");var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;var illegalChars= /[\(\)\<\>\,\;\:\"\[\]]/ ;if (!emailFilter.test(val)) {alert("For "+ elemLabel +" field please enter valid email address"); return false;} else if (val.match(illegalChars)) {alert(elemLabel +" field contains illegal characters");return false;}}}if (att != null) { if (val.replace(/^\s+|\s+$/g, "") == "") { required.push(inputs[i].getAttribute("label")); } } } if (required.length > 0) { alert("The following fields are required: " + required.join()); return false; } var numberTypeInputs = document.querySelectorAll("input[type=number]");for (var i = 0; i < numberTypeInputs.length; i++) { val = numberTypeInputs[i].value;var elemLabel = numberTypeInputs[i].getAttribute("label");var elemDataType = numberTypeInputs[i].getAttribute("datatype");if(val != "") {if(elemDataType == "double") {var numRegex = /^[+-]?\d+(\.\d+)?$/;}else{var numRegex = /^[+-]?\d+$/;}if (!numRegex.test(val)) {alert("For "+ elemLabel +" field please enter valid number"); return false;}}}var dateTypeInputs = document.querySelectorAll("input[type=date]");for (var i = 0; i < dateTypeInputs.length; i++) {dateVal = dateTypeInputs[i].value;var elemLabel = dateTypeInputs[i].getAttribute("label");if(dateVal != "") {var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;if(!dateRegex.test(dateVal)) {alert("For "+ elemLabel +" field please enter valid date in required format"); return false;}}}var inputElems = document.getElementsByTagName("input");var totalFileSize = 0;for(var i = 0; i < inputElems.length; i++) {if(inputElems[i].type.toLowerCase() === "file") {var file = inputElems[i].files[0];if(typeof file !== "undefined") {var totalFileSize = totalFileSize + file.size;}}}if(totalFileSize > 52428800) {alert("Maximum allowed file size including all files is 50MB.");return false;}}; }</script>