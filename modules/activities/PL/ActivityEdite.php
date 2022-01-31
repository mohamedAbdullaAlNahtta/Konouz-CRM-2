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
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Activities</a></li>
                <li class="breadcrumb-item active">New Activity</li>
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
                    <form action="index?module=activities&create=true" method="post">
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
                                                        <input type="text" id="" name="unit_id_new" class="form-control" value="<?php echo htmlentities($unit_ID);?>" placeholder="<?php echo htmlentities($unit_ID);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Building No</label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Build_No);?>" placeholder="<?php echo htmlentities($Unit_Build_No);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Area </label>
                                                        <input type="text" id="unitArea" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Unit_Area);?>" placeholder="<?php echo htmlentities($Unit_Unit_Area);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Basic Meter Price </label>
                                                        <input type="text" id="unitBasicMeterPrice" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Basic_Meter_Price);?>" placeholder="<?php echo htmlentities($Unit_Basic_Meter_Price);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Basic Price </label>
                                                        <input type="text" id="unitBasicPrice" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_Unit_Basic_Price);?>" placeholder="<?php echo htmlentities($Unit_Unit_Basic_Price);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">  Usufruct Meter Price </label>
                                                        <input type="number" id="unitUsufructMeterPrice" name="unit_id" class="form-control" value="<?php echo htmlentities($Unit_usufruct_meter_price);?>" placeholder="<?php echo htmlentities($Unit_usufruct_meter_price);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label"> Usufruct Area </label>
                                                        <input type="text" id="unitUsufructArea" name="unit_id" class="form-control" value="<?php echo htmlentities($Usufruct_Area);?>" placeholder="<?php echo htmlentities($Usufruct_Area);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Maintenance Fees %</label>
                                                        <input type="number" id="" name="" placeholder="<?php echo htmlentities($Maintenance_Fees_data['Maintenance_pct'][0]*100); ?>%" value="<?php echo htmlentities($Maintenance_Fees_data['Maintenance_pct'][0]); ?>" class="form-control"  disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Price</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Requested</label>                                                    
                                                        <select id="" name="" class="form-control form-control-line" >
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
                                                        <select id="" name="" class="form-control form-control-line" >
                                                            <option>select seller</option>
 <?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $client_data_Count ; $i++) { 
    echo "<option value='".$requested_client_data["ID"][$i]."' >".$requested_client_data["National_ID"][$i]."</option>";
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
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" value="root@localhost" placeholder="root@localhost" disabled/>
                                                        <small class="form-control-feedback">Seller Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Direct Manager</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
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
                                                        <select id="" name="" class="form-control form-control-line" >
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
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
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
                                                        <select id="sale-typ-option" name="Location" class="form-control form-control-line" required>
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
                                                        <select id="" name="" class="form-control form-control-line" required>
                                                            <option>Select Broker</option>
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
                                                        <textarea style="resize: vertical;" name="" rows="4"></textarea>
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
                                                        <select id="activity-status-option" name="" class="form-control form-control-line" required>
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
                                                        <select id="" name="" class="form-control form-control-line" required>
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
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/Cheque_Submitted.JPG" width="80">
                                                </div>
                                                <div class="col-md-2 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                         </div>
                                         <br>
                                         <div class="row" >    
                                                <div class="col-md-2 dependent-status-form" id="Refunded-broker-form-value">
                                                    <div class="form-group">
                                                        <label class="control-label">Refunded</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 dependent-status-form" id="Filled-Claim-form-value">
                                                    <div class="form-group">
                                                        <label class="control-label">Filled Claim</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
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
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="<?php echo htmlentities(date("Y/m/d h:i:s"));?>" disabled/>
                                                    </div>
                                                </div>
                                                <div id="" class="col-md-.5 col-xs-6">
                                                    <img src="assets/images/users/User-01.png" style="border-radius: 50%;border: 1px solid; margin-top: 20px;" width="50">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">created_by</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" value="<?php echo $user_name; ?>" placeholder="root@localhost" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label">Creator Manager</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" Disabled/>
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
                                                    <select  id="installmentYears" name="" class="form-control form-control-line" >
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
                                                    <select  id="installmentInterestPc" name="" class="form-control form-control-line" >
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
                                                    <select  id="installmentDiscount" name="" class="form-control form-control-line" >
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
                                                    <input type="number" id="unitOtherDiscount" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Total Disc</label>
                                                    <input type="number" id="totalUnitDiscoutAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
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
                                                    <input type="number" id="annualPaymentPc" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment%</label>
                                                    <input type="number" id="downPaymentPc" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">0.03 mean 3%.... </small>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment %</label>
                                                    <input type="number" id="receivingPaymentPc" name="ProjectName" class="form-control" placeholder="" required/>
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
                                                    <input type="number" id="annualPaymentAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment After Interest</label>
                                                    <input type="number" id="downPaymentAmountAfterInterest" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment After Interest</label>
                                                    <input type="number" id="receivingPaymentAmountAfterInterest" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">       
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Annual With Rate</label>
                                                    <input type="number" id="annualWithRate" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Amount</label>
                                                    <input type="number" id="installmentAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Intrest Amount</label>
                                                    <input type="number" id="intrestAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Remaining Amount</label>
                                                    <input type="number" id="remainingAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price After Interest</label>
                                                    <input type="number" id="meterPriceAfterInterest" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price With Discount </label>
                                                    <input type="number" id="meterPriceWithDiscount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Mainitanance Amount </label>
                                                    <input type="number" id="mainitananceAmount" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                </div>
                                            </div>
                                            <div id="" class="col-md-0.5 col-xs-6">
                                                    <img src="assets/images/payment.JPG" width="50">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Price After Interest or Discount</label>
                                                    <input type="number" id="totalPriceAfterInterestOrDiscount" name="ProjectName" class="form-control" placeholder="" disabled/>
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
                            <button type="button" onclick="" class="btn btn-inverse">Cancel</button>
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
