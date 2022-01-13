<?php

///////////////////////////////////////////////////////////////
/// start of ---> getting Object details
///////////////////////////////////////////////////////////////
$objectEditeId = $_GET['objectEditeId'];
$tableName = $_GET['tableName'];


// getting table data
$sql_get_table_data = "SELECT `First Name`,
 `National ID`,
 `Mobile1`, 
 `Email`,
 `Middle Name`,
 `Last Name`,
 `ch_id`,
 `nationality`,
 `Job Title`, 
 `Employer`, 
 `National ID Issue Date`, 
 `National ID Valid To`, 
 `Building No`, 
 `street`, 
 `zone`, 
 `governorate`, 
 `Mobile 2`  
 FROM `clients` WHERE `ID`={$objectEditeId}";

$get_table_data = $database->query($sql_get_table_data);
$clientRowCount = $get_table_data->num_rows;

while($row = $get_table_data->fetch_assoc()) {
    $First_Name = $row["First Name"];
    $Middle_Name = $row["Middle Name"];
    $Last_Name = $row["Last Name"];
    $ch_id = $row["ch_id"];
    $Mobile1 = $row["Mobile1"];
    $Mobile2 = $row["Mobile 2"];
    $Email = $row["Email"];
    $National_ID = $row["National ID"];
    $National_ID_Issue_Date = $row["National ID Issue Date"];
    $National_ID_Valid_To = $row["National ID Valid To"];
    $nationality = $row["nationality"];
    $Job_Title = $row["Job Title"];
    $Employer = $row["Employer"];
    $Building_No = $row["Building No"];
    $street = $row["street"];
    $zone = $row["zone"];
    $governorate = $row["governorate"];
  }

$National_ID_Issue_Date   = explode("-",$National_ID_Issue_Date);
$National_ID_Issue_Date    = $National_ID_Issue_Date[2]."/".$National_ID_Issue_Date[0]."/".$National_ID_Issue_Date[1];
$National_ID_Issue_Date= strval($National_ID_Issue_Date);

$National_ID_Valid_To   = explode("-",$National_ID_Valid_To);
$National_ID_Valid_To    = $National_ID_Valid_To[2]."/".$National_ID_Valid_To[0]."/".$National_ID_Valid_To[1];
$National_ID_Valid_To= strval($National_ID_Valid_To);

// $clientdata = array("First_Name"=>$First_Name, 
// "Middle_Name"=>$Middle_Name, 
// "Last_Name"=>$Last_Name, 
// "ch_id"=>$ch_id, 
// "Mobile1"=>$Mobile1, 
// "Mobile2"=>$Mobile2, 
// "Email"=>$Email, 
// "National_ID"=>$National_ID, 
// "National_ID_Issue_Date"=>$National_ID_Issue_Date, 
// "National_ID_Valid_To"=>$National_ID_Valid_To, 
// "nationality"=>$nationality, 
// "Job_Title"=>$Job_Title, 
// "Employer"=>$Employer,
// "Building_No"=>$Building_No, 
// "streets"=>$streets, 
// "zone"=>$zone, 
// "governorate"=>$governorate, 
// "DevID"=>$DevID, );



///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////

$National_ID_Issue_Date_create   = explode("/",$National_ID_Issue_Date_create);
$National_ID_Issue_Date_create    = $National_ID_Issue_Date_create[2]."-".$National_ID_Issue_Date_create[0]."-".$National_ID_Issue_Date_create[1];
$National_ID_Issue_Date_create= strval($National_ID_Issue_Date_create);

$National_ID_Valid_To_create   = explode("/",$National_ID_Valid_To_create);
$National_ID_Valid_To_create    = $National_ID_Valid_To_create[2]."-".$National_ID_Valid_To_create[0]."-".$National_ID_Valid_To_create[1];
$National_ID_Valid_To_create= strval($National_ID_Valid_To_create);


//php Creating a dynamic  query with PHP and MySQL


