<?php


///////////////////////////////////////////////////////////////
/// start of ---> getting Activity details 
///////////////////////////////////////////////////////////////
 $sql= "SELECT `a`.`Activity_ID`, `a`.`Unit_ID`, `a`.`CST_NID`, `a`.`Seller_Account`, `a`.`Creation_Date`, `a`.`created_by`, `a`.`Status_ID`,
 `as`.`Name` as `Activity_status`
 FROM `activites` `a`
 LEFT JOIN `activity status` `as`
 on `a`.`Status_ID` = `as`.`ID`";
 $activities_all= $database->query($sql);

 $activityCount = $activities_all->num_rows;

    // output data of each row
    while($row = $activities_all->fetch_assoc()) {
      $Activity_ID[] = $row["Activity_ID"];
      $Unit_ID[] = $row["Unit_ID"];
      $CST_NID[] = $row["CST_NID"];
      $Seller_Account[] = $row["Seller_Account"];
      $Creation_Date[] = $row["Creation_Date"];
      $created_by[] = $row["created_by"];
      $Activity_status[] = $row["Activity_status"];
    }


  $activities_data= array("Activity_ID"=>$Activity_ID, "Unit_ID"=>$Unit_ID, "CST_NID"=>$CST_NID,
   "Seller_Account"=>$Seller_Account,"Creation_Date"=>$Creation_Date, "created_by"=>$created_by, "Activity_status"=>$Activity_status );
///////////////////////////////////////////////////////////////
/// start of ---> getting Activity details 
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
<?php
/////////////////////////////////////////////////////////////
// Start of ------> Get All Projects  in html table
/////////////////////////////////////////////////////////////
for ($i=0; $i < $activityCount; $i++) { 
    echo " <tr><th>".$activities_data["Activity_ID"][$i]."</th>";
    echo "<td><a href='index?module=Projects&ProjectId=".$activities_data["Project_ID"][$i]."'>".$activities_data["ProName"][$i]."</a></td>";
    echo "<td>".$activities_data["Build_No"][$i]."</td>";
    echo "<td>".$activities_data["Unit_No"][$i]."</td>";
    echo "<td>".$activities_data["Floor_Name"][$i]."</td>";
    if ($activities_data["status_Name"][$i]=="On Sale") {
        echo "<td class='On Sale' style='background-color: rgb(".$activities_data["colour"][$i].");'><i class='fa fa-spin fa-spinner'></i>".$activities_data["status_Name"][$i]."</td>";
    } elseif($activities_data["status_Name"][$i]=="Hold") {
        echo "<td style='background-color: rgb(".$activities_data["colour"][$i].");'>".$activities_data["status_Name"][$i]."<div class='progress'>
        <div class='progress-bar bg-success' role='progressbar' style='width: 80%; height: 6px;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
    </div></td>";
    } elseif($activities_data["status_Name"][$i]=="Closed") {
        echo "<td style='background-color: rgb(".$activities_data["colour"][$i]."); color: #FFF;'>".$activities_data["status_Name"][$i]."</td>";
    } elseif($activities_data["status_Name"][$i]!="On_Sale") {
        echo "<td style='background-color: rgb(".$activities_data["colour"][$i].");'>".$activities_data["status_Name"][$i]."</td>";
    }
    echo "<td>
    <a href='index?module=Unites&EditeunitId=".$activities_data["Activity_ID"][$i]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Unites&unitId=".$activities_data["Activity_ID"][$i]."' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye'></i> </a>
    <a href='index?module=Unites&deleteUnitId=".$activities_data["Activity_ID"][$i]."' data-toggle='tooltip' data-original-title='delete'> <i class='fa fa-trash'></i></a></td> </tr>";
}
/////////////////////////////////////////////////////////////
// End of ------> Get All Projects  in html table
/////////////////////////////////////////////////////////////
?>
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
