<?php
///////////////////////////////////////////////////////////////
/// start of ---> delete Units if requested 
///////////////////////////////////////////////////////////////
if (isset($_GET['deleteUnitId'])) {

    $deleteUnitId = $_GET['deleteUnitId'];
    $sql_delete_unit= "DELETE FROM `units` WHERE `Unit_ID`='".$deleteUnitId."'";
    $unit_delete= $database->query($sql_delete_unit); 

} 
// ///////////////////////////////////////////////////////////////
// /// End of ---> delete Units if requested 
// ///////////////////////////////////////////////////////////////

// ///////////////////////////////////////////////////////////////
// /// start of ---> getting Units details 
// ///////////////////////////////////////////////////////////////
 $sql_get_units="SELECT `u`.`Unit_ID`,
 `u`.`Unit_No`,
 `u`.`Build_No`,
 `u`.`Project_ID`,
 `P`.`Name`as`ProName`,
 `u`.`floor_id`,
 `f`.`Name`as`Floor_Name`,
 `u`.`Raw_ID`,
 `r`.`Type`as`R_Type`,
 `u`.`Pos_ID`,
 `up`.`Name`as`Pos_Name`,
 `u`.`Unit_Area`,
 `bp`.`Basic Meter Price`as`Basic_Meter_Price`,
 `u`.`Unit_Basic_Price`,
 `u`.`Roof_Area`,
 `u`.`Garden_Area`,
 `u`.`Open_terrace_Area`,
 `u`.`Usufruct_type`,
 `usup`.`Usufruct Meter Price`as`Usufruct_Meter_Price`,
 `Usufruct_Price`,
 `Net_Area`,
 `Load_Ratio`,
 `u`.`Status_ID`,
 `unit status`.`Name`as`status_Name`,
 `unit status`.`colour`,
 `u`.`added_by`,
 `u`.`Creation_Date`,
 `u`.`last_update_on`,
 `u`.`maintenance_pct`,
 `u`.`finishing_level`,
 `fi`.`Level`,
 `u`.`Rooms_Desc`,
 `Ro`.`Count`as`Rooms_Count`,
 `ro`.`Description`as`Rooms_Description`,
 `u`.`has_activity`,
 `u`.`activity_id`
 From Units u 
 LEFT JOIN `projects` `p`
 on u.Project_ID = p.ID
 LEFT JOIN `floor` f
 on u.floor_id = f.ID
 LEFT JOIN `raw type` `r`
 on u.Raw_ID = r.ID
 left join `unit position` `up`
 on u.Pos_ID = up.ID
 left join `basic prices` `bp`
 on u.Basic_Meter_Price = bp.ID
 LEFT JOIN `usufruct prices` usup
 on u.usufruct_meter_price = usup.ID
 LEFT JOIN  `unit status`
 on u.Status_ID = `unit status`.ID
 LEFT JOIN `finishing level` fi
 on u.finishing_level = fi.ID
 LEFT JOIN rooms ro
 on u.Rooms_Desc = ro.ID";
 $units_all= $database->query($sql_get_units);

 $unitsCount = $units_all->num_rows;

    // output data of each row
    while($row = $units_all->fetch_assoc()) {
        $Unit_ID [] = $row["Unit_ID"];
        $Unit_No[] = $row["Unit_No"];
        $Build_No[] = $row["Build_No"];
        $Project_ID [] = $row["Project_ID"];
        $ProName[] = $row["ProName"];
        $floor_id [] = $row["floor_id"];
        $Floor_Name[] = $row["Floor_Name"];
        $Raw_ID [] = $row["Raw_ID"];
        $R_Type[] = $row["R_Type"];
        $Pos_ID [] = $row["Pos_ID"];
        $Pos_Name[] = $row["Pos_Name"];
        $Unit_Area[] = $row["Unit_Area"];
        $Basic_Meter_Price [] = $row["Basic_Meter_Price"];
        $Basic_Meter_Price[] = $row["Basic_Meter_Price"];
        $Unit_Basic_Price[] = $row["Unit_Basic_Price"];
        $Roof_Area[] = $row["Roof_Area"];
        $Garden_Area[] = $row["Garden_Area"];
        $Open_terrace_Area[] = $row["Open_terrace_Area"];
        $Usufruct_type [] = $row["Usufruct_type"];
        $usufruct_meter_price [] = $row["usufruct_meter_price"];
        $Usufruct_Meter_Price[] = $row["Usufruct_Meter_Price"];
        $Usufruct_Price[] = $row["Usufruct_Price"];
        $Net_Area[] = $row["Net_Area"];
        $Load_Ratio[] = $row["Load_Ratio"];
        $Status_ID [] = $row["Status_ID"];
        $status_Name[] = $row["status_Name"];
        $colour[] = $row["colour"];
        $added_by[] = $row["added_by"];
        $Creation_Date[] = $row["Creation_Date"];
        $last_update_on[] = $row["last_update_on"];
        $maintenance_pct[] = $row["maintenance_pct"];
        $finishing_level [] = $row["finishing_level"];
        $Level[] = $row["Level"];
        $Rooms_Desc [] = $row["Rooms_Desc"];
        $Rooms_Count[] = $row["Rooms_Count"];
        $Rooms_Description[] = $row["Rooms_Description"];
        $has_activity[] = $row["has_activity"];
        $activity_id [] = $row["activity_id"];    
           }
        

  $units= array("Unit_ID"=>$Unit_ID, "Build_No"=>$Build_No, "Unit_No"=>$Unit_No, "Floor_Name"=>$Floor_Name,
   "ProName"=>$ProName, "Project_ID"=>$Project_ID, "status_Name"=>$status_Name, "colour"=>$colour);

