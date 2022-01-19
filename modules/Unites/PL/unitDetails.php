<?php

$unitDetailsID = $_GET['unitId'];

// ///////////////////////////////////////////////////////////////
// /// start of ---> getting Units details 
// ///////////////////////////////////////////////////////////////
 $sql_get_units="SELECT `u`.`Unit_ID`,
 `u`.`Unit_No`,
 `u`.`Build_No`,
 `u`.`Project_ID`,
 `P`.`Name`as`ProName`,
 `u`.`floor_id`,
 `f`.`Name`as`Floor_Name`,
 `u`.`Raw_ID`,
 `r`.`Type`as`R_Type`,
 `u`.`Pos_ID`,
 `up`.`Name`as`Pos_Name`,
 `u`.`Unit_Area`,
 `bp`.`Basic Meter Price`as`Basic_Meter_Price`,
 `u`.`Unit_Basic_Price`,
 `u`.`Roof_Area`,
 `u`.`Garden_Area`,
 `u`.`Open_terrace_Area`,
 `u`.`Usufruct_type`,
 `usup`.`Usufruct Meter Price`as`Usufruct_Meter_Price`,
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
 `u`.`finishing_level`,
 `fi`.`Level`,
 `u`.`Rooms_Desc`,
 `Ro`.`Count`as`Rooms_Count`,
 `ro`.`Description`as`Rooms_Description`,
 `u`.`has_activity`,
 `u`.`activity_id`,
 `proj`.`location On Map` as `location_OnMap`
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
 LEFT JOIN projects proj
 on u.Project_ID = proj.ID
 WHERE u.Unit_ID='".$unitDetailsID."'";

 $units_all= $database->query($sql_get_units);

 $unitsCount = $units_all->num_rows;

    // output data of each row
    while($row = $units_all->fetch_assoc()) {
        $Unit_ID = $row["Unit_ID"];
        $Unit_No= $row["Unit_No"];
        $Build_No= $row["Build_No"];
        $Project_ID = $row["Project_ID"];
        $ProName= $row["ProName"];
        $floor_id = $row["floor_id"];
        $Floor_Name= $row["Floor_Name"];
        $Raw_ID = $row["Raw_ID"];
        $R_Type= $row["R_Type"];
        $Pos_ID = $row["Pos_ID"];
        $Pos_Name= $row["Pos_Name"];
        $Unit_Area= $row["Unit_Area"];
        $Basic_Meter_Price = $row["Basic_Meter_Price"];
        $Basic_Meter_Price= $row["Basic_Meter_Price"];
        $Unit_Basic_Price= $row["Unit_Basic_Price"];
        $Roof_Area= $row["Roof_Area"];
        $Garden_Area= $row["Garden_Area"];
        $Open_terrace_Area= $row["Open_terrace_Area"];
        $Usufruct_type = $row["Usufruct_type"];
        $usufruct_meter_price = $row["usufruct_meter_price"];
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
        $finishing_level = $row["finishing_level"];
        $LEVEL = $row["LEVEL"];
        $Level= $row["Level"];
        $Rooms_Desc = $row["Rooms_Desc"];
        $Rooms_Count= $row["Rooms_Count"];
        $Rooms_Description= $row["Rooms_Description"];
        $has_activity= $row["has_activity"];
        $activity_id = $row["activity_id"]; 
        $location_OnMap = $row["location_OnMap"];
            
    }
        

  $sql_get_attachement_file="SELECT `File Name`, `File Location` FROM `attachements` WHERE `Unit ID`='".$unitDetailsID."' ORDER BY `File Name` ASC";
  $units_all_attachement_file = $database->query($sql_get_attachement_file);

  $unitsAttachementFileCount = $units_all_attachement_file->num_rows;

  if($unitsAttachementFileCount>0){

    while($row = $units_all_attachement_file->fetch_assoc()) {
        $FileName[] = $row["File Name"]; 
        $FileLocation[] = $row["File Location"]; 
      }
     $attachement_files= array("FileName"=>$FileName, "FileLocation"=>$FileLocation);

  }


  



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
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index?module=Unites">Units</a></li>
                <li class="breadcrumb-item active">Unit ID: <?php echo htmlentities($Unit_ID); ?> Details</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Activities&create=true&unitId=<?php echo htmlentities($EditeunitId) ?>'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> New Activity </button>
            <button onclick="location.href='index?module=Service.Request&create=true&unitId=<?php echo htmlentities($EditeunitId) ?>'" class="btn pull-right hidden-sm-down btn-success"> <i class="mdi mdi-plus-circle"> </i> New Request </button>
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
                    <p><?php echo htmlentities($ProName); ?></p>
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
                            <p><?php echo htmlentities($Floor_Name); ?></p>
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
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab">Unit Activities</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Unit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UsufructDiscription" role="tab">Unit Usufruct </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UnitNetArea" role="tab">Unit Net Area</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#UsufructAttachment" role="tab">Unit Attachment</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-block">
                            <div class="profiletimeline">
                                <div class="sl-item">
                                    <div class="sl-left"><img src="assets/images/users/1.jpg" alt="user" class="img-circle" /></div>
                                    <div class="sl-right">
                                        <div>
                                            <a class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a> Design weblayout</a></p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="sl-left"><img src="assets/images/users/2.jpg" alt="user" class="img-circle" /></div>
                                    <div class="sl-right">
                                        <div>
                                            <a class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <div class="m-t-20 row">
                                                <div class="col-md-3 col-xs-12"><img src="assets/images/big/img1.jpg" alt="user" class="img-responsive radius" /></div>
                                                <div class="col-md-9 col-xs-12">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="sl-left"><img src="assets/images/users/3.jpg" alt="user" class="img-circle" /></div>
                                    <div class="sl-right">
                                        <div>
                                            <a class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p class="m-t-10">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis
                                                ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="sl-left"><img src="assets/images/users/4.jpg" alt="user" class="img-circle" /></div>
                                    <div class="sl-right">
                                        <div>
                                            <a class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <blockquote class="m-t-10">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong>Unit ID</strong>
                                    <br />
                                    <p class="text-muted"><?php echo htmlentities($Unit_ID); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong>Project</strong>
                                    <br />
                                    <p class="text-muted"><?php echo htmlentities($ProName); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong>Build No</strong>
                                    <br />
                                    <p class="text-muted"><?php echo htmlentities($Build_No); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6">
                                    <strong>Unit No</strong>
                                    <br />
                                    <p class="text-muted"><?php echo htmlentities($Unit_No); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6">
                                    <strong>Floor</strong>
                                    <br />
                                    <p class="text-muted"><?php echo htmlentities($Floor_Name); ?></p>
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
                                    <strong><span class="label label-info">Row Type</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($R_Type); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-info">Position</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Pos_Name); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-info">Unit Area</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Unit_Area); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-info"> Basic Meter Price</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Basic_Meter_Price); ?></p>
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
                                <div class="col-md-2 col-xs-6">
                                    <strong><span class="label label-info">Roof Area</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Roof_Area); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-info"> Garden Area</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Garden_Area); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-info"> Open Tras Area</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Open_terrace_Area); ?></p>
                                </div>
                            </div>
                            <hr />
                            <br />
                            
                            <div class="ribbon-wrapper">
                                <div class="ribbon ribbon-bookmark ribbon-primary">Unit Usufruct Discription</div>
                                <p class="ribbon-content">check out the unit Usufruct details</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 b-r">
                                    <strong><span class="label label-primary">Rooms Description</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Rooms_Count); ?> Rooms, <?php echo htmlentities($Rooms_Description); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-primary">finishing_level</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($LEVEL); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r ribbon-vwrapper card">
                                    <div class="ribbon ribbon-primary ribbon-vertical-l"><i class="fa fa-check-circle"></i></div>
                                    <strong><span class="label label-primary">Maintenance Percentage</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($maintenance_pct*100)." %"; ?></p>
                                </div>
                        
                            <hr />
                        </div>
                        <hr>
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
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-primary"> Usufruct Type</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Usufruct_type); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r">
                                    <strong><span class="label label-primary"> Usufruct Meter Price</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Usufruct_Meter_Price); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r ribbon-vwrapper card">
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
                                    <br />
                                    <p><?php echo htmlentities($Net_Area); ?></p>
                                </div>
                                <div class="col-md-2 col-xs-6 b-r ribbon-vwrapper card">
                                    <div class="ribbon ribbon-primary ribbon-vertical-l"><i class="fa fa-check-circle"></i></div>
                                    <strong><span class="label label-primary">Load_Ratio</span></strong>
                                    <br />
                                    <p><?php echo htmlentities($Load_Ratio); ?></p>
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

<?php

if($unitsAttachementFileCount>0) {
for ($i=0; $i < $unitsAttachementFileCount ; $i++) { 
    echo "
    <div class='col-md-6'>
    <a class='image-popup-vertical-fit' href='uploads/".$attachement_files["FileLocation"][$i]."' title='Caption. Can be aligned to any side and contain any HTML.'>
        <img src='uploads/".$attachement_files["FileLocation"][$i]."' alt='image' class='img-responsive' />
    </a>
    <h3 class='m-t-10'>".$attachement_files["FileName"][$i]."</h3>
    <a onclick=window.location.href='uploads/download.php?download_file=".$attachement_files["FileLocation"][$i]."' class='btn btn-success'><i class='mdi mdi-cloud-download'></i> Download</a>
    </div>
    ";
}
}else{
    echo"<h4> NO Attachment Files Found </h4>";
}


?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
