<?php

$EditeunitId = $_GET['EditeunitId'];

// ///////////////////////////////////////////////////////////////
// /// start of ---> getting Units details 
// ///////////////////////////////////////////////////////////////
 $sql_get_units="SELECT `u`.`Unit_ID`,
 `u`.`Unit_No`,
 `u`.`Build_No`,
 `u`.`Project_ID` as`project_id`,
 `P`.`Name`as`project_name`,
 `u`.`floor_id`,
 `f`.`Name`as`floor_name`,
 `u`.`Raw_ID` as `R_Type_id`,
 `r`.`Type`as`R_Type`,
 `u`.`Pos_ID` as`pos_id`,
 `up`.`Name`as`pos_name`,
 `u`.`Unit_Area`,
 `u`.`Basic_Meter_Price` as `Basic_Meter_Price_id`,
 `bp`.`Basic Meter Price`as`Basic_Meter_Price`,
 `u`.`Unit_Basic_Price`,
 `u`.`Roof_Area`,
 `u`.`Garden_Area`,
 `u`.`Open_terrace_Area`,
 `u`.`Usufruct_type`,
 `u`.`usufruct_meter_price` as `Usufruct_Meter_Price_id`,
 `usup`.`Usufruct Meter Price`as `Usufruct_Meter_Price`,
 `Usufruct_Price`,
 `Net_Area`,
 `Load_Ratio`,
 `u`.`Status_ID`,
 `unit status`.`Name`as`status_Name`,
 `unit status`.`colour`,
 `u`.`added_by`,
 `u`.`Creation_Date`,
 `u`.`last_update_on`,
 `u`.`maintenance_pct`,
 `u`.`finishing_level` AS `finishing_level_id`,
 `fi`.`Level` AS `finishing_level_name`,
 `u`.`Rooms_Desc` as `Rooms_and_Desc_id`,
 `Ro`.`Count`as`Rooms_Count`,
 `ro`.`Description`as`Rooms_Description`,
 `u`.`has_activity`,
 `u`.`activity_id`,
 `p`.`Location On Map`as `location_OnMap`
 From Units u 
 LEFT JOIN `projects` `p`
 on u.Project_ID = p.ID
 LEFT JOIN `floor` f
 on u.floor_id = f.ID
 LEFT JOIN `raw type` `r`
 on u.Raw_ID = r.ID
 left join `unit position` `up`
 on u.Pos_ID = up.ID
 left join `basic prices` `bp`
 on u.Basic_Meter_Price = bp.ID
 LEFT JOIN `usufruct prices` usup
 on u.usufruct_meter_price = usup.ID
 LEFT JOIN  `unit status`
 on u.Status_ID = `unit status`.ID
 LEFT JOIN `finishing level` fi
 on u.finishing_level = fi.ID
 LEFT JOIN rooms ro
 on u.Rooms_Desc = ro.ID
 WHERE u.Unit_ID='".$EditeunitId."'";

 $units_all= $database->query($sql_get_units);

 $unitsCount = $units_all->num_rows;

    // output data of each row
    while($row = $units_all->fetch_assoc()) {
        $Unit_ID = $row["Unit_ID"];
        $Unit_No= $row["Unit_No"];
        $Build_No= $row["Build_No"];
        $project_id = $row["project_id"];
        $project_name= $row["project_name"];
        $floor_id = $row["floor_id"];
        $floor_name= $row["floor_name"];
        $R_Type_id = $row["R_Type_id"];
        $R_Type= $row["R_Type"];
        $pos_id = $row["pos_id"];
        $pos_name= $row["pos_name"];
        $Unit_Area= $row["Unit_Area"];
        $Basic_Meter_Price_id = $row["Basic_Meter_Price_id"];
        $Basic_Meter_Price= $row["Basic_Meter_Price"];
        $Unit_Basic_Price= $row["Unit_Basic_Price"];
        $Roof_Area= $row["Roof_Area"];
        $Garden_Area= $row["Garden_Area"];
        $Open_terrace_Area= $row["Open_terrace_Area"];
        $Usufruct_type = $row["Usufruct_type"];
        $Usufruct_Meter_Price_id = $row["Usufruct_Meter_Price_id"];
        $Usufruct_Meter_Price= $row["Usufruct_Meter_Price"];
        $Usufruct_Price= $row["Usufruct_Price"];
        $Net_Area= $row["Net_Area"];
        $Load_Ratio= $row["Load_Ratio"];
        $Status_ID = $row["Status_ID"];
        $status_Name= $row["status_Name"];
        $colour= $row["colour"];
        $added_by= $row["added_by"];
        $Creation_Date= $row["Creation_Date"];
        $last_update_on= $row["last_update_on"];
        $maintenance_pct= $row["maintenance_pct"];
        $finishing_level_id = $row["finishing_level_id"];
        $finishing_level_name = $row["finishing_level_name"];
        $Rooms_and_Desc_id = $row["Rooms_and_Desc_id"];
        $Rooms_Count= $row["Rooms_Count"];
        $Rooms_Description= $row["Rooms_Description"];
        $has_activity= $row["has_activity"];
        $activity_id = $row["activity_id"]; 
        $location_OnMap = $row["location_OnMap"];
            
    }
        



  
