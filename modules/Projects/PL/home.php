<?php

/////////////////////////////////////////////////////////////
// Start of ------> Delete Project  
/////////////////////////////////////////////////////////////
if (isset($_GET['deleteProjectId'])) {

    $deleteProjectId = $_GET['deleteProjectId'];

    $sql_delete_pro= "DELETE  FROM `projects` WHERE `ProID`='".$deleteProjectId."'";
    $project_delete= $database->query($sql_delete_pro); 
} 
/////////////////////////////////////////////////////////////
// End of ------> Delete Project 
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------> Get All Projects 
/////////////////////////////////////////////////////////////

 $sql= "SELECT `projects`.`ProID`, `projects`.`ProName`, `projects`.`Insertion_date`, `projects`.`Added_By`, `developers`.`DevName`, `projects`.`maintenance_pct`, `projects`.`location`, `projects`.`location_OnMap`, `projects`.`updated_on`, `projects`.`DevID` FROM `projects`, `developers` WHERE `projects`.`DevID` = `developers`.`DevID` ORDER BY `projects`.`ProID` DESC;";
 $Projects_all= $database->query($sql);

 $ProjectCount = $Projects_all->num_rows;
    // output data of each row
    while($row = $Projects_all->fetch_assoc()) {
      $ProID[] = $row["ProID"];
      $ProName[] = $row["ProName"];
      $Insertion_date[] = $row["Insertion_date"];
      $Added_By[] = $row["Added_By"];
      $DevName[] = $row["DevName"];
      $maintenance_pct[] = $row["maintenance_pct"] * 100;
      $location[] = $row["location"];
      $updated_on[] = $row["updated_on"];
      $DevID[] = $row["DevID"];
    }
  $Projects= array("ProID"=>$ProID, "ProName"=>$ProName, "Insertion_date"=>$Insertion_date,
   "Added_By"=>$Added_By, "DevName"=>$DevName, "maintenance_pct"=>$maintenance_pct, "location"=>$location, "updated_on"=>$updated_on, "DevID"=>$DevID );

/////////////////////////////////////////////////////////////
// End of ------> Get All Projects 
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
                <li class="breadcrumb-item active">All Projects</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Projects&create=true'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
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
                                    <th>Created by</th>
                                    <th>Maintenance % </th>
                                    <th>Location</th>
                                    <th>Last Update</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Developer Name</th>
                                    <th>Start date</th>
                                    <th>Created by</th>
                                    <th>Maintenance % </th>
                                    <th>Location</th>
                                    <th>Last Update</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
/////////////////////////////////////////////////////////////
// Start of ------> Get All Projects  in html table
/////////////////////////////////////////////////////////////
for ($i=0; $i < $ProjectCount; $i++) { 
    echo " <tr><th>".$Projects["ProID"][$i]."</th>";
    echo "<td>".$Projects["ProName"][$i]."</td>";
    echo "<td><a href='index?module=Developers&EditeDeveloperId=".$Projects["DevID"][$i]."'>".$Projects["DevName"][$i]."</a></td>";
    echo "<td>".$Projects["Insertion_date"][$i]."</td>";
    echo "<td>".$Projects["Added_By"][$i]."</td>";
    echo "<td>".$Projects["maintenance_pct"][$i]." % </td>";
    echo "<td>".$Projects["location"][$i]."</td>";
    echo "<td>".$Projects["updated_on"][$i]."</td>";
    echo "<td>
    <a href='index?module=Projects&EditeProjectId=".$Projects["ProID"][$i]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Projects&ProjectId=".$Projects["ProID"][$i]."' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye'></i> </a>
    <a href='index?module=Projects&deleteProjectId=".$Projects["ProID"][$i]."' data-toggle='tooltip' data-original-title='delete'> <i class='fa fa-trash'></i></a></td> </tr>";
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
