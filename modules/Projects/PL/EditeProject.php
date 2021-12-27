<?php

/////////////////////////////////////////////////////////////
// Start of ------getting all developers names and ids 
/////////////////////////////////////////////////////////////
$sql_get_dev= "SELECT `DevID`, `DevName` FROM `developers`";
$developers_all_get= $database->query($sql_get_dev);

$developerNameCount = $developers_all_get->num_rows;
   // output data of each row
   while($row = $developers_all_get->fetch_assoc()) {
     $DevID[] = $row["DevID"];
     $DevName[] = $row["DevName"];
   }
 $developer_name= array("DevID"=>$DevID, "DevName"=>$DevName );

 //////////////////////////////////////////////////////////////
// End of ------ getting all developers names and ids 
///////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////
// Start of ------getting Project  details
/////////////////////////////////////////////////////////////
$EditeProjectId= $_GET["EditeProjectId"];

$sql= "SELECT `projects`.`ProID`, `projects`.`ProName`, `projects`.`Insertion_date`, `projects`.`Added_By`, `developers`.`DevName`, `projects`.`maintenance_pct`, `projects`.`location_OnMap`, `projects`.`location`, `projects`.`location_OnMap`, `projects`.`updated_on` FROM `projects`, `developers` WHERE `projects`.`DevID` = `developers`.`DevID`and `projects`.`ProID`='".$EditeProjectId."'";
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

///////////////////////////////////////////////////////////////
/// start of ---> Submitting form data 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {
    
    // getting for data
    $ProjectName = $_POST['ProjectName'];
    $DeveloperName = $_POST['DeveloperName'];
    $MaintenancePercentage = (int)$_POST['MaintenancePercentage'];
    $MaintenancePercentage = $_POST['MaintenancePercentage']/100;
    $Location_in = $_POST['Location'];
    $location_OnMap_in = $_POST['location_OnMap'];
    
    // escaping variables
    $ProjectName = $database->escape_string($ProjectName);
    $DeveloperName = $database->escape_string($DeveloperName);
    $Location_in = $database->escape_string($Location_in);
    $location_OnMap_in = $database->escape_string($location_OnMap_in);
   
    //php Creating a dynamic  query with PHP and MySQL
    // $setcolumn = array();
    // if ($ProjectName != "") 
    // $setcolumn[] = "`ProName`='{$ProjectName}' ";
    // if ($DeveloperName != "") 
    // $setcolumn[] = "`DevID`='{$DeveloperName}' ";
    // if ($MaintenancePercentage != "") 
    // $setcolumn[] = "`maintenance_pct`='{$MaintenancePercentage}' ";
    // if ($Location_in != "") 
    // $setcolumn[] = "`location`='{$Location_in}' ";
    // if ($location_OnMap_in != "") 
    // $setcolumn[] = "`location_OnMap`='{$location_OnMap}' ";
    
    // if ($setcolumn == null) {
    //     $setcolumn = "";
    // } else {
    //     $setcolumn = "SET " . implode(",", $setcolumn);
    // }

    // $sql_zz =  "UPDATE `projects`  {$setcolumn}   WHERE ProID=".$EditeProjectId."";


    $sql_zz =  "call UPDATE_pro ('".$EditeProjectId."','".$ProjectName."','".$DeveloperName."',".$MaintenancePercentage.",'".$Location_in."','".$location_OnMap_in."')";
    $Project_edit= $database->query($sql_zz); 

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
            <h3 class="text-themecolor m-b-0 m-t-0">Projects</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">Edite Project</li>
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
                    <h4 class="m-b-0 text-white">New Developer</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Projects&EditeProjectId=<?php echo htmlentities($EditeProjectId);?>" method="post">
                        <div class="form-body">
                            <h3 class="card-title">Developre Info</h3>

                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Project Name</label>
                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="<?php echo htmlentities($ProName); ?>" />
                                        <small class="form-control-feedback">Pro Name.... </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Developer Name</label>
                                        <select id="myselect" name="DeveloperName" class="form-control form-control-line">
                                            <option><?php echo htmlentities($DevName); ?></option>
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
                                        <label class="control-label">Maintenance Percentage</label>
                                        <input type="number" name="MaintenancePercentage" class="form-control" placeholder="<?php echo htmlentities($maintenance_pct);?>" />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select id="myselect" name="Location" class="form-control form-control-line">
                                            <option value="<?php echo htmlentities($location);?>"><?php echo htmlentities($location);?> </option>
                                            <option value="Giza"> Giza </option>
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
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <h3>Location Info</h3>

                            <div class="row">
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Location On Map</label>
                                        <div class="map-box" style="border: 1px solid rgba(0, 0, 0, 0.15);">
                                            <iframe
                                                src="<?php echo htmlentities($location_OnMap);?>"
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Location On Map</label>
                                        <input name="location_OnMap" type="text" class="form-control" />
                                        <small class="form-control-feedback">Location on map please copy embedded location on map and past it here.... </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Creation Date</label>
                                        <input type="text" id="Insertion_date" name="Insertion_date" class="form-control" placeholder="<?php echo htmlentities($Insertion_date);?>" disabled="disapled"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Created BY</label>
                                        <input type="text" id="Added_By" name="Added_By" class="form-control" placeholder="<?php echo htmlentities($Added_By);?>" disabled="disapled" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Save </button>
                            <button type="button" onclick="location.href='index?module=Developers'" class="btn btn-inverse">Cancel</button>
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
