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
$user = $_REQUEST['user'];
$fromDate = $_REQUEST['fromDate'];
$toDate = $_REQUEST['toDate'];
$role = $_REQUEST['role'];
if($role == ''){
    $role = 'H4';
}
$listrole = GetAllRole();
$list_users = getRoleUsers($role);
$allso = GetSOData($user,$fromDate,$toDate);
include('header.php');
?>
<body class="menu-on-left">
    <div class="wrapper ">
        <div class="main-panel" style="overflow: auto;">
            <?php
            include('navigation.php');
            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" style="position: relative;margin: 6px auto;z-index: 999;">
                            <span style="margin-left: 40px;">
                                <button class="btn btn-success dropdown-toggle" id="rolelistbtn" type="button" data-toggle="dropdown"><?php echo $role == '' ? 'Select Role' : $listrole[$role] ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-custom" id="rolelist">
                                    <!-- <li><a class="" id="" href="#">Select Role</a></li> -->
                                    <?php
                                    foreach ($listrole as $id => $rolelist) {
                                        ?>
                                        <li><a class="<?php echo $role == $id ? 'active' : ''  ?>" id="<?php echo $id;?>" href="#"><?php echo $rolelist;?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span style="margin-left: 40px;">
                                <button class="btn btn-success dropdown-toggle" type="button" id="userlistbtn" data-toggle="dropdown"><?php echo $user == '' ? 'Select User' : $list_users[$user] ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-custom" id="userlist">
                                    <li><a class="" id="" href="#">Select User</a></li>
                                    <?php
                                    foreach ($list_users as $id => $userlist) {
                                        ?>
                                        <li><a class="<?php echo $user == $id ? 'active' : ''  ?>" id="<?php echo $id;?>" href="#"><?php echo $userlist;?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span style="margin-left: 40px;">
                                <span style="margin-left: 40px;" claass="date_col_date">
                                    From: <input type="text" name="fromDate" id="fromDate" class="date-field" value="<?php if($_REQUEST['fromDate']) echo $_REQUEST['fromDate'];?>" placeholder = "Select Date"/> 
                                    To: <input type="text" name="toDate" id="toDate" class="date-field" value="<?php if($_REQUEST['toDate']) echo $_REQUEST['toDate']; ?>" placeholder = "Select Date"/>
                                </span>
                                
                                <span style="margin-left: 10px;">
                                    <input type="button" class="btn btn-success" name="filter" id="filter" value="Filter"/>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-body table-responsive">
                                <div class="tab-pane active table-dashboard-content">
                                    <table  class="table table-striped table-bordered" id="reporttable">
                                        <thead class='header'>
                                            <th>Subject</th>
                                            <th>Contact Name</th>
                                            <th>Due Date</th>
                                            <th>Carrier</th>
                                            <th>Status</th>
                                            <th>Account Name</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($allso as $key => $value) {
                                                ?>
                                                <tr id="<?php echo $value['salesorderid'];?>">
                                                    <td><?php echo $value['subject'];?></td>
                                                    <td><?php echo $value['contact_name'];?></td>
                                                    <td><?php echo $value['due_date'];?></td>
                                                    <td><?php echo $value['carrier'];?></td>
                                                    <td><?php echo $value['status'];?></td>
                                                    <td><?php echo $value['account_name'];?></td>
                                                </tr>
                                                <?php                                              
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('footer.php');
?>
<script type="text/javascript">
    var title = 'Sales Estimate Report';
    $(document).ready(function () {
        $("#fromDate").datepicker({dateFormat: "dd-mm-yy"});
        $("#toDate").datepicker({dateFormat: "dd-mm-yy"});
        var table = $('#reporttable').DataTable({
            "pageLength": 20,
            "bFilter": false,
            "bLengthChange": false,
            "bSort": false,
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'pdf',
                title: title,
                footer: true
            },
            {
                extend: 'excel',
                title: title,
                footer: true
            },
            {
                extend: 'print',
                title: title
            }
            ]
        });
        $(document).on("click","#filter",function(){
            var username = $('#userlist a.active').text();
            var id = '';
            id = $('#userlist a.active').attr('id');
            var role = '';
            role = $('#rolelist a.active').attr('id');
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var today_date = moment().format("YYYY-MM-DD");
            if(id == undefined){
                id = '';
            }
            if(role == undefined){
                role = '';
            }
            if(fromDate == '') {
                var fromDateVal = '';//today_date
            } else {
                var fromDateVal = fromDate;
            }
            if(toDate == '') {
                var toDateVal = '';//today_date;
            } else {
                var toDateVal = toDate;
            }
            var url_redirect = "dashboard_detail.php?user="+id+"&role="+role+"&fromDate=" + fromDateVal + "&toDate=" + toDateVal;
            window.location = url_redirect;
        });
        $(document).on("click","#userlist a",function(e){
            e.preventDefault();
            console.log($(this).text())
            $("#userlist li a").removeClass("select");
            $("#userlist li a").removeClass("active");
            $(this).closest('li a').addClass('select');
            $(this).closest('li a').addClass('active');
            $('#userlistbtn').text($(this).text());
        });
        $(document).on("click","#rolelist a",function(e){
            $("#userlist").html('');
            $('#userlistbtn').text('Select User');
            e.preventDefault();
            $("#rolelist li a").removeClass("select");
            $("#rolelist li a").removeClass("active");
            $(this).closest('li a').addClass('select');
            $(this).closest('li a').addClass('active');
            $('#rolelistbtn').text($(this).text());
            $.ajax({
                type: "POST",
                url: 'ListRoleUser.php',
                data: {
                    'roleId': $('#rolelist a.active').attr('id'),
                },
                success: function (response) {
                    $("#userlist").html(response);
                }
            });
        });
    });
</script>
</body>
</html>
