<?php
///////////////////////////////////////////////////////////////
/// start of ---> getting developer details 
///////////////////////////////////////////////////////////////
$SRId= $_GET["EditeSRId"];

$sql_request= "SELECT `service request`.`ID`, 
 `service request`.`unit_ID`, 
 `service request`.`activity_ID`, 
 `service request`.`unit_status` as `unit_status_id`, 
 `unit status`.`Name` as `unit_status_name`, 
 `service request`.`unit_status_reason`, 
 `service request`.`Hold_Can_Work_On` as `Hold_Can_Work_On_id`, 
 `requested`.`Type`as `Hold_Can_Work_On_name`,
 `service request`.`Held_For`,
 `service request`.`ticket_status` as `ticket_status_id`,
 `approval status`.`Status` as `ticket_status_name` , 
 `service request`.`ticket_feedback`,
 `service request`.`created_by`,
 `service request`.`creation_date`,
 `service request`.`Handled_by`,
 `service request`.`Last_update_date`
  FROM `service request`
  LEFT JOIN `approval status` ON `service request`.`ticket_status`= `approval status`.`ID`
  LEFT JOIN `requested` ON `service request`.`Hold_Can_Work_On`= `requested`.`ID`
  LEFT JOIN `unit status` ON `service request`.`unit_status`= `unit status`.`ID` WHERE `service request`.`ID`=".$SRId."";
$service_request_all= $database->query($sql_request);

//     // output data of each row


while($row = $service_request_all->fetch_assoc()) {
    $ID = $row["ID"];
    $unit_ID = $row["unit_ID"];
    $activity_ID = $row["activity_ID"];
    $unit_status_id = $row["unit_status_id"];
    $unit_status_name = $row["unit_status_name"];
    $unit_status_reason = $row["unit_status_reason"];
    $Hold_Can_Work_On_id = $row["Hold_Can_Work_On_id"];
    $Hold_Can_Work_On_name = $row["Hold_Can_Work_On_name"];
    $Held_For = $row["Held_For"];
    $ticket_status_id = $row["ticket_status_id"];
    $ticket_status_name = $row["ticket_status_name"];
    $ticket_feedback = $row["ticket_feedback"];
    $created_by = $row["created_by"];
    $creation_date = $row["creation_date"];
    $Handled_by = $row["Handled_by"];
    $Last_update_date = $row["Last_update_date"];
  }

///////////////////////////////////////////////////////////////
/// End of ---> getting developer details 
///////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////
/// start of ---> Submitting form data 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {
    
    // getting for data
    // $DeveloperName = $_POST['DeveloperName'];
    // $DeveloperRepresentative = $_POST['DeveloperRepresentative'];
    // $mobile1 = $_POST['mobile1'];
    // $mobile2 = $_POST['mobile2'];
    
    // escaping variables
    // $DeveloperName = $database->escape_string($DeveloperName);
    // $DeveloperRepresentative = $database->escape_string($DeveloperRepresentative);
    // $mobile1 = $database->escape_string($mobile1);
    // $mobile2 = $database->escape_string($mobile2);
   
    //php Creating a dynamic  query with PHP and MySQL
    // $setcolumn = array();
    // if ($DeveloperName != "") 
    // $setcolumn[] = "`Name`='{$DeveloperName}' ";
    // if ($DeveloperRepresentative != "") 
    // $setcolumn[] = "`Rep`='{$DeveloperRepresentative}' ";
    // if ($mobile1 != "") 
    // $setcolumn[] = "`Mobile1`='{$mobile1}' ";
    // if ($mobile2 != "") 
    // $setcolumn[] = "`Mobile2`='{$mobile2}' ";
    
    // if ($setcolumn == null) {
    //     $setcolumn = "";
    // } else {
    //     $setcolumn = "SET " . implode(",", $setcolumn);
    // }

    // $sql_z =  "UPDATE `developers`  {$setcolumn}  WHERE DevID=".$devId."";

    //  $sql_zxc =  "call UPDATE_dev ('".$devId."','".$DeveloperName."','".$DeveloperRepresentative."','".$mobile1."','".$mobile2."')";
    // $service_request_edite= $database->query($sql_zxc); 

} 
///////////////////////////////////////////////////////////////
/// End of ---> Submitting form data 
///////////////////////////////////////////////////////////////

?>

