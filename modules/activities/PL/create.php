<?php
///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {

    $unit_id_new = $_POST['unit_id_new'];
    $CST_NID_new = $_POST['CST_NID_new'];
    $Seller_Account_new = $_POST['Seller_Account_new'];
    $Seller_Assistant_ID_new = $_POST['Seller_Assistant_ID_new'];
    $Sale_Type_ID_new = $_POST['Sale_Type_ID_new'];
    $Broker_ID_new = $_POST['Broker_ID_new'];
    $Signed_Contract_new = $_POST['Signed_Contract_new'];
    $Submitted_Cheques_new = $_POST['Submitted_Cheques_new'];
    $Filled_Claim_new = $_POST['Filled_Claim_new'];
    $Requested_Garage_new = $_POST['Requested_Garage_new'];
    $Garage_Price_new = $_POST['Garage_Price_new'];
    $Total_Price_After_Interest_new = $_POST['Total_Price_After_Interest_new'];
    $Refunded_new = $_POST['Refunded_new'];
    $Comment_new = $_POST['Comment_new'];
    $Installment_Years_new = $_POST['Installment_Years_new'];
    $Down_Payment_PCT_new = $_POST['Down_Payment_PCT_new'];
    $Receiving_Payment_PCT_new = $_POST['Receiving_Payment_PCT_new'];
    $Remaining_Amount_new = $_POST['Remaining_Amount_new'];
    $Down_Payment_Amount_new = $_POST['Down_Payment_Amount_new'];
    $Receiving_Payment_Amount_new = $_POST['Receiving_Payment_Amount_new'];
    $Annual_Payment_PCT_new = $_POST['Annual_Payment_PCT_new'];
    $Annual_Payment_Amount_new = $_POST['Annual_Payment_Amount_new'];
    $Annual_With_Rate_new = $_POST['Annual_With_Rate_new'];
    $Installment_Discount_PCT_new = $_POST['Installment_Discount_PCT_new'];
    $Other_Discount_PCT_new = $_POST['Other_Discount_PCT_new'];
    $Interest_PCT_new = $_POST['Interest_PCT_new'];
    $Interest_Amount_new = $_POST['Interest_Amount_new'];
    $Down_Payment_Amount_new = $_POST['Down_Payment_Amount_new'];
    $Receiving_Payment_Amount_new = $_POST['Receiving_Payment_Amount_new'];
    $Installment_Amount_new = $_POST['Installment_Amount_new'];
    $Meter_Price_After_Interest_new = $_POST['Meter_Price_After_Interest_new'];
    $Meter_Price_With_Discount_new = $_POST['Meter_Price_With_Discount_new'];
    $Payment_Type_ID_new = $_POST['Payment_Type_ID_new'];

    
    // escaping variables
    $unit_id_new = $database->escape_string($unit_id_new);
    $CST_NID_new = $database->escape_string($CST_NID_new);
    $Seller_Account_new = $database->escape_string($Seller_Account_new);
    $Seller_Assistant_ID_new = $database->escape_string($Seller_Assistant_ID_new);
    $Sale_Type_ID_new = $database->escape_string($Sale_Type_ID_new);
    $Broker_ID_new = $database->escape_string($Broker_ID_new);
    $Signed_Contract_new = $database->escape_string($Signed_Contract_new);
    $Submitted_Cheques_new = $database->escape_string($Submitted_Cheques_new);
    $Filled_Claim_new = $database->escape_string($Filled_Claim_new);
    $Requested_Garage_new = $database->escape_string($Requested_Garage_new);
    $Garage_Price_new = $database->escape_string($Garage_Price_new);
    $Total_Price_After_Interest_new = $database->escape_string($Total_Price_After_Interest_new);
    $Refunded_new = $database->escape_string($Refunded_new);
    $Comment_new = $database->escape_string($Comment_new);
    $Installment_Years_new = $database->escape_string($Installment_Years_new);
    $Down_Payment_PCT_new = $database->escape_string($Down_Payment_PCT_new);
    $Receiving_Payment_PCT_new = $database->escape_string($Receiving_Payment_PCT_new);
    $Remaining_Amount_new = $database->escape_string($Remaining_Amount_new);
    $Down_Payment_Amount_new = $database->escape_string($Down_Payment_Amount_new);
    $Receiving_Payment_Amount_new = $database->escape_string($Receiving_Payment_Amount_new);
    $Annual_Payment_PCT_new = $database->escape_string($Annual_Payment_PCT_new);
    $Annual_Payment_Amount_new = $database->escape_string($Annual_Payment_Amount_new);
    $Annual_With_Rate_new = $database->escape_string($Annual_With_Rate_new);
    $Installment_Discount_PCT_new = $database->escape_string($Installment_Discount_PCT_new);
    $Other_Discount_PCT_new = $database->escape_string($Other_Discount_PCT_new);
    $Interest_PCT_new = $database->escape_string($Interest_PCT_new);
    $Interest_Amount_new = $database->escape_string($Interest_Amount_new);
    $Down_Payment_Amount_new = $database->escape_string($Down_Payment_Amount_new);
    $Receiving_Payment_Amount_new = $database->escape_string($Receiving_Payment_Amount_new);
    $Meter_Price_After_Interest_new = $database->escape_string($Meter_Price_After_Interest_new);
    $Meter_Price_With_Discount_new = $database->escape_string($Meter_Price_With_Discount_new);
    $Payment_Type_ID_new = $database->escape_string($Payment_Type_ID_new);

    $sql= "INSERT INTO `activites` (`Activity_ID`, `Unit_ID`, `CST_NID`, `Seller_Account`,
    `Seller_Assistant_ID`, `Direct_Manager_ID`, `Section_Head_ID`, `Sale_Type_ID`, 
   `Broker_ID`, `Signed_Contract`, `Submitted_Cheques`, `Filled_Claim`, `Requested_Garage`,
    `Garage_Price`, `Total_Price_After_Interest`, `Refunded`, `Creation_Date`,
    `Last_Update_on`, `created_by`, `Creator_Manager`, `Comment`, `Maintenance_Fees_PCT`,
    `Installment_Years`, `Down_Payment_PCT`, `Receiving_Payment_PCT`, `Remaining_Amount`,
    `Down_Payment_Amount`, `Receiving_Payment_Amount`, `Annual_Payment_PCT`, `Annual_Payment_Amount`,
    `Annual_With_Rate`, `Installment_Discount_PCT`, `Other_Discount_PCT`, `Interest_PCT`, `Interest_Amount`,
    `Down_Payment_Amount_After_Interest`, `Receiving_Payment_Amount_After_Interest`, `Installment_Amount`,
    `Meter_Price_After_Interest`, `Basic_Meter_Price`, `Meter_Price_With_Discount`,
    `Usfurct_Area`, `Usfurct_Meter_Price`, `Unit_Basic_Price`, `Main_Garage_ID`, `Ceded_Garage_ID`, 
   `Status_ID`, `Discount_Amount`, `Payment_Type_ID`, `Manager_Assistant_ID`) 
   
   VALUES (NULL, '".$unit_id_new."', '".$CST_NID_new."', '".$Seller_Account_new."', '".$Seller_Assistant_ID_new."', NULL, NULL,
   '".$Sale_Type_ID_new."', '".$Broker_ID_new."', '".$Signed_Contract_new."', '".$Submitted_Cheques_new."', '".$Filled_Claim_new."',
   '".$Requested_Garage_new."', '".$Garage_Price_new."', '".$Total_Price_After_Interest_new."', '".$Refunded_new."', NULL, NULL, NULL, NULL,
   '".$Comment_new."', NULL, '".$Installment_Years_new."', '".$Down_Payment_PCT_new."', '".$Receiving_Payment_PCT_new."',
   '".$Remaining_Amount_new."', '".$Down_Payment_Amount_new."', '".$Receiving_Payment_Amount_new."', '".$Annual_Payment_PCT_new."',
   '".$Annual_Payment_Amount_new."', '".$Annual_With_Rate_new."', '".$Installment_Discount_PCT_new."', '".$Other_Discount_PCT_new."',
   '".$Interest_PCT_new."', '".$Interest_Amount_new."', '".$Down_Payment_Amount_new."', '".$Receiving_Payment_Amount_new."',
   '".$Installment_Amount_new."', '".$Meter_Price_After_Interest_new."', NULL, '".$Meter_Price_With_Discount_new."',
   NULL, NULL, NULL, NULL, NULL, '".$Status_ID_new."', NULL, '".$Payment_Type_ID_new."', NULL )";
    $activity_dml= $database->query($sql); 

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
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Activities <?php var_dump($sql); ?></a></li>
                <li class="breadcrumb-item active">New Activity <?php var_dump($activity_dml); ?></li>
                <li class="breadcrumb-item active">
                    <?php
                            // echo "unit_id_new = ".$unit_id_new."<br>"
                            // ."CST_NID_new".$CST_NID_new."<br>"
                            // ."Seller_Account_new".$Seller_Account_new."<br>"
                            // ."Seller_Assistant_ID_new".$Seller_Assistant_ID_new."<br>"
                            // ."Sale_Type_ID_new".$Sale_Type_ID_new."<br>"
                            // ."Broker_ID_new".$Broker_ID_new."<br>"
                            // ."Signed_Contract_new".$Signed_Contract_new."<br>"
                            // ."Submitted_Cheques_new".$Submitted_Cheques_new."<br>"
                            // ."Filled_Claim_new".$Filled_Claim_new."<br>"
                            // ."Requested_Garage_new".$Requested_Garage_new."<br>"
                            // ."Garage_Price_new".$Garage_Price_new."<br>"
                            // ."Total_Price_After_Interest_new".$Total_Price_After_Interest_new."<br>"
                            // ."Refunded_new".$Refunded_new."<br>"
                            // ."Comment_new".$Comment_new."<br>"
                            // ."Installment_Years_new".$Installment_Years_new."<br>"
                            // ."Down_Payment_PCT_new".$Down_Payment_PCT_new."<br>"
                            // ."Receiving_Payment_PCT_new".$Receiving_Payment_PCT_new."<br>"
                            // ."Remaining_Amount_new".$Remaining_Amount_new."<br>"
                            // ."Down_Payment_Amount_new".$Down_Payment_Amount_new."<br>"
                            // ."Receiving_Payment_Amount_new".$Receiving_Payment_Amount_new."<br>"
                            // ."Annual_Payment_PCT_new".$Annual_Payment_PCT_new."<br>"
                            // ."Annual_Payment_Amount_new".$Annual_Payment_Amount_new."<br>"
                            // ."Annual_With_Rate_new".$Annual_With_Rate_new."<br>"
                            // ."Installment_Discount_PCT_new".$Installment_Discount_PCT_new."<br>"
                            // ."Other_Discount_PCT_new".$Other_Discount_PCT_new."<br>"
                            // ."Interest_PCT_new".$Interest_PCT_new."<br>"
                            // ."Interest_Amount_new".$Interest_Amount_new."<br>"
                            // ."Down_Payment_Amount_new".$Down_Payment_Amount_new."<br>"
                            // ."Receiving_Payment_Amount_new".$Receiving_Payment_Amount_new."<br>"
                            // ."Installment_Amount_new".$Installment_Amount_new."<br>"
                            // ."Meter_Price_After_Interest_new".$Meter_Price_After_Interest_new."<br>"
                            // ."Meter_Price_With_Discount_new".$Meter_Price_With_Discount_new."<br>"
                            // ."Payment_Type_ID_new".$Payment_Type_ID_new."<br>"; 
                            ?>
                </li>
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
    <button onclick="location.href='index?module=Activities'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
    </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block"> 
                    <form action="index?module=Activities&create=true&unitId=<?php echo htmlentities($unit_ID);?>" method="post">
                        <div class="form-body">
                            <h4 class="card-title"> New Activity <small> For Unit ID <code> <?php echo htmlentities($unit_ID);?></code></small></h4>
                            <!-- Nav tabs -->
                            <div class="vtabs col-md-12">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-expanded="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Ticket Data</span> </a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-expanded="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Installment Plan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-expanded="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Installment Overview</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-20 active" id="home4" role="tabpanel" aria-expanded="true">
                                            <h3>Ticket Info </h3>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Unit Data</div>
                                                <p class="ribbon-content">check out the unit data</p>
                                            </div>
                                            <div class="row">
                                                <div id="" class="col-md-1 col-xs-6">
                                                    <img src="assets/images/units/1.png" width="120">
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Unit ID</label>
                                                        <input type="text" id="" name="unit_id_new" class="form-control" value="<?php echo htmlentities($unit_ID);?>" placeholder="<?php echo htmlentities($unit_ID);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Building No</label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Build_No);?>" placeholder="<?php echo htmlentities($Unit_Build_No);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Area </label>
                                                        <input type="text" id="unitArea" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Unit_Area);?>" placeholder="<?php echo htmlentities($Unit_Unit_Area);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Basic Meter Price </label>
                                                        <input type="text" id="unitBasicMeterPrice" name="Basic_Meter_Price" class="form-control" value="<?php echo htmlentities($Unit_Basic_Meter_Price);?>" placeholder="<?php echo htmlentities($Unit_Basic_Meter_Price);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Basic Price </label>
                                                        <input type="text" id="unitBasicPrice" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Unit_Basic_Price);?>" placeholder="<?php echo htmlentities($Unit_Unit_Basic_Price);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">  Usufruct Meter Price </label>
                                                        <input type="number" id="unitUsufructMeterPrice" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_usufruct_meter_price);?>" placeholder="<?php echo htmlentities($Unit_usufruct_meter_price);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label"> Usufruct Area </label>
                                                        <input type="text" id="unitUsufructArea" name="unit_id" class="form-control" value="<?php echo htmlentities($Usufruct_Area);?>" placeholder="<?php echo htmlentities($Usufruct_Area);?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Maintenance Fees %</label>
                                                        <input type="number" id="" name="" placeholder="<?php echo htmlentities($Maintenance_Fees_data['Maintenance_pct'][0]*100); ?>%" value="<?php echo htmlentities($Maintenance_Fees_data['Maintenance_pct'][0]); ?>" class="form-control"  readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Price</label>
                                                        <input type="text" id="ProjectName" name="Garage_Price_new" class="form-control" placeholder="" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Requested</label>                                                    
                                                        <select id="" name="Requested_Garage_new" class="form-control form-control-line" >
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $requested_garage_type_data_Count ; $i++) { 
    echo "<option value='".$requested_garage_type_data["ID"][$i]."' >".$requested_garage_type_data["Type_Name"][$i]." </option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Client Data</div>
                                                <!-- <p class="ribbon-content">check out the unit data</p> -->
                                            </div>
                                            <div class="row">
                                                <div id="" class="col-md-.5 col-xs-1">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">National ID</label>
                                                        <select id="National_ID" name="CST_NID_new" class="form-control form-control-line" >
                                                            <option>Select National ID</option>
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $client_data_Count ; $i++) { 
    echo "<option value='".$requested_client_data["National_ID"][$i]."' >".$requested_client_data["National_ID"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <select id="Full_Name" name="" class="form-control form-control-line" >
                                                            <option>Full Name</option>
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $client_data_Count ; $i++) { 
    echo "<option value='".$requested_client_data["National_ID"][$i]."' >".$requested_client_data["Full_Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile</label>
                                                        <select id="Mobile" name="" class="form-control form-control-line" >
                                                            <option>Mobile</option>
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $client_data_Count ; $i++) { 
    echo "<option value='".$requested_client_data["National_ID"][$i]."' >".$requested_client_data["Mobile1"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Employee Data</div>
                                                <!-- <p class="ribbon-content">check out the unit data</p> -->
                                            </div>
                                            <div class="row"> 
                                                <div id="" class="col-md-.5 col-xs-1">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller</label>
                                                        <input type="text" id="ProjectName" name="Seller_Account_new" class="form-control" value="root@localhost" placeholder="root@localhost" readonly/>
                                                        <small class="form-control-feedback">Seller Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Direct Manager</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" >
                                                            <option >Ahmed mahmoud</option>                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-.5 col-xs-1" style="display: none;">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant </label>
                                                        <select id="" name="Seller_Assistant_ID_new" class="form-control form-control-line" >
                                                            <option>select seller</option>
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $emp_data_Count ; $i++) { 
    echo "<option value='".$emp_data["EMP_ID"][$i]."' >".$emp_data["User_Account"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant Direct Manager</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" >
                                                            <option value="">Select One if available</option>
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Section Head</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" >
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Sale Type</label>
                                                        <select id="sale-typ-option" name="Sale_Type_ID_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $sale_type_data_Count ; $i++) { 
    echo "<option value='".$sale_type_data["ID"][$i]."' >".$sale_type_data["Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-.5 col-xs-1 dependent-form-image" id="broker-form-image">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-3 dependent-form" id="broker-form-value">
                                                    <div class="form-group">
                                                        <label class="control-label">Broker</label>
                                                        <select id="" name="Broker_ID_new" class="form-control form-control-line">
                                                            <option></option>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $brokers_data_Count ; $i++) { 
    echo "<option value='".$brokers_data["ID"][$i]."' >".$brokers_data["Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                         
                                                        </select>
                                                    </div>
                                                </div>                                                                                                                                
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <label class="control-label">Comment</label>
                                                        <textarea style="resize: vertical;" name="Comment_new" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Activity input</div>
                                            </div>
                                        <div class="row">
                                            <div id="" class="col-md-0.5 col-xs-6">
                                                <img src="assets/images/units/activity.jpg" width="90">
                                            </div>
                                            <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Activity Status</label>
                                                        <select id="activity-status-option" name="Status_ID_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $activity_status_data_Count ; $i++) { 
    echo "<option value='".$activity_status_data["ID"][$i]."' >".$activity_status_data["Name"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/payment.JPG" width="50">
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Type</label>
                                                        <select id="" name="Payment_Type_ID_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $payment_type_data_Count ; $i++) { 
    echo "<option value='".$payment_type_data["ID"][$i]."' >".$payment_type_data["Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/contract_sign.JPG" width="80">
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Signed Contract</label>
                                                        <select id="Location" name="Signed_Contract_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $req_data_Count ; $i++) { 
    echo "<option value='".$requested_req_data["ID"][$i]."' >".$requested_req_data["Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/Cheque_Submitted.JPG" width="80">
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <select id="Location" name="Submitted_Cheques_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $req_data_Count ; $i++) { 
    echo "<option value='".$requested_req_data["ID"][$i]."' >".$requested_req_data["Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                         </div>
                                         <br>
                                         <div class="row" >    
                                                <div class="col-md-2 dependent-status-form" id="Refunded-broker-form-value">
                                                    <div class="form-group">
                                                        <label class="control-label">Refunded</label>
                                                        <select id="Location" name="Refunded_new" class="form-control form-control-line" required>
                                                        <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $req_data_Count ; $i++) { 
    echo "<option value='".$requested_req_data["ID"][$i]."' >".$requested_req_data["Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                           
                                                                 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 " id="Filled-Claim-form-value">
                                                    <div class="form-group">
                                                        <label class="control-label">Filled Claim</label>
                                                        <select id="Location" name="Filled_Claim_new" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $req_data_Count ; $i++) { 
    echo "<option value='".$requested_req_data["ID"][$i]."' >".$requested_req_data["Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                           
                                                              
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                            <div id="" class="col-md-.5 col-xs-6">
                                                <img src="assets/images/icons/Circle-icons-calendar.svg.png" style=" margin-top: 20px;" width="50">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label class="control-label">Creation Date</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" readonly/>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-.5 col-xs-6">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">created_by</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" value="<?php echo $user_name; ?>" placeholder="root@localhost" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Creator Manager</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" readonly/>
                                                    </div>
                                                </div>
                                            </div>                          
                                    </div>
                                    <div class="tab-pane p-20" id="profile4" role="tabpanel" aria-expanded="true">
                                        <h3>Installment Info </h3>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Years</label>
                                                    <select  id="installmentYears" name="Installment_Years_new" class="form-control form-control-line" >
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $installment_plans_data_Count ; $i++) { 
    echo "<option value='".$installment_plans_data["ID"][$i]."' >".$installment_plans_data["Years"][$i]." </option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Interest %</label>
                                                    <select  id="installmentInterestPc" name="Interest_PCT_new" class="form-control form-control-line" >
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $installment_plans_data_Count ; $i++) { 
    echo "<option value='".$installment_plans_data["interest"][$i]."' >".$installment_plans_data_PC=$installment_plans_data["interest"][$i] *(100)." % </option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                </div>
                                            </div>   
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Disc</label>
                                                    <select  id="installmentDiscount" name="Installment_Discount_PCT_new" class="form-control form-control-line" >
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $installment_plans_data_Count ; $i++) { 
    echo "<option value='".$installment_plans_data["discount"][$i]."' >".$installment_plans_data_discount_PC=$installment_plans_data["discount"][$i] *(100)." % </option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>                                                    
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Other Disc %</label>
                                                    <input type="number" id="unitOtherDiscount"  step="any" name="Other_Discount_PCT_new" class="form-control" placeholder="" />
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Total Disc</label>
                                                    <input type="number" id="totalUnitDiscoutAmount" name="ProjectName" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                    <label class="control-label">Total BP</label>
                                                    <small id="totalUnitBasicPrice"></small>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Annual Payment %</label>
                                                    <input type="number" id="annualPaymentPc"  step="any" name="Annual_Payment_PCT_new" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment%</label>
                                                    <input type="number" id="downPaymentPc"  step="any" name="Down_Payment_PCT_new" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment %</label>
                                                    <input type="number" id="receivingPaymentPc"  step="any" name="Receiving_Payment_PCT_new" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment Basci</label>
                                                    <small id="downPayment"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment Basic</label>
                                                    <small id="receivingPayment"></small>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">     
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Annual Payment </label>
                                                    <input type="number" id="annualPaymentAmount" name="Annual_Payment_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment After Interest</label>
                                                    <input type="number" id="downPaymentAmountAfterInterest" name="Down_Payment_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment After Interest</label>
                                                    <input type="number" id="receivingPaymentAmountAfterInterest" name="Receiving_Payment_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">       
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Annual With Rate</label>
                                                    <input type="number" id="annualWithRate" name="Annual_With_Rate_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Amount</label>
                                                    <input type="number" id="installmentAmount" name="Installment_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Intrest Amount</label>
                                                    <input type="number" id="intrestAmount" name="Interest_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Remaining Amount</label>
                                                    <input type="number" id="remainingAmount" name="Remaining_Amount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price After Interest</label>
                                                    <input type="number" id="meterPriceAfterInterest" name="Meter_Price_After_Interest_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price With Discount </label>
                                                    <input type="number" id="meterPriceWithDiscount" name="Meter_Price_With_Discount_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Mainitanance Amount </label>
                                                    <input type="number" id="mainitananceAmount" name="ProjectName" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/payment.JPG" width="50">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Price After Interest or Discount</label>
                                                    <input type="number" id="totalPriceAfterInterestOrDiscount" name="Total_Price_After_Interest_new" class="form-control" placeholder="" readonly/>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-20" id="messages4" role="tabpanel" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <table class="display nowrap table table-hover table-striped table-bordered dataTable">
                                                    <thead>
                                                        <tr class="tableizer-firstrow">
                                                            <th style="background-color: #104E8B; color:#fff;">Down Payment</th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <th id="downPaymentPc2" style="background-color: yellow;"></th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Receiving Payment</td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <td id="receivingPaymentPc2" style="background-color: yellow; "></td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                        <td style="background-color: #104E8B; color:#fff; font-weight:500">Annual Payment</td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <td id="annualPaymentPc2" style="background-color: yellow;"></td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment Years</td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <td id="installmentYears2" style="background-color: yellow; "></td>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                            <th style="background-color: yellow; color:#fff;">&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Maintanance Payment</td>
                                                            <td>&nbsp;</td>
                                                            <td id="mainitananceAmount2"></td>
                                                            <td> One Time Payment</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">&nbsp;</td>
                                                            <td> Amount</td>
                                                            <td> Maintanance </td>
                                                            <td> Percentage % </td>
                                                            <td> Due date  </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500"> Down Payment </td>
                                                            <td id="downPaymentAmountAfterInterest2"></td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Receiving Payment</td>
                                                            <td id="receivingPaymentAmountAfterInterest2"></td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                        <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 1</td>
                                                            <td id="installmentAmount2"></td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 2</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 3 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 4 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Annual Payment Amount</td>
                                                            <td id="annualPaymentAmount2"></td>
                                                            <td>&nbsp;</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 5 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 6 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 7 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 8 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 9 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 10 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 11 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #104E8B; color:#fff; font-weight:500">Installment No 12 </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>0.00%</td>
                                                            <td>-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>   
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button" onclick="location.href='index?module=Activities'" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-8 align-self-center">
                        </div>    
                        <div class="col-md-6 col-8 align-self-center">
                            <div class="form-actions">
                                    <button style="font-size: 27px;" onclick="myFunctionCalculateAll()" class="btn btn-success pull-right m-l-10"><i class="mdi mdi-calculator"></i> Calculate</button>
                            </div>
                        </div>
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
