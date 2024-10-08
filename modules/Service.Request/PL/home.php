<?php

///////////////////////////////////////////////////////////////
/// End of ---> delete developer if requested 
///////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////
/// start of ---> getting developer details 
///////////////////////////////////////////////////////////////
 $sql= "SELECT `service request`.`ID`, 
 `service request`.`unit_ID`, 
 `service request`.`activity_ID`, 
 `service request`.`unit_status` as `unit_status_id`, 
 `unit status`.`Name` as `unit_status_name`, 
 `service request`.`unit_status_reason`, 
 `service request`.`Hold_Can_Work_On`, 
 `service request`.`Held_For`,
 `service request`.`ticket_status` as `ticket_status_id`,
 `approval status`.`Status` as `ticket_status_name` , 
 `service request`.`ticket_feedback`,
 `service request`.`created_by`,
 `service request`.`creation_date`,
 `service request`.`Handled_by`,
 `service request`.`Last_update_date`
  FROM `service request`
  LEFT JOIN `approval status` ON `service request`.`ticket_status`= `approval status`.`ID`
  LEFT JOIN `unit status` ON `service request`.`unit_status`= `unit status`.`ID`
   ORDER BY `ID` DESC";
 $service_request_all= $database->query($sql);

 $service_requestCount = $service_request_all->num_rows;

    // output data of each row
    while($row = $service_request_all->fetch_assoc()) {
      $ID[] = $row["ID"];
      $unit_ID[] = $row["unit_ID"];
      $activity_ID[] = $row["activity_ID"];
      $unit_status_id[] = $row["unit_status_id"];
      $unit_status_name[] = $row["unit_status_name"];
      $unit_status_reason[] = $row["unit_status_reason"];
      $Hold_Can_Work_On[] = $row["Hold_Can_Work_On"];
      $Held_For[] = $row["Held_For"];
      $ticket_status_id[] = $row["ticket_status_id"];
      $ticket_status_name[] = $row["ticket_status_name"];
      $ticket_feedback[] = $row["ticket_feedback"];
      $created_by[] = $row["created_by"];
      $creation_date[] = $row["creation_date"];
      $Handled_by[] = $row["Handled_by"];
      $Last_update_date[] = $row["Last_update_date"];
    }


  $service_request= array("ID"=>$ID, "unit_ID"=>$unit_ID, "activity_ID"=>$activity_ID,
   "unit_status_id"=>$unit_status_id, "unit_status_name"=>$unit_status_name, "unit_status_reason"=>$unit_status_reason, "Hold_Can_Work_On"=>$Hold_Can_Work_On, "Held_For"=>$Held_For,
   "ticket_status_id"=>$ticket_status_id, "ticket_status_name"=>$ticket_status_name, "ticket_feedback"=>$ticket_feedback, "created_by"=>$created_by,
   "creation_date"=>$creation_date, "Handled_by"=>$Handled_by, "Last_update_date"=>$Last_update_date
   );
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
            <h3 class="text-themecolor m-b-0 m-t-0">Units Requests</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory Unit Request</a></li>
                <li class="breadcrumb-item active">All Units Tickets</li>
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
                                    <th>Unit ID</th>
                                    <th>Requested Unit Status</th>
                                    <th>Activity ID</th>
                                    <th>Created BY</th>
                                    <th>Handled By</th>
                                    <th>Creation Date</th>
                                    <th>Ticket Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Unit ID</th>
                                    <th>Requested Unit Status</th>
                                    <th>Activity ID</th>
                                    <th>Created BY</th>
                                    <th>Handled By</th>
                                    <th>Creation Date</th>
                                    <th>Ticket Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
<?php

for ($i=0; $i < $service_requestCount ; $i++) { 
    # code.
    echo " <tr><th>".$service_request["ID"][$i]."</th>";
    echo "<td><i><img src='assets/images/icons/favicon.ico' style='width: 30px;'> </i> <a href='index?module=Unites&unitId=".$service_request["unit_ID"][$i]."'> ".$service_request["unit_ID"][$i]."</a></td>";
    echo "<td>".$service_request["unit_status_name"][$i]."</td>";
    echo "<td>".$service_request["activity_ID"][$i]."</td>";
    echo "<td>".$service_request["created_by"][$i]."</td>";
    echo "<td>".$service_request["Handled_by"][$i]."</td>";
    echo "<td>".$service_request["creation_date"][$i]."</td>";
    if ($service_request["ticket_status_name"][$i]==="Approved") {
        echo "<td><span class='label label-success'>".$service_request["ticket_status_name"][$i]."</span></td>";
    } elseif ($service_request["ticket_status_name"][$i]==="Pending Approval") {
        echo "<td><span class='label label-warning'>".$service_request["ticket_status_name"][$i]."</span></td>";
    }elseif ($service_request["ticket_status_name"][$i]==="Rejected") {
        echo "<td><span class='badge badge-danger'>".$service_request["ticket_status_name"][$i]."</span></td>";
    }elseif ($service_request["ticket_status_name"][$i]==="Cancelled") {
        echo "<td><span class='label label-info' style='background-color:gray;'>".$service_request["ticket_status_name"][$i]."</span></td>";
    }
    
    echo "<td>
    <a href='index?module=Service.Request&EditeSRId=".$service_request["ID"][$i]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Service.Request&SRId=".$service_request["ID"][$i]."' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye'></i> </a></td> </tr>";

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