///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    $floor_id_edite = $_POST['floor_id_edite'];
    $status_id_edite = $_POST['status_id_edite'];
    $Raw_ID_edite = $_POST['Raw_ID_edite'];
    $Pos_ID_edite = $_POST['Pos_ID_edite'];
    $Unit_Area_edite = $_POST['Unit_Area_edite'];
    $Basic_Meter_Price_id_edite = $_POST['Basic_Meter_Price_id_edite'];

    if (isset($_POST['Roof_Area_edite'])) {
        $Roof_Area_edite = $_POST['Roof_Area_edite'];
        $Garden_Area_edite = '';
        $Open_terrace_Area_edite = '';
    } elseif (isset($_POST['Garden_Area_edite'])) {
        $Roof_Area_edite = '';
        $Garden_Area_edite = $_POST['Garden_Area_edite'];
        $Open_terrace_Area_edite = '';
    } elseif (isset($_POST['Open_terrace_Area_edite']))  {
        $Roof_Area_edite = '';
        $Garden_Area_edite = '';
        $Open_terrace_Area_edite = $_POST['Open_terrace_Area_edite'];    
    } elseif (isset($_POST['Garden_Area_edite']) && isset($_POST['Open_terrace_Area_edite']))  {
        $Roof_Area_edite = '';
        $Garden_Area_edite = $_POST['Garden_Area_edite'];
        $Open_terrace_Area_edite = $_POST['Open_terrace_Area_edite'];    
    }


    $Rooms_and_Desc_id_edite = $_POST['Rooms_and_Desc_id_edite'];
    $finishing_level_id_edite = $_POST['finishing_level_id_edite'];
    $Usufruct_type_edite = $_POST['Usufruct_type_edite'];
    $usufruct_meter_price_id_edite = $_POST['usufruct_meter_price_id_edite'];
    $Net_Area_edite = $_POST['Net_Area_edite'];
    $Load_Ratio_edite = $_POST['Load_Ratio_edite'];

    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////
       //php Creating a dynamic  query with PHP and MySQL
       $setcolumn = array();
       if ($floor_id_edite != "") 
       $setcolumn[] = "`floor_id`='{$floor_id_edite}' ";
       if ($status_id_edite != "") 
       $setcolumn[] = "`Status_ID`='{$status_id_edite}' ";
       if ($Raw_ID_edite != "") 
       $setcolumn[] = "`Raw_ID`='{$Raw_ID_edite}' ";
       if ($Pos_ID_edite != "") 
       $setcolumn[] = "`Pos_ID`='{$Pos_ID_edite}' ";
       if ($Unit_Area_edite != "") 
       $setcolumn[] = "`Unit_Area`='{$Unit_Area_edite}' ";
       if ($Basic_Meter_Price_id_edite != "") 
       $setcolumn[] = "`Basic_Meter_Price`='{$Basic_Meter_Price_id_edite}' ";

       if ($Roof_Area_edite != "") 
       $setcolumn[] = "`Roof_Area`='{$Roof_Area_edite}' ";
       if ($Garden_Area_edite != "") 
       $setcolumn[] = "`Garden_Area`='{$Garden_Area_edite}' ";
       if ($Open_terrace_Area_edite != "") 
       $setcolumn[] = "`Open_terrace_Area`='{$Open_terrace_Area_edite}' ";

       if ($Rooms_and_Desc_id_edite != "") 
       $setcolumn[] = "`Rooms_Desc`='{$Rooms_and_Desc_id_edite}' ";
       if ($finishing_level_id_edite != "") 
       $setcolumn[] = "`Finishing_Level`='{$finishing_level_id_edite}' ";

       if ($Usufruct_type_edite != "") 
       $setcolumn[] = "`Usufruct_type`='{$Usufruct_type_edite}' ";
       if ($usufruct_meter_price_edite != "") 
       $setcolumn[] = "`usufruct_meter_price`='{$usufruct_meter_price_edite}' ";
       if ($Net_Area_edite != "") 
       $setcolumn[] = "`Net_Area`='{$Net_Area_edite}' ";
       if ($Load_Ratio_edite != "") 
       $setcolumn[] = "`Load_Ratio`='{$Load_Ratio_edite}' ";
       
       
       
       ////////////////////////////////////////////////////
       if ($setcolumn == null) {
           $setcolumn = "";
       } else {
           $setcolumn = "SET " . implode(",", $setcolumn);
       }
       ////////////////////////////////////////////////////
   
        $sql_update =  "UPDATE `units`  {$setcolumn}   WHERE `Unit_ID`='".$EditeunitId."'";
        $unit_dml= $database->query($sql_update); 

    // $sql_update= "call Update_Units(".$Unit_No_edite.", ".$Build_No_edite.", ".$Project_ID_edite.", ".$floor_id_edite.", ".$Raw_ID_edite.", ".$Pos_ID_edite.", ".$Unit_Area_edite.", ".$Basic_Meter_Price_edite.", ".$Roof_Area_edite.", ".$Garden_Area_edite.", ".$Open_terrace_Area_edite.", ".$Usufruct_type_edite.", ".$usufruct_meter_price_edite.", ".$Net_Area_edite.", NULL, ".$Status_ID_edite.", ".$finishing_level_new_edite.", ".$Rooms_Desc_edite.")";
    // $unit_dml= $database->query($sql_update); 




} 
///////////////////////////////////////////////////////////////
/// End of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////



