<?php

if (isset($_GET['unitId'])) {
    $unit_Id_new = $_GET['unitId'];
}
if (isset($_GET['unitId'])) {
    $unit_Id_new = $_GET['unitId'];
}
///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    $unit_id_new = $_POST['unit_id_new'];
    $activity_id_new = $_POST['activity_id_new'];
    $unit_status = $_POST['status_id_new'];
    $unit_status_reason = $_POST['requested_status_reason_new'];
    $Hold_can_work_on_new = $_POST['Hold_can_work_on_new'];
    $Held_for_new = $_POST['Held_for_new'];
    $ticket_status = $_POST['ticket_status_new'];
    $ticket_feedback = $_POST['ticket_feed_back_new'];
    
    // escaping variables
    $unit_id_new = $database->escape_string($unit_id_new);
    $activity_id_new = $database->escape_string($activity_id_new);
    $unit_status = $database->escape_string($unit_status);
    $unit_status_reason = $database->escape_string($unit_status_reason);
    $Hold_can_work_on_new = $database->escape_string($Hold_can_work_on_new);
    $Held_for_new = $database->escape_string($Held_for_new);
    $ticket_status = $database->escape_string($ticket_status);
    $ticket_feedback = $database->escape_string($ticket_feedback);

    $sql= "INSERT INTO `developers` (`ID`, 
    `unit_ID`, 
    `activity_ID`,
    `unit_status`,
    `unit_status_reason`,
    `Hold_Can_Work_On`,
    `Held_For`,
    `ticket_status`,
    `ticket_feedback`,
    `creation_date`) VALUES (NULL,
    '".$unit_id_new."', 
    '".$activity_id_new."', 
    '".$unit_status."', 
    '".$mobile2."', 
    '".$mobile2."', 
    '".$mobile2."', 
    current_timestamp(), 
    '',
    '".$mobile2."')";
    $ticket_dml= $database->query($sql); 

} 
///////////////////////////////////////////////////////////////
/// End of ---> submitting form data to the database 
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
            <h3 class="text-themecolor m-b-0 m-t-0">Service Request Ticket</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">New Ticket</li>
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
            <button onclick="location.href='index?module=Service Request'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">New Ticket Request</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Service.Request&create=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title">Unit Info</h3>
                            <div class="row p-t-20">
                                <div id="" class="col-md-3 col-xs-6">
                                    <strong>Unit ID </strong>
                                    <div class="form-group">
                                    <input type="text" id="" name="unit_id_new" value="<?php echo htmlentities($unit_Id_new);?>" placeholder="<?php echo htmlentities($unit_Id_new);?>"  class="form-control" disabled/>
                                    </div>
                                </div>
                                <div id="" class="col-md-3 col-xs-6">
                                    <strong>Activity ID </strong>
                                    <div class="form-group">
                                    <input type="text" id="" name="activity_id_new" class="form-control" disabled/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="card-title">Ticket Info</h3>
                            <div class="row p-t-20">
                                    <div class="col-md-3 col-xs-6">
                                        <strong>Requested Unit Status</strong>
                                        <div class="form-group">
                                            <select id="unitStatusform" name="status_id_new" class="form-control form-control-line" required>
                                                <option value="2">Available</option>
                                                <option value="4">Hold</option>
                                                <option value="3">Reserved</option>
                                                <option value="8">Sold</option> -->
                                                <option value="6">Restricted</option>
                                                <option value="5">Un-Available</option>
                                            </select>
                                        </div>
                                   </div>
                                   <div id="Status-Reason" class="col-md-9 col-xs-6 dependent-form ">
                                        <strong>Requested Status Reason</strong>
                                        <div class="form-group">
                                        <input type="text" id="" name="requested_status_reason_new" class="form-control" />
                                        </div>
                                    </div>
                                    <div id="Hold-Can-Work-On" class="col-md-3 col-xs-6 dependent-form">
                                        <strong>Hold Can Work On </strong>
                                        <div class="form-group">
                                            <select id="" name="Hold_can_work_on_new" class="form-control form-control-line " >
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
                                    <div id="Approval-status" class="col-md-3 col-xs-6 dependent-form">
                                        <strong>Ticket Status </strong>
                                        <div class="form-group">
                                            <select id="Approval-status-op" name="ticket_status_new" class="form-control form-control-line" >
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Creation Date</label>
                                        <input type="text" id="" name="" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" disabled="disapled"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Created BY</label>
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
