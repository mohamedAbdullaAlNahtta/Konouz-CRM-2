<?php
///////////////////////////////////////////////////////////////
/// start of ---> delete developer if requested 
///////////////////////////////////////////////////////////////
if (isset($_GET['deleteDeveloperId'])) {

    $deleteDeveloperId = $_GET['deleteDeveloperId'];
    $sql_delete_dev= "DELETE  FROM `developers` WHERE `ID`='".$deleteDeveloperId."'";
    $developer_delete= $database->query($sql_delete_dev); 

} 
///////////////////////////////////////////////////////////////
/// End of ---> delete developer if requested 
///////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////
/// start of ---> getting developer details 
///////////////////////////////////////////////////////////////
 $sql= "SELECT `ID`, `Name`, `Rep`, `Mobile1`, `Insertion Date`, `Added By`, `Mobile2` FROM `developers` ORDER BY `ID` DESC";
 $developers_all= $database->query($sql);

 $developerCount = $developers_all->num_rows;

    // output data of each row
    while($row = $developers_all->fetch_assoc()) {
      $DevID[] = $row["ID"];
      $DevName[] = $row["Name"];
      $Rep[] = $row["Rep"];
      $Mobile1[] = $row["Mobile1"];
      $Insertion_date[] = $row["Insertion Date"];
      $Added_By[] = $row["Added By"];
      $Mobile2[] = $row["Mobile2"];
    }


  $developers= array("DevID"=>$DevID, "DevName"=>$DevName, "Rep"=>$Rep,
   "Mobile1"=>$Mobile1, "Insertion_date"=>$Insertion_date, "Added_By"=>$Added_By, "Mobile2"=>$Mobile2);
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
            <h3 class="text-themecolor m-b-0 m-t-0">Developers</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">All Developers</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Developers&create=true'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
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
                                    <th>Developer Name</th>
                                    <th>Developer Representative</th>
                                    <th>Creation Date</th>
                                    <th>Created BY</th>
                                    <th>Mobile</th>
                                    <th>Mobile 2</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Developer Name</th>
                                    <th>Developer Representative</th>
                                    <th>Creation Date</th>
                                    <th>Created BY</th>
                                    <th>Mobile</th>
                                    <th>Mobile 2</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
<?php

for ($i=0; $i < $developerCount ; $i++) { 
    # code.
    echo " <tr><th>".$developers["DevID"][$i]."</th>";
    echo "<td>".$developers["DevName"][$i]."</td>";
    echo "<td>".$developers["Rep"][$i]."</td>";
    echo "<td>".$developers["Insertion_date"][$i]."</td>";
    echo "<td>".$developers["Added_By"][$i]."</td>";
    echo "<td>".$developers["Mobile1"][$i]."</td>";
    echo "<td>".$developers["Mobile2"][$i]."</td>";
    echo "<td>
    <a href='index?module=Developers&EditeDeveloperId=".$developers["DevID"][$i]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Developers&DeveloperId=".$developers["DevID"][$i]."' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye'></i> </a>
    <a href='index?module=Developers&deleteDeveloperId=".$developers["DevID"][$i]."' data-toggle='tooltip' data-original-title='delete'> <i class='fa fa-trash'></i></a></td> </tr>";

}

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