// ///////////////////////////////////////////////////////////////
// /// End of ---> getting Units details 
// ///////////////////////////////////////////////////////////////

?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index?module=Unites">Units</a></li>
                <li class="breadcrumb-item active">Unit ID <?php echo htmlentities($EditeunitId); ?> </li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Activities&create=true&unitId=<?php echo htmlentities($EditeunitId) ?>'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> New Activity </button>
            <button onclick="location.href='index?module=Service.Request&create=true&unitid=<?php echo htmlentities($EditeunitId) ?>'" class="btn pull-right hidden-sm-down btn-success"> <i class="mdi mdi-plus-circle"> </i> New Request </button>
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
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4">
                            <a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254 Activity</font></a>
                        </div>
                        <div class="col-4">
                            <a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium"> <?php echo htmlentities($unitsAttachementFileCount); ?> Attachment</font></a>
                        </div>
                    </div>
                </div>
                <div>
                    <hr />
                </div>
                <div class="card-block">
                    <h4><?php echo htmlentities($Unit_ID); ?></h4>
                    <small class="text-muted">Project</small>
                    <p><?php echo htmlentities($project_name); ?></p>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Build No</small>
                            <p><?php echo htmlentities($Build_No); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Unit No</small>
                            <p><?php echo htmlentities($Unit_No); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Floor No</small>
                            <p><?php echo htmlentities($floor_name); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Current Status</small>
                            <?php
                                    echo "<h3><strong><span class='".htmlentities($status_Name)."' style='background-color: rgb(".$colour.");'>".htmlentities($status_Name)."</span></strong></h3>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Add By</small>
                            <p><?php echo htmlentities($added_by); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Creation Date</small>
                            <p><?php echo htmlentities($Creation_Date); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Last Update Date</small>
                            <p><?php echo htmlentities($last_update_on); ?></p>
                        </div>
                    </div>

                    <small class="text-muted p-t-30 db">Address</small>
                    <h6>Location On MAP</h6>
                    <div class="map-box">
                        <iframe
                            src="<?php echo htmlentities($location_OnMap); ?>"
                            width="100%"
                            height="150"
                            frameborder="0"
                            style="border: 0;"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <form action="index?module=Unites&EditeunitId=<?php echo htmlentities($Unit_ID) ?>" method="post">
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
                                            <select id="myselect" name="Project_ID" class="form-control form-control-line" disabled>
                                                <option value="<?php echo htmlentities($project_id); ?>"><?php echo htmlentities($project_name); ?></option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $projectsNameCount ; $i++) { 
    echo "<option value='".$project_all["ProID"][$i]."' >".$project_all["ProName"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <strong>Build No</strong>
                                        <div class="form-group">
                                            <input type="number" name="Build_No" class="form-control" placeholder="<?php echo htmlentities($Build_No); ?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <strong>Unit No</strong>
                                        <div class="form-group">
                                            <input type="number" name="Unit_No" class="form-control" placeholder="<?php echo htmlentities($Unit_No); ?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <strong>Floor</strong>
                                        <div class="form-group">
                                            <select id="myselect" name="floor_id_edite" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($floor_id); ?>"><?php echo htmlentities($floor_name); ?></option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $FloorNameCount ; $i++) { 
    echo "<option value='".$floor_all["Floor_Id"][$i]."' >".$floor_all["Floor_Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <strong>Unit Status</strong>
                                        <div class="form-group">
                                            <select id="unitStatusform" name="status_id_edite" class="form-control form-control-line" required>
                                                <option value="<?php echo htmlentities($Status_ID); ?>"><?php echo htmlentities($status_Name); ?></option>
                                            <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $StatusNameCount ; $i++) { 
    echo "<option value='".$Status_name["Status_ID"][$i]."' >".$Status_name["status_Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?> 
                                            </select>
                                        </div>
                                   </div>                            
                                    <div class="col-md-2 col-xs-6">
                                     <strong>Current Status</strong>
                                      <br />
                                      <?php
                                      echo "<h3><strong><span class='".htmlentities($status_Name)."' style='background-color: rgb(".$colour.");'>".htmlentities($status_Name)."</span></strong></h3>";
                                      ?>
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
                                            <select id="myselect" name="Raw_ID_edite" class="form-control form-control-line">
                                                <option value="<?php echo htmlentities($R_Type_id); ?>"><?php echo htmlentities($R_Type); ?></option>
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
                                            <select id="myselect" name="Pos_ID_edite" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($pos_id); ?>"><?php echo htmlentities($pos_name); ?></option>
s<?php
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
                                            <input type="number" name="Unit_Area_edite" class="form-control" placeholder="<?php echo htmlentities($Unit_Area); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Basic Meter Price</span></strong>
                                        </h3>
                                        <div class="form-group">
                                        <select id="myselect" name="Basic_Meter_Price_id_edite" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($Basic_Meter_Price_id); ?>"><?php echo htmlentities($Basic_Meter_Price); ?></option>
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
                                        <p><?php echo htmlentities($Unit_Basic_Price); ?></p>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Roof Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="RoofArea" name="Roof_Area_edite" class="form-control" placeholder="<?php echo htmlentities($Roof_Area); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Garden Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="GardenArea" name="Garden_Area_edite" class="form-control" placeholder="<?php echo htmlentities($Garden_Area); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <h3>
                                            <strong><span class="label label-info">Open Tras Area</span></strong>
                                        </h3>
                                        <div class="form-group">
                                            <input type="number" id="OpenTrasArea" name="Open_terrace_Area_edite" class="form-control" placeholder="<?php echo htmlentities($Open_terrace_Area); ?>"/>
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
                                            <select id="myselect" name="Rooms_and_Desc_id_edite" class="form-control form-control-line" required>
                                                <option value="<?php echo htmlentities($Rooms_and_Desc_id); ?>"> <?php echo htmlentities($Rooms_Count); ?> Room, <?php echo htmlentities($Rooms_Description); ?></option>
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
                                            <select id="myselect" name="finishing_level_id_edite" class="form-control form-control-line" >
                                                <option value="<?php echo htmlentities($finishing_level_id); ?>"><?php echo htmlentities($finishing_level_name); ?></option>
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
                                        <p><?php echo htmlentities($maintenance_pct*100)." %"; ?></p>
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
                                            <select id="myselect" name="Usufruct_type_edite" class="form-control form-control-line" required>
                                                <option value="<?php echo htmlentities($Usufruct_type); ?>"><?php echo htmlentities($Usufruct_type); ?></option>
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
                                            <select id="myselect" name="usufruct_meter_price_id_edite" class="form-control form-control-line" required>
                                                <option value='<?php echo htmlentities($Usufruct_Meter_Price_id);?>'> <?php echo htmlentities($Usufruct_Meter_Price);?></option>
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
                                        <p><?php echo htmlentities($Usufruct_Price); ?></p>
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
                                            <input type="number" name="Net_Area_edite" placeholder="<?php echo htmlentities($Net_Area); ?>" value="<?php echo htmlentities($Net_Area); ?>"class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-6 b-r">
                                        <strong><span class="label label-primary"> Net_Area</span></strong>
                                        <div class="form-group">
                                            <input type="number" name="Load_Ratio_edite" placeholder="<?php echo htmlentities($Load_Ratio); ?>" value="<?php echo htmlentities($Load_Ratio); ?>"class="form-control" />
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
                                        <input type="file" name="Layout_With_dimensions" id="input-file-now" class="dropify" data-default-file="<?php echo 'uploads/'.htmlentities($Layout_With_dimensions_FileLocation); ?>"/>
                                        <h3 class="m-t-10">Layout With dimensions</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="Layout_Without_dimensions" id="input-file-now" class="dropify" data-default-file="<?php echo 'uploads/'.htmlentities($Layout_Without_dimensions_FileLocation); ?>"/>
                                        <h3 class="m-t-10">Layout Without dimensions</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="Model" id="input-file-now" class="dropify" data-default-file="<?php echo 'uploads/'.htmlentities($Model_FileLocation); ?>"/>
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
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                            <button type="button" onclick="location.href='index?module=Developers'" class="btn btn-inverse">Cancel</button>
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
