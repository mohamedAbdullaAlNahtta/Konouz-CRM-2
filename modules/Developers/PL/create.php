<?php
///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    $DeveloperName = $_POST['DeveloperName'];
    $DeveloperRepresentative = $_POST['DeveloperRepresentative'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    
    // escaping variables
    $DeveloperName = $database->escape_string($DeveloperName);
    $DeveloperRepresentative = $database->escape_string($DeveloperRepresentative);
    $mobile1 = $database->escape_string($mobile1);
    $mobile2 = $database->escape_string($mobile2);

    $sql= "INSERT INTO `developers` (`ID`, `Name`, `Rep`, `Mobile1`, `Insertion Date`, `Added By`, `Mobile2`) VALUES (NULL, '".$DeveloperName."', '".$DeveloperRepresentative."', '".$mobile1."', current_timestamp(), '', '".$mobile2."')";
    $developer_dml= $database->query($sql); 

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
            <h3 class="text-themecolor m-b-0 m-t-0">Developers</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">New Developer</li>
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
                    <h4 class="m-b-0 text-white">New Developer</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=Developers&create=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title">Developre Info</h3>

                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Developer Name</label>
                                        <input type="text" id="DeveloperName" name="DeveloperName" class="form-control" placeholder="" required/>
                                        <small class="form-control-feedback">Dev Name.... </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Developer Representative</label>
                                        <input type="text" id="DeveloperRepresentative" name="DeveloperRepresentative" class="form-control" placeholder="" required/>
                                        <small class="form-control-feedback">Rep Name....</small>
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

                            <!--/row-->
                            <h3 class="box-title m-t-40">Contact Info</h3>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>1st Mobile Number</label>
                                        <input type="number" name="mobile1" class="form-control" required/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>2nd Mobile Number</label>
                                        <input type="number" name="mobile2" class="form-control" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
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
