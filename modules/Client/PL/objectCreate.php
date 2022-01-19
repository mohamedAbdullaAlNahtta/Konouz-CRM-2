<?php

///////////////////////////////////////////////////////////////
/// start of ---> getting Object details
///////////////////////////////////////////////////////////////
$tableName = $_GET['tableName'];
// $_SESSION['tableName'] = $tableName;
// $tableName =$_SESSION['tableName'];


///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////


if (isset($_POST['submit'])) {

    $First_Name_create = $_POST['First_Name_create'];
    $Middle_Name_create = $_POST['Middle_Name_create'];
    $Last_Name_create = $_POST['Last_Name_create'];
    $ch_id_create = $_POST['ch_id_create'];
    $Mobile1_create = $_POST['Mobile1_create'];
    $Mobile2_create = $_POST['Mobile2_create'];
    $email_create = $_POST['email_create'];
    $National_ID_create = $_POST['National_ID_create'];
    $National_ID_Issue_Date_create = $_POST['National_ID_Issue_Date_create'];
    $National_ID_Valid_To_create = $_POST['National_ID_Valid_To_create'];
    $nationality_create = $_POST['nationality_create'];
    $Job_Title_create = $_POST['Job_Title_create'];
    $Employer_create = $_POST['Employer_create'];
    $Building_No_create = $_POST['Building_No_create'];
    $street_create = $_POST['street_create'];
    $zone_create = $_POST['zone_create'];
    $governorate_create = $_POST['governorate_create'];
    
    // escaping variables
    $First_Name_create = $database->escape_string($First_Name_create);
    $Middle_Name_create = $database->escape_string($Middle_Name_create);
    $Last_Name_create = $database->escape_string($Last_Name_create);
    $ch_id_create = $database->escape_string($ch_id_create);
    $Mobile1_create = $database->escape_string($Mobile1_create);
    $Mobile2_create = $database->escape_string($Mobile2_create);
    $email_create = $database->escape_string($email_create);
    $National_ID_create = $database->escape_string($National_ID_create);
    $National_ID_Issue_Date_create = $database->escape_string($National_ID_Issue_Date_create);
    $National_ID_Valid_To_create = $database->escape_string($National_ID_Valid_To_create);
    $nationality_create = $database->escape_string($nationality_create);
    $Job_Title_create = $database->escape_string($Job_Title_create);
    $Employer_create = $database->escape_string($Employer_create);
    $Building_No_create = $database->escape_string($Building_No_create);
    $street_create = $database->escape_string($street_create);
    $zone_create = $database->escape_string($zone_create);
    $governorate_create = $database->escape_string($governorate_create);

    // casting dates for my sql 
    $National_ID_Issue_Date_create   = explode("/",$National_ID_Issue_Date_create);
    $National_ID_Issue_Date_create    = $National_ID_Issue_Date_create[2]."-".$National_ID_Issue_Date_create[0]."-".$National_ID_Issue_Date_create[1];
    $National_ID_Issue_Date_create= strval($National_ID_Issue_Date_create);

    $National_ID_Valid_To_create   = explode("/",$National_ID_Valid_To_create);
    $National_ID_Valid_To_create    = $National_ID_Valid_To_create[2]."-".$National_ID_Valid_To_create[0]."-".$National_ID_Valid_To_create[1];
    $National_ID_Valid_To_create= strval($National_ID_Valid_To_create);



    $sql= "INSERT INTO `clients` (`ID`, `First Name`, `National ID`, `Mobile1`, `Email`, `Middle Name`,
     `Last Name`, `ch_id`, `nationality`, `Job Title`, `Employer`, `National ID Issue Date`,
      `National ID Valid To`, `Building No`, `street`, `zone`, `governorate`, `Mobile 2`)
       VALUES (NULL, '".$First_Name_create."', '".$National_ID_create."', '".$Mobile1_create."', '".$email_create."', '".$Middle_Name_create."',
        '".$Last_Name_create."',NULL, '".$nationality_create."', '".$Job_Title_create."', '".$Employer_create."', '".$National_ID_Issue_Date_create."',
         '".$National_ID_Valid_To_create."', '".$Building_No_create."', '".$street_create."', '".$zone_create."', '".$governorate_create."', '".$Mobile2_create."');";
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
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo htmlentities($tableName); ?> Configuration</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"> </a></li>
                <li class="breadcrumb-item active">New Client</li>
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
                    <h4 class="m-b-0 text-white">New Client</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Client&tableName=<?php echo $tableName; ?>&objectCreate=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title"> <i class="mdi mdi-account-plus"></i> Client Information </h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> First Name</label>
                                        <input type="text"   name="First_Name_create" class="form-control" required/>
                                        <small class="form-control-feedback"> Example Jhone....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Middle  Name</label>
                                        <input type="text"   name="Middle_Name_create" class="form-control" required/>
                                        <small class="form-control-feedback"> Example Adam....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Last Name</label>
                                        <input type="text"   name="Last_Name_create" class="form-control" required/>
                                        <small class="form-control-feedback"> Example smith....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> <i class="mdi mdi-facebook-box"></i> <i class="mdi mdi-facebook-messenger"></i> <i class="mdi mdi-instagram"></i> <i class="mdi mdi-twitter"></i> <i class="mdi mdi-deskphone"></i> Source Channel</label>
                                        <input type="text" placeholder="Facebook Lead" name="ch_id_create" class="form-control" disabled/>
                                        <small class="form-control-feedback"> Example Facebook Lead....</small>
                                    </div>
                                </div>
                            </div>
                                <h3 class="box-title m-t-40">Contact Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> <i class="mdi mdi-cellphone-basic"></i> 1st Mobile Number </label>
                                        <input type="number"  name="Mobile1_create" class="form-control" required/>
                                        <small class="form-control-feedback"> Example 01093002345....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> <i class="mdi mdi-cellphone-basic"></i> 2nd Mobile Number </label>
                                        <input type="number" placeholder="01132332856"  name="Mobile2_create" class="form-control" />
                                        <small class="form-control-feedback"> Example 01132332856....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><i class="mdi mdi-email"></i> Email</label>
                                        <input type="text"   name="email_create" class="form-control" />
                                        <small class="form-control-feedback"> Example smith@yahoo.com....</small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><i class="mdi mdi-account-card-details"></i> National ID</label>
                                        <input type="text"   name="National_ID_create" class="form-control" required/>
                                        <small class="form-control-feedback">Must be 14 Digits Example 28767....etc</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> National ID Issue Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy"  name="National_ID_Issue_Date_create" required/>
                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                            </div>
                                        <small class="form-control-feedback"> mm/dd/yyyy example: 3/22/2022..</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> National ID Valid To</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy"  name="National_ID_Valid_To_create" required/>
                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                            </div>
                                        <small class="form-control-feedback"> mm/dd/yyyy example: 3/22/2022..</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><i class="flag-icon flag-icon-eg" title="eg" id="eg"></i> Nationality</label>
                                        <input type="text"   name="nationality_create" class="form-control" />
                                        <small class="form-control-feedback"> Example Egyption....</small>
                                    </div>
                                </div>
                            </div>
                            <h3 class="box-title m-t-40">Job Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><i class="mdi mdi-worker"></i> Job Title</label>
                                        <input type="text"   name="Job_Title_create" class="form-control" />
                                        <small class="form-control-feedback"> Example Manager....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Employer Name</label>
                                        <input type="text"   name="Employer_create" class="form-control" />
                                        <small class="form-control-feedback"> Example Ezz Steel....</small>
                                    </div>
                                </div>

                            </div>
                            <h3 class="box-title m-t-40">Address Info</h3>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Building No</label>
                                        <input type="number"  name="Building_No_create" class="form-control" />
                                        <small class="form-control-feedback"> Example 34....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Street Name</label>
                                        <input type="text"   name="street_create" class="form-control" />
                                        <small class="form-control-feedback"> Example saad zaghlol street....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Zone </label>
                                        <input type="text"   name="zone_create" class="form-control" />
                                        <small class="form-control-feedback">....</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> Governorate </label>
                                        <select id="Location" name="governorate_create" class="form-control form-control-line" required>
                                            <option value="">Select Governorate</option>
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
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button"  onclick="location.href='index?module=Client&tableName=<?php echo $tableName; ?>&objecthome=true'" class="btn btn-inverse">Cancel</button>
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
