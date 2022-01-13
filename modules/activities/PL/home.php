<?php
///////////////////////////////////////////////////////////////
/// start of ---> delete developer if requested 
///////////////////////////////////////////////////////////////
// if (isset($_GET['deleteDeveloperId'])) {

//     $deleteactivityid = $_GET['deleteactivityid'];
//     $sql_delete_act= "DELETE  FROM `activites` WHERE `Activity_ID`='".$deleteactivityid."'";
//     $activity_delete= $database->query($sql_delete_dev); 

// } 
// ///////////////////////////////////////////////////////////////
// /// End of ---> delete developer if requested 
// ///////////////////////////////////////////////////////////////

// ///////////////////////////////////////////////////////////////
// /// start of ---> getting developer details 
// ///////////////////////////////////////////////////////////////
//  $sql= "SELECT `Activity_ID`, `Unit_ID`, `Seller_Account`, `CST_NID` FROM `activites` ORDER BY `ID` DESC";
//  $activities_all= $database->query($sql);

//  $activityCount = $activities_all->num_rows;

//     // output data of each row
//     while($row = $activities_all->fetch_assoc()) {
//       $Activity_ID[] = $row["Activity_ID"];
//       $Unit_ID[] = $row["Unit_ID"];
//       $Seller_Account[] = $row["Seller_Account"];
//       $CST_NID[] = $row["CST_NID"];
//     }


//   $activities= array("Activity_ID"=>$Activity_ID, "Activity_ID"=>$Activity_ID, "Seller_Account"=>$Seller_Account,
//    "CST_NID"=>$CST_NID);
///////////////////////////////////////////////////////////////
/// End of ---> getting developer details 
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
            <h3 class="text-themecolor m-b-0 m-t-0">Activities</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">All Activities</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Activities&create=true'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Developer Name</th>
                                    <th>Start date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Developer Name</th>
                                    <th>Start date</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kalama</td>
                                    <td>Elnasr</td>
                                    <td>2011/04/25</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>nader</td>
                                    <td>3amr group</td>
                                    <td>2011/04/25</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
