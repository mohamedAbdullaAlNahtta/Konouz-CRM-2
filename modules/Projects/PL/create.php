<?php

/////////////////////////////////////////////////////////////
// Start of ------getting all developers names and ids 
/////////////////////////////////////////////////////////////
$sql_get_dev= "SELECT `ID`, `Name` FROM `developers`";
$developers_all_get= $database->query($sql_get_dev);

$developerNameCount = $developers_all_get->num_rows;
   // output data of each row
   while($row = $developers_all_get->fetch_assoc()) {
     $DevID[] = $row["ID"];
     $DevName[] = $row["Name"];
   }
 $developer_name= array("DevID"=>$DevID, "DevName"=>$DevName );

 //////////////////////////////////////////////////////////////
// End of ------ getting all developers names and ids 
///////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    $ProjectName = $_POST['ProjectName'];
    $DeveloperName = $_POST['DeveloperName'];
    $MaintenancePercentage = $_POST['MaintenancePercentage']/100;
    $Location = $_POST['Location'];
    $location_OnMap = $_POST['location_OnMap'];
    
    // escaping variables
    $ProjectName = $database->escape_string($ProjectName);
    $DeveloperName = $database->escape_string($DeveloperName);
    $MaintenancePercentage = $database->escape_string($MaintenancePercentage);
    $Location = $database->escape_string($Location);
    $location_OnMap = $database->escape_string($location_OnMap);

    $sql_pro_create= "INSERT INTO `projects` (`ID`, `Name`, `Insertion date`, `Added By`, `DevID`, `Maintenance Pct`, `Location`, `Location On Map`, `Updated On`) VALUES (NULL, '".$ProjectName."', current_timestamp(), '', '".$DeveloperName."', '".$MaintenancePercentage."', '".$Location."', '".$location_OnMap."', current_timestamp())";
    $project_dml= $database->query($sql_pro_create); 
} 

///////////////////////////////////////////////////////////////
/// End of ----> submitting form data to the database 
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
            <h3 class="text-themecolor m-b-0 m-t-0">Projects</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">New Project</li>
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
                    <h4 class="m-b-0 text-white">New Project</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Projects&create=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title">Project Info</h3>

                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Project Name</label>
                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                        <small class="form-control-feedback">Pro Name.... </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Developer Name</label>
                                        <select id="myselect" name="DeveloperName" class="form-control form-control-line" required>
                                            <option>Select Developer</option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> view all developers names 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $developerNameCount ; $i++) { 
    echo "<option value='".$developer_name["DevID"][$i]."' >".$developer_name["DevName"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> view all developers names 
///////////////////////////////////////////////////////////////
?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Maintenance Percentage %</label>
                                        <input type="number" name="MaintenancePercentage" class="form-control" placeholder="2%" required/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Comment</label>
                                        <input type="text" id="Comment" name="Comment" class="form-control" placeholder="comment....." disabled/>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <h3>Location Info</h3>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                            <option value="">Select Location</option>
                                            <option value="Alexandria"> Alexandria </option>
                                            <option value="Aswan"> Aswan </option>
                                            <option value="Asyut"> Asyut </option>
                                            <option value="Beheira"> Beheira </option>
                                            <option value="Beni Suef"> Beni Suef </option>
                                            <option value="Cairo"> Cairo </option>
                                            <option value="Dakahlia"> Dakahlia </option>
                                            <option value="Damietta"> Damietta </option>
                                            <option value="Faiyum"> Faiyum </option>
                                            <option value="Gharbia"> Gharbia </option>
                                            <option value="Giza"> Giza </option>
                                            <option value="Ismailia"> Ismailia </option>
                                            <option value="Kafr El Sheikh"> Kafr El Sheikh </option>
                                            <option value="Luxor"> Luxor </option>
                                            <option value="Matruh"> Matruh </option>
                                            <option value="Minya"> Minya </option>
                                            <option value="Monufia"> Monufia </option>
                                            <option value="New Valley"> New Valley </option>
                                            <option value="North Sinai"> North Sinai </option>
                                            <option value="Port Said"> Port Said </option>
                                            <option value="Qalyubia"> Qalyubia </option>
                                            <option value="Qena"> Qena </option>
                                            <option value="Red Sea"> Red Sea </option>
                                            <option value="Sharqia"> Sharqia </option>
                                            <option value="Sohag"> Sohag </option>
                                            <option value="South Sinai"> South Sinai </option>
                                            <option value="Suez"> Suez </option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Location On Map</label>
                                        <input type="text" class="form-control" name="location_OnMap" required/>
                                        <small class="form-control-feedback">Location on map please copy embedded location on map and past it here.... </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Creation Date</label>
                                        <input type="text" id="DeveloperRepresentative" name="DeveloperRepresentative" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" disabled="disapled"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Created BY</label>
                                        <input type="text" id="DeveloperRepresentative" name="DeveloperRepresentative" class="form-control" placeholder="<?php echo htmlentities("Administrator");?>" disabled="disapled" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button" onclick="location.href='index?module=Projects'" class="btn btn-inverse">Cancel</button>
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
