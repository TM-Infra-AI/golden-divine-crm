<?php

chdir(dirname(__FILE__));
chdir('../');
include_once 'includes/main/WebUI.php';
require_once 'dashboard/include/functions.php';
global $adb,$site_URL;

$webUI = new Vtiger_WebUI();
$currentUser = $webUI->getLogin();  
if(!$currentUser->id) {
    header("Location:../index.php");
    exit;
}
$user = new Users();
$current_user = $user->retrieveCurrentUserInfoFromFile($currentUser->id, "Users");

$role = $_REQUEST['roleId'];

$list_users = getRoleUsers($role);
$html = '';
foreach ($list_users as $id => $user) {    
    $html .= '<li><a class="" id="'.$id.'" href="#">'.$user.'</a></li>';
}
echo $html;exit;