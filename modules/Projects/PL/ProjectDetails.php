<?php

/////////////////////////////////////////////////////////////
// Start of ------getting Project  details
/////////////////////////////////////////////////////////////
$ProjectId= $_GET["ProjectId"];

$sql= "SELECT `projects`.`ID`, `projects`.`Name`, `projects`.`Insertion date`, `projects`.`Added By`, `developers`.`Name` as `DEVNAME`, `projects`.`Maintenance Pct`, `projects`.`location`, `projects`.`Location On Map`, `projects`.`Updated On`, `projects`.`DevID` FROM `projects`, `developers` WHERE `projects`.`DevID` = `developers`.`ID` and `projects`.`ID`='".$ProjectId."'";
$Projects= $database->query($sql);
    // output data of each row
    while($row = $Projects->fetch_assoc()) {
        $ProID = $row["ProID"];
        $ProName = $row["ProName"];
        $Insertion_date = $row["Insertion_date"];
        $Added_By = $row["Added_By"];
        $DevName = $row["DevName"];
        $maintenance_pct = $row["maintenance_pct"]*100;
        $maintenance_pct= $maintenance_pct."%";
        $location = $row["location"];
        $updated_on = $row["updated_on"];
        $location_OnMap = $row["location_OnMap"]; 
      }
/////////////////////////////////////////////////////////////
// End of ------getting Project  details
/////////////////////////////////////////////////////////////

?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Projects</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">Project Details</li>
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
            <button onclick="location.href='index?module=Projects'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Project Info</h4>
                </div>
                <div class="card-block">
                    <div class="form-body">
                        <h3 class="card-title">Developre Info</h3>

                        <div class="row p-t-20">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Project Name</label>
                                    <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="<?php echo htmlentities($ProName); ?>" disabled="disabled" />
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Developer Name</label>
                                    <input type="text" id="DevelopertName" name="DeveloperName" class="form-control" placeholder="<?php echo htmlentities($DevName); ?>" disabled="disabled" />
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Maintenance Percentage</label>
                                    <input type="text" id="MaintenancePercentage" name="MaintenancePercentage" class="form-control" placeholder="<?php echo htmlentities($maintenance_pct); ?>" disabled="disabled" />
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" id="Location" name="Location" class="form-control" placeholder="<?php echo htmlentities($location); ?>" disabled="disabled" />
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->

                        <!--/row-->
                        <h3>Location on Map</h3>

                        <div class="row">
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Creation Date</label>
                                    <input type="text" id="DeveloperRepresentative" name="DeveloperRepresentative" class="form-control" placeholder="<?php echo htmlentities($Insertion_date); ?>" disabled="disapled"/>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Created BY</label>
                                    <input type="text" id="DCreatedBY" name="DCreatedBY" class="form-control" placeholder="<?php echo htmlentities($Added_By); ?>" disabled="disapled" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Last Update Date</label>
                                    <input type="text" id="LastUpdateDate" name="LastUpdateDate" class="form-control" placeholder="<?php echo htmlentities($updated_on); ?>" disabled="disapled" />
                                </div>
                            </div>
                            <!--/span-->
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Location On Map</label>
                                    <div class="map-box" style="border: 1px solid rgba(0,0,0,.15);">
                                        <iframe
                                            src="<?php echo htmlentities($location_OnMap); ?>"
                                            width="100%"
                                            height="200"
                                            frameborder="0"
                                            style="border: 0;"
                                            allowfullscreen
                                        ></iframe>
                                    </div>
                                    <small class="form-control-feedback">Location on map please copy embedded location on map and past it here.... </small>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
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