if (isset($_POST['submit'])) {

    for ($i=1; $i < $col_count; $i++) { 
        $columnsNew[$i] = $_POST[$columns[$i]."_edite"];
        $columnsNew[$i] = $database->escape_string($columnsNew[$i]);
    }

    $setValues = array(); 
    for ($i=1; $i < $col_count; $i++) { 
        $setValues[] = "`".$columns[$i]."`='".$columnsNew[$i]."'";
    }
    $setValues = "SET " . implode(", ", $setValues);


    $sql= "UPDATE `{$tableName}` {$setValues}  WHERE {$columns[0]}={$objectEditeId}";
    $object_dml= $database->query($sql); 

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
            <h3 class="text-themecolor m-b-0 m-t-0">Client Configuration</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                <li class="breadcrumb-item active">Edite Client</li>
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
            <button onclick="location.href='index?module=Client&tableName=<?php echo $tableName?>&objecthome=true'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edite Client</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Client&tableName=<?php echo $tableName; ?>&objectEditeId=<?php echo $objectEditeId; ?>" method="post">
                        <div class="form-body">
                            <h3 class="card-title"> Client Info </h3>

                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> First Name</label>
                                        <input type="text"  name="First_Name_edite" value="<?php echo htmlentities($First_Name)?>" placeholder="<?php echo htmlentities($First_Name)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example Jhone....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Middle  Name</label>
                                        <input type="text" name="Middle_Name_edite" value="<?php echo htmlentities($Middle_Name)?>" placeholder="<?php echo htmlentities($Middle_Name)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example Adam....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Last Name</label>
                                        <input type="text" name="Last_Name_edite" value="<?php echo htmlentities($Last_Name)?>" placeholder="<?php echo htmlentities($Last_Name)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example smith....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Source Channel</label>
                                        <input type="text" name="ch_id_edite" value="<?php echo htmlentities($ch_id)?>" placeholder="<?php echo htmlentities($ch_id)?>" class="form-control" disabled/>
                                        <small class="form-control-feedback"> Example Facebook Lead....</small>
                                    </div>
                                </div>
                            </div>
                                <h3 class="box-title m-t-40">Contact Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> 1st Mobile Number</label>
                                        <input type="number" name="Mobile1_edite" value="<?php echo htmlentities($Mobile1)?>" placeholder="<?php echo htmlentities($Mobile1)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example 01093002345....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> 2nd Mobile Number</label>
                                        <input type="number"  name="Mobile2_edite" value="<?php echo htmlentities($Mobile2)?>" placeholder="<?php echo htmlentities($Mobile2)?> "class="form-control" />
                                        <small class="form-control-feedback"> Example 01132332856....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Email</label>
                                        <input type="text" name="Email_edite" value="<?php echo htmlentities($Email)?>" placeholder="<?php echo htmlentities($Email)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example smith@yahoo.com....</small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> National ID</label>
                                        <input type="text" name="National_ID_edite" value="<?php echo htmlentities($National_ID)?>" placeholder="<?php echo htmlentities($National_ID)?>" class="form-control" />
                                        <small class="form-control-feedback">Must be 14 Digits Example 28767....etc</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> National ID Issue Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker"  name="National_ID_Issue_Date_edite" value="<?php echo htmlentities($National_ID_Issue_Date)?>" placeholder="<?php echo htmlentities($National_ID_Issue_Date)?>" />
                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                            </div>
                                        <small class="form-control-feedback"> mm/dd/yyyy example: 3/22/2022..</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> National ID Valid To</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" name="National_ID_Valid_To_edite" value="<?php echo htmlentities($National_ID_Valid_To)?>" placeholder="<?php echo htmlentities($National_ID_Valid_To)?>"  />
                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                            </div>
                                        <small class="form-control-feedback"> mm/dd/yyyy example: 3/22/2022..</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Nationality</label>
                                        <input type="text" name="nationality_edite" value="<?php echo htmlentities($nationality)?>" placeholder="<?php echo htmlentities($nationality)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example Egyption....</small>
                                    </div>
                                </div>
                            </div>
                            <h3 class="box-title m-t-40">Job Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Job Title</label>
                                        <input type="text"  name="Job_Title_edite" value="<?php echo htmlentities($Job_Title)?>" placeholder="<?php echo htmlentities($Job_Title)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example Manager....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Employer Name</label>
                                        <input type="text" name="Employer_edite" value="<?php echo htmlentities($Employer)?>" placeholder="<?php echo htmlentities($Employer)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example Ezz Steel....</small>
                                    </div>
                                </div>

                            </div>
                            <h3 class="box-title m-t-40">Address Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Building No</label>
                                        <input type="number"  name="Building_No_edite" value="<?php echo htmlentities($Building_No)?>" placeholder="<?php echo htmlentities($Building_No)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example 34....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Street Name</label>
                                        <input type="text"  name="street_edite" value="<?php echo htmlentities($street)?>" placeholder="<?php echo htmlentities($street)?>" class="form-control" />
                                        <small class="form-control-feedback"> Example saad zaghlol street....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Zone </label>
                                        <input type="text"name="zone_edite" value="<?php echo htmlentities($zone)?>" placeholder="<?php echo htmlentities($zone)?>" class="form-control" />
                                        <small class="form-control-feedback">....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Governorate </label>
                                        <select id="Location" name="governorate_edite" class="form-control form-control-line" required>
                                            <option value="<?php echo htmlentities($governorate)?>"><?php echo htmlentities($governorate)?></option>
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
                                        <small class="form-control-feedback">Example Cairo....</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit"  class="btn btn-success"><i class="fa fa-check"></i> Save </button>
                            <button type="button" onclick="location.href='index?module=Client&tableName=<?php echo $tableName; ?>&objecthome=true'" class="btn btn-inverse">Cancel</button>
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