// ///////////////////////////////////////////////////////////////
// /// End of ---> getting Units details 
// ///////////////////////////////////////////////////////////////

?>


<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Unites</a></li>
                <li class="breadcrumb-item active">All Unites</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Unites&create=true'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
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
                                    <th>Project</th>
                                    <th>Build NO</th>
                                    <th>Unit NO</th>
                                    <th>Floor</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Project</th>
                                    <th>Build NO</th>
                                    <th>Unit NO</th>
                                    <th>Floor</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
/////////////////////////////////////////////////////////////
// Start of ------> Get All Projects  in html table
/////////////////////////////////////////////////////////////
for ($i=0; $i < $unitsCount; $i++) { 
    echo " <tr><th>".$units["Unit_ID"][$i]."</th>";
    echo "<td><a href='index?module=Projects&ProjectId=".$units["Project_ID"][$i]."'>".$units["ProName"][$i]."</a></td>";
    echo "<td>".$units["Build_No"][$i]."</td>";
    echo "<td>".$units["Unit_No"][$i]."</td>";
    echo "<td>".$units["Floor_Name"][$i]."</td>";
    if ($units["status_Name"][$i]=="On Sale") {
        echo "<td class='On Sale' style='background-color: rgb(".$units["colour"][$i].");'><i class='fa fa-spin fa-spinner'></i>".$units["status_Name"][$i]."</td>";
    } elseif($units["status_Name"][$i]=="Hold") {
        echo "<td style='background-color: rgb(".$units["colour"][$i].");'>".$units["status_Name"][$i]."<div class='progress'>
        <div class='progress-bar bg-success' role='progressbar' style='width: 80%; height: 6px;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
    </div></td>";
    } elseif($units["status_Name"][$i]=="Closed") {
        echo "<td style='background-color: rgb(".$units["colour"][$i]."); color: #FFF;'>".$units["status_Name"][$i]."</td>";
    } elseif($units["status_Name"][$i]!="On_Sale") {
        echo "<td style='background-color: rgb(".$units["colour"][$i].");'>".$units["status_Name"][$i]."</td>";
    }
    echo "<td>
    <a href='index?module=Unites&EditeunitId=".$units["Unit_ID"][$i]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Unites&unitId=".$units["Unit_ID"][$i]."' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye'></i> </a>
    <a href='index?module=Unites&deleteUnitId=".$units["Unit_ID"][$i]."' data-toggle='tooltip' data-original-title='delete'> <i class='fa fa-trash'></i></a></td> </tr>";
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
