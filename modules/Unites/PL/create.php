<?php

///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    

    $Unit_No = $_POST['Unit_No'];
    $Build_No = $_POST['Build_No'];
    $Project_ID = $_POST['Project_ID'];
    $floor_id = $_POST['floor_id'];

    $status_id = $_POST['status_id'];
    $status_reason = $_POST['status_reason'];
    $Held_for = $_POST['Held_for'];
    $Hold_can_work_on = $_POST['Hold_can_work_on'];
    $approval_status = $_POST['approval_status'];
    $approval_feed_back = $_POST['approval_feed_back'];

    $Raw_ID = $_POST['Raw_ID'];
    $Pos_ID = $_POST['Pos_ID'];
    $Unit_Area = $_POST['Unit_Area'];
    $Basic_Meter_Price = $_POST['Basic_Meter_Price'];
    //$Unit_Basic_Price = $_POST['Unit_Basic_Price'];
    $Roof_Area = $_POST['Roof_Area'];
    $Garden_Area = $_POST['Garden_Area'];
    $Open_terrace_Area = $_POST['Open_terrace_Area']; 
    
    if (isset($_POST['Roof_Area'])) {
        $Roof_Area = $_POST['Roof_Area'];
        $Garden_Area = '0';
        $Open_terrace_Area = '0';
    } elseif (isset($_POST['Garden_Area'])) {
        $Roof_Area = '0';
        $Garden_Area = $_POST['Garden_Area'];
        $Open_terrace_Area = '0';
    } elseif (isset($_POST['Open_terrace_Area']))  {
        $Roof_Area = '0';
        $Garden_Area = '0';
        $Open_terrace_Area = $_POST['Open_terrace_Area'];    
    } elseif (isset($_POST['Garden_Area']) && isset($_POST['Open_terrace_Area']))  {
        $Roof_Area = '0';
        $Garden_Area = $_POST['Garden_Area'];
        $Open_terrace_Area = $_POST['Open_terrace_Area'];    
    }
    

    $Usufruct_type = $_POST['Usufruct_type'];
    $usufruct_meter_price = $_POST['usufruct_meter_price'];
    //$Usufruct_Price = $_POST['Usufruct_Price'];
    $Net_Area = $_POST['Net_Area'];
    $Load_Ratio_new = $_POST['Load_Ratio_new']/100;
    //$maintenance_pct = $_POST['maintenance_pct'];
    $finishing_level_new = $_POST['finishing_level'];
    $Rooms_Desc = $_POST['Rooms_Desc'];
    
    // escaping variables
    $Unit_No = $database->escape_string($Unit_No);
    $Build_No = $database->escape_string($Build_No);
    $Project_ID = $database->escape_string($Project_ID);
    $floor_id = $database->escape_string($floor_id);

    $status_id = $database->escape_string($status_id);
    $status_reason = $database->escape_string($status_reason);
    $Held_for = $database->escape_string($Held_for);
    $Hold_can_work_on = $database->escape_string($Hold_can_work_on);
    $approval_status = $database->escape_string($approval_status);
    $approval_feed_back = $database->escape_string($approval_feed_back);

    $Raw_ID = $database->escape_string($Raw_ID);
    $Pos_ID = $database->escape_string($Pos_ID);
    $Unit_Area = $database->escape_string($Unit_Area);
    $Basic_Meter_Price = $database->escape_string($Basic_Meter_Price);
    //$Unit_Basic_Price = $database->escape_string($Unit_Basic_Price);
    $Roof_Area = $database->escape_string($Roof_Area);
    $Garden_Area = $database->escape_string($Garden_Area);
    $Open_terrace_Area = $database->escape_string($Open_terrace_Area);
    $Usufruct_type = $database->escape_string($Usufruct_type);
    $usufruct_meter_price = $database->escape_string($usufruct_meter_price);
    //$Usufruct_Price = $database->escape_string($Usufruct_Price);
    $Net_Area = $database->escape_string($Net_Area);
    $Load_Ratio_new = $database->escape_string($Load_Ratio_new);
    //$maintenance_pct = $database->escape_string($maintenance_pct);
    $finishing_level_new = $database->escape_string($finishing_level_new);
    $Rooms_Desc = $database->escape_string($Rooms_Desc);

    $sql_in= "INSERT INTO `units` (`Unit_ID`, `Unit_No`, `Build_No`, `Project_ID`, `floor_id`,
    `Raw_ID`, `Pos_ID`, `Unit_Area`, `Basic_Meter_Price`, `Unit_Basic_Price`,
     `Roof_Area`, `Garden_Area`, `Open_terrace_Area`, `Usufruct_type`,
      `usufruct_meter_price`, `Usufruct_Price`, `Net_Area`, `Load_Ratio`,
        `added_by`, `Creation_Date`, `last_update_on`,
        `maintenance_pct`, `finishing_level`, `Rooms_Desc`, `has_activity`,
         `activity_id`,`Status_ID`) 
   VALUES ('', '".$Unit_No."', '".$Build_No."', '".$Project_ID."', '".$floor_id."',
    '".$Raw_ID."', '".$Pos_ID."', '".$Unit_Area."', '".$Basic_Meter_Price."', '',
     '".$Roof_Area."', '".$Garden_Area."', '".$Open_terrace_Area."', '".$Usufruct_type."',
      ".$usufruct_meter_price.", '', '".$Net_Area."', '$Load_Ratio_new',
        '', current_timestamp(), current_timestamp(),
        '', '".$finishing_level_new."', '".$Rooms_Desc."', '', NULL, '".$status_id."')";

    $update_unit_data= $database->query($sql_in); 

    $uId=$Unit_No."-".$Build_No."-".$Project_ID;

    $upFile = new Upload_image_file();

   

    $Layout_With_dimensions = $_FILES["Layout_With_dimensions"];
    $Layout_Without_dimensions = $_FILES["Layout_Without_dimensions"];
    $Model = $_FILES["Model"];

    $Layout_With_dimensions = $upFile->do_upload($Layout_With_dimensions, "units/");
    $Layout_Without_dimensions = $upFile->do_upload($Layout_Without_dimensions, "units/");
    $Model= $upFile->do_upload($Model, "units/");

    $sql_prepar_attachment_table ="INSERT INTO `attachements` (`ID`, `Unit ID`, `File Name`, `File Location`) 
    VALUES (NULL, '".$uId."', 'Layout With dimensions', '".$Layout_With_dimensions[1]."');
    INSERT INTO `attachements` (`ID`, `Unit ID`, `File Name`, `File Location`) 
    VALUES (NULL, '".$uId."', 'Layout Without dimensions', '".$Layout_Without_dimensions[1]."');
    INSERT INTO `attachements` (`ID`, `Unit ID`, `File Name`, `File Location`) 
    VALUES (NULL, '".$uId."', 'Model', '".$Model[1]."');";
    $update_sql_prepar_attachment_table= $database->multi_query($sql_prepar_attachment_table); 

    // $sql_attachment="UPDATE `attachements` SET `File Location`='".$Layout_With_dimensions[1]."' WHERE `Unit ID`='".$uId."' AND `File Name`='Layout With dimensions';
    // UPDATE `attachements` SET `File Location`='".$Layout_Without_dimensions[1]."' WHERE `Unit ID`='".$uId."' AND `File Name`='Layout Without dimensions';
    // UPDATE `attachements` SET `File Location`='".$Parking[1]."' WHERE `Unit ID`='".$uId."' AND `File Name`='Parking';
    // UPDATE `attachements` SET `File Location`='".$Model[1]."' WHERE `Unit ID`='".$uId."' AND `File Name`='Model';";

    // $sql_attachment="INSERT INTO `attachements` (`ATTID`, `Unit_ID`, `FileName`, `FileLocation`) 
    // VALUES (NULL, '".$uId."', 'Layout With dimensions', '".$Layout_With_dimensions[1]."');
    // INSERT INTO `attachements` (`ATTID`, `Unit_ID`, `FileName`, `FileLocation`) 
    // VALUES (NULL, '".$uId."', 'Layout Without dimensions', '".$Layout_Without_dimensions[1]."');
    // INSERT INTO `attachements` (`ATTID`, `Unit_ID`, `FileName`, `FileLocation`) 
    // VALUES (NULL, '".$uId."', 'Parking', '".$Parking[1]."');
    // INSERT INTO `attachements` (`ATTID`, `Unit_ID`, `FileName`, `FileLocation`) 
    // VALUES (NULL, '".$uId."', 'Model', '".$Model[1]."');";

    $update_atta_data= $database->multi_query($sql_attachment); 

    // checking errors 
    $check_er = new errors_info();
    $actions_in_array_for_check=array($Layout_With_dimensions, $Layout_Without_dimensions,  $Model,$update_sql_prepar_attachment_table, $update_unit_data);
    $check_er->multi_check_if_there_error($actions_in_array_for_check);
    
    if ($check_er->error_list["Error_count"]>0) {
        $unit_dml=$check_er->error_list["error_mes"];
    }else {
        $unit_dml = true;
    }


} 
///////////////////////////////////////////////////////////////
/// End of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory 
            <?php 
            // echo "<br>";
            // var_dump($Layout_With_dimensions);
            // echo "<br>".$Layout_Without_dimensions[0];
            // echo "<br>".$Model[0];
            // echo "<br>".$Parking[0]."<br>";
            // var_dump($sql_attachment);
            // echo "<br>";
            // var_dump($update_atta_data);
            ?>
            </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index?module=Unites">Units</a></li>
                <li class="breadcrumb-item active">New Unit</li>
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
            <button onclick="location.href='index?module=Unites'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <img src="assets/images/units/1.png" width="280" />
                    <div class="row text-center justify-content-md-center"></div>
                </div>
                <div>
                    <hr />
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Add By</small>
                            <p><?php echo htmlentities("Administrator");?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Creation Date</small>
                            <p><?php echo htmlentities(date("Y/m/d h:i:s"));?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Last Update Date</small>
                            <p><?php echo htmlentities(date("Y/m/d h:i:s"));?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <form action="index?module=Unites&create=true" method="post" enctype="multipart/form-data">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Unit Profile</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UsufructDiscription" role="tab">Unit Usufruct </a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UnitNetArea" role="tab">Unit Net Area</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UsufructAttachment" role="tab">Unit Attachment</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r">
                                        <strong>Project</strong>
                                        <div class="form-group">
                                            <select id="myselect" name="Project_ID" class="form-control form-control-line" required="test">
                                                <option value="">Select Project</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $projectsNameCount ; $i++) { 
    echo "<option value='".$project_name["ProID"][$i]."' >".$project_name["ProName"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> s
///////////////////////////////////////////////////////////////
?>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <strong>Build No</strong>
                                        <div class="form-group">
                                            <input type="number" name="Build_No" class="form-control"required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <strong>Unit No</strong>
                                        <div class="form-group">
                                            <input type="number" name="Unit_No" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <strong>Floor</strong>
                                        <div class="form-group">
                                            <select id="myselect" name="floor_id" class="form-control form-control-line" required>
                                                <option value="">Select Floor</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $FloorNameCount ; $i++) { 
    echo "<option value='".$floor_name["Floor_Id"][$i]."' >".$floor_name["Floor_Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <strong>Unit Status</strong>
                                        <div class="form-group">
                                            <select id="unitStatusform" name="status_id" class="form-control form-control-line" required>
                                                <option value="2">Available</option>
                                                <option value="4">Hold</option>
                                                <option value="7">On Sale</option>
                                                <option value="3">Reserved</option>
                                                <option value="8">Sold</option>
                                                <option value="6">Restricted</option>
                                                <option value="5">Un-Available</option>
                                            </select>
                                        </div>
                                   </div>
                                </div>                                
                                <hr />
                                <div class="ribbon-wrapper">
                                    <div class="ribbon ribbon-bookmark ribbon-info">Unit Discription</div>
                                    <p class="ribbon-content">check out the unit discription</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Row Type</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <select id="myselect" name="Raw_ID" class="form-control form-control-line" required>
                                                <option>Select Row</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $rowNameCount ; $i++) { 
    echo "<option value='".$row_name["R_ID"][$i]."' >".$row_name["R_Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Position</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <select id="myselect" name="Pos_ID" class="form-control form-control-line" required>
                                                <option value="">Select Position</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $unitPositionNameCount ; $i++) { 
    echo "<option value='".$unitPosition["Pos_ID"][$i]."' >".$unitPosition["Pos_Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Unit Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" name="Unit_Area" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Basic Meter Price</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <select id="myselect" name="Basic_Meter_Price" class="form-control form-control-line" required>
                                                <option value="">Select Basic Meter Price</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $basicpricesNameCount ; $i++) { 
    echo "<option value='".$basic_prices["Basic_ID"][$i]."' >".$basic_prices["Basic_Meter_Price"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6 ribbon-vwrapper card">
                                        <div class="ribbon ribbon-success ribbon-vertical-l"><i class="fa fa-check-circle"></i></div>
                                        <strong><span class="label label-info">Unit Basic Price</span></strong>
                                        <br />
                                        <p>N/A</p>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Roof Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="RoofArea" value="0" name="Roof_Area" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Garden Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="GardenArea" value="0" name="Garden_Area" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Open Tras Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="OpenTrasArea" value="0" name="Open_terrace_Area" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <br />

                                <div class="ribbon-wrapper">
                                    <div class="ribbon ribbon-bookmark ribbon-primary">Unit More Discription</div>
                                    <p class="ribbon-content">check out the unit Usufruct details</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-primary">Rooms Description</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <select id="myselect" name="Rooms_Desc" class="form-control form-control-line" required>
                                                <option>Select Rooms</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $roomsNameCount ; $i++) { 
    echo "<option value='".$rooms["ID"][$i]."' >".$rooms["Rooms_Count"][$i]." Rooms , discription : ".$rooms["Rooms_Description"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-primary">finishing level</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <select id="myselect" name="finishing_level" class="form-control form-control-line" required>
                                                <option value="">Select Level</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $finishingLevelNameCount ; $i++) { 
    echo "<option value='".$finishing_level["ID"][$i]."'>".$finishing_level["Level"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r ribbon-vwrapper card">
                                        <div class="ribbon ribbon-primary ribbon-vertical-l"><i class="fa fa-check-circle"></i></div>
                                        <strong><span class="label label-primary">Maintenance Percentage</span></strong>
                                        <br />
                                        <p>N/A</p>
                                    </div>

                                    <hr />
                                </div>
                                <hr />
                            </div>
                        </div>
                        <!--UsufructDiscription tab-->
                        <div class="tab-pane" id="UsufructDiscription" role="tabpanel">
                            <div class="card-block">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon ribbon-bookmark ribbon-primary">Unit Usufruct Discription</div>
                                    <p class="ribbon-content">check out the unit Usufruct details</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r">
                                        <strong><span class="label label-primary">Usufruct Type</span></strong>
                                        <div class="form-group">
                                            <select id="myselect" name="Usufruct_type" class="form-control form-control-line" required>
                                                <option value="">Select Usufruct Type</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $usufructtypeNameCount ; $i++) { 
    echo "<option value='".$usufruct_type["Usu_type"][$i]."' >".$usufruct_type["Usu_type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r">
                                        <strong><span class="label label-primary"> Usufruct Meter Price</span></strong>
                                        <div class="form-group">
                                            <select id="myselect" name="usufruct_meter_price" class="form-control form-control-line" required>
                                                <option value="">Usufruct Meter Price</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $usufructpricesNameCount ; $i++) { 
    echo "<option value='".$usufruct_prices["UsuID"][$i]."' >".$usufruct_prices["Usufruct_Meter_Price"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r ribbon-vwrapper card">
                                        <div class="ribbon ribbon-primary ribbon-vertical-l"><i class="fa fa-check-circle"></i></div>
                                        <strong><span class="label label-primary">Usufruct Price</span></strong>
                                        <br />
                                        <p>N/A</p>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <!--UnitNetArea tab-->
                        <div class="tab-pane" id="UnitNetArea" role="tabpanel">
                            <div class="card-block">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon ribbon-bookmark ribbon-primary">Unit Net Area</div>
                                    <p class="ribbon-content">check out the unit Usufruct details</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <strong><span class="label label-primary"> Net_Area</span></strong>
                                        <div class="form-group">
                                            <input type="number" name="Net_Area" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <strong><span class="label label-primary">Load_Ratio %</span></strong>
                                        <div class="form-group">
                                            <input type="number" name="Load_Ratio_new" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <!--UsufructDiscription tab-->
                        <div class="tab-pane" id="UsufructAttachment" role="tabpanel">
                            <div class="card-block">
                                <h4 class="card-title">Unit Attachment</h4>
                                <h6 class="card-subtitle">you can download the attachment from below</h6>
                                <div class="row m-t-30">
                                    <div class="col-md-6">
                                        <input type="file" name="Layout_With_dimensions" id="input-file-now" class="dropify" required/>
                                        <h3 class="m-t-10">Layout With dimensions</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="Layout_Without_dimensions" id="input-file-now" class="dropify" required/>
                                        <h3 class="m-t-10">Layout Without dimensions</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="Model" id="input-file-now" class="dropify" required/>
                                        <h3 class="m-t-10">Model</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-block">
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button" onclick="location.href='index?module=units'" class="btn btn-inverse">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
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