<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Unit Ticket Request </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">Edite Ticket Request Data</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-3">
            <button onclick="location.href='index?module=Developers'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edite Ticket Request NO  <?php echo $ID;?></h4>
                </div>
                <div class="card-block">
                <form action="index?module=Service.Request&create=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title">Unit Info</h3>
                            <div class="row p-t-20">
                                <div id="" class="col-md-1 col-xs-6">
                                    <img src="assets/images/units/1.png" width="120">
                                </div>
                                <div id="" class="col-md-3 col-xs-6">
                                    <strong>Unit ID </strong>
                                    <div class="form-group">
                                    <input type="text" id="" name="unit_id_new" value="<?php echo htmlentities($unit_ID);?>" placeholder="<?php echo htmlentities($unit_ID);?>"  class="form-control" disabled/>
                                    </div>
                                </div>
                                <div id="" class="col-md-1 col-xs-6">
                                    <img src="assets/images/units/activity.jpg" width="90">
                                </div>
                                <div id="" class="col-md-3 col-xs-6">
                                    <strong>Activity ID </strong>
                                    <div class="form-group">
                                    <input type="text" id="" name="activity_id_new" value="<?php echo htmlentities($activity_ID);?>" placeholder="<?php echo htmlentities($activity_ID);?>" class="form-control" disabled/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="card-title">Ticket Info</h3>
                            <div class="row p-t-20">
                                <div id="Status-Reason" class="col-md-3 col-xs-6">
                                    <strong>Ticket ID</strong>
                                    <div class="form-group">
                                    <input type="text" value="<?php echo htmlentities($ID);?>" placeholder="<?php echo htmlentities($ID);?>" class="form-control" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-3 col-xs-6">
                                        <strong>Requested Unit Status</strong>
                                        <div class="form-group">
                                            <select id="unitStatusform" name="status_id_new" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($unit_status_id)?>"><?php echo htmlentities($unit_status_name) ?></option>
                                                <option value="2">Available</option>
                                                <option value="2">Available</option>
                                                <option value="4">Hold</option>
                                                <option value="3">Reserved</option>
                                                <option value="8">Sold</option> 
                                                <option value="6">Restricted</option>
                                                <option value="5">Un-Available</option>
                                            </select>
                                        </div>
                                   </div>
                                   <div id="Status-Reason" class="col-md-9 col-xs-6">
                                        <strong>Requested Status Reason</strong>
                                        <div class="form-group">
                                        <input type="text" id="" name="requested_status_reason_new" value="<?php echo htmlentities($unit_status_reason);?>" placeholder="<?php echo htmlentities($unit_status_reason);?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div id="Hold-Can-Work-On" class="col-md-3 col-xs-6 dependent-form">
                                        <strong>Hold Can Work On </strong>
                                        <div class="form-group">
                                            <select id="" name="Hold_can_work_on_new" class="form-control form-control-line " >
                                                <option value=""><?php echo htmlentities($Hold_Can_Work_On) ?></option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="Held-For" class="col-md-9 col-xs-6 dependent-form">
                                        <strong>Held For</strong>
                                        <div class="form-group">
                                        <input type="text" id="" name="Held_for_new" class="form-control d" />
                                        </div>
                                    </div>
                                    <div id="Approval-status" class="col-md-3 col-xs-6 ">
                                        <strong>Ticket Status </strong>
                                        <div class="form-group">
                                            <select id="Approval-status-op" name="ticket_status_new" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($ticket_status_id);?>"><?php echo htmlentities($ticket_status_name);?></option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $approvalStatusGetCount ; $i++) { 
    echo "<option value='".$Approval_Status_Data["Approval_ID"][$i]."' >".$Approval_Status_Data["Approval_Status"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="Approval-feedback" class="col-md-9 col-xs-6 dependent-form">
                                        <strong>Ticket Feedback</strong>
                                        <div class="form-group">
                                        <input type="text" id="" name="ticket_feed_back_new" class="form-control " />
                                        </div>
                                    </div>
                            </div>                                   
                            <hr />    
                            <div class="row p-t-20">
                                <!--/span-->
                                <div id="" class="col-md-.5 col-xs-6">
                                    <img src="assets/images/icons/Circle-icons-calendar.svg.png" style=" margin-top: 20px;" width="50">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Creation Date</label>
                                        <input type="text" id="" name="" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" disabled="disapled"/>
                                    </div>
                                </div>
                                <div id="" class="col-md-.5 col-xs-6">
                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Created BY</label>
                                        <input type="text" id="" name="" class="form-control" placeholder="<?php echo htmlentities("Administrator");?>" disabled="disapled" />
                                    </div>
                                </div>
                                                                <!--/span-->
                                <div id="" class="col-md-.5 col-xs-6">
                                    <img src="assets/images/icons/Circle-icons-calendar.svg.png" style=" margin-top: 20px;" width="50">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">last Update Date</label>
                                        <input type="text" id="" name="" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" disabled="disapled"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <!--/span-->
                                <div id="" class="col-md-.5 col-xs-6">
                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Handled BY</label>
                                        <input type="text" id="" name="" class="form-control" placeholder="<?php echo htmlentities("Administrator");?>" disabled="disapled" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button" onclick="location.href='index?module=Service.Request'" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title">
                Theme Panel <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
