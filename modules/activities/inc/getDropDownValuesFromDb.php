<?php

$unit_ID = $_GET['unitId'];
/////////////////////////////////////////////////////////////
// Start of ------getting  Unit
/////////////////////////////////////////////////////////////
$sql_get_unit_data= "SELECT
`Build_No`,
`Unit_Area`,
`Basic_Meter_Price` AS `Basic_Meter_Price_Id`,
 `b`.`Basic Meter Price` ,
`Unit_Basic_Price`,
`usufruct_meter_price`AS `usufruct_meter_price_id` ,
 `up`.`Usufruct Meter Price` ,
`Roof_Area`,
`Garden_Area`,
`Open_terrace_Area`
from
`units` `u`
left join  
`basic prices` `b`
on 
`u`.Basic_Meter_Price  = `b`.ID 
left join 
`usufruct prices` `up`
on 
`up`.ID = `u`.usufruct_meter_price 
where
`Unit_ID`='".$unit_ID."'";
$unit_data_all_get= $database->query($sql_get_unit_data);

$unit_data_Count = $unit_data_all_get->num_rows;
   // output data of each row
   while($row = $unit_data_all_get->fetch_assoc()) {
     $Unit_Build_No = $row["Build_No"];
     $Unit_Unit_Area = $row["Unit_Area"];
     $Unit_Basic_Meter_Price_id = $row["Basic_Meter_Price_Id"];
     $Unit_Basic_Meter_Price = $row["Basic Meter Price"];
     $Unit_Unit_Basic_Price = $row["Unit_Basic_Price"];
     $Unit_usufruct_meter_price_id = $row["usufruct_meter_price_id"];
     $Unit_usufruct_meter_price = $row["Usufruct Meter Price"];
     $Unit_Roof_Area = $row["Roof_Area"];
     $Unit_Garden_Area = $row["Garden_Area"];
     $Unit_Open_terrace_Area = $row["Open_terrace_Area"];
     
   }

   $Usufruct_Area=$Unit_Roof_Area+$Unit_Garden_Area+$Unit_Open_terrace_Area;

 //////////////////////////////////////////////////////////////
// End of ------ getting Unit
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all Users names and ids 
/////////////////////////////////////////////////////////////
$sql_get_emp_data= "SELECT `EMP_ID`, `User_Account` FROM `employees`";
$emp_data_all_get= $database_hr->query($sql_get_emp_data);

$emp_data_Count = $emp_data_all_get->num_rows;
   // output data of each row
   while($row = $emp_data_all_get->fetch_assoc()) {
     $EMP_ID[] = $row["EMP_ID"];
     $User_Account[] = $row["User_Account"];
   }
 $emp_data= array("EMP_ID"=>$EMP_ID, "User_Account"=>$User_Account );

 //////////////////////////////////////////////////////////////
// End of ------ getting all Users names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all sale type data
/////////////////////////////////////////////////////////////
$sql_get_sale_type_data= "SELECT `ID`, `Name` FROM `sale type`";
$sale_type_data_all_get= $database->query($sql_get_sale_type_data);

$sale_type_data_Count = $sale_type_data_all_get->num_rows;
   // output data of each row
   while($row = $sale_type_data_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Name[] = $row["Name"];
   }

 $sale_type_data= array("ID"=>$ID, "Name"=>$Name );

 $ID=array();
 $Name=array();

 //////////////////////////////////////////////////////////////
// End of ------ ggetting all sale type data
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all brokers data
/////////////////////////////////////////////////////////////
$sql_get_brokers_data= "SELECT `ID` , `Name` FROM `brokers`";
$brokers_data_all_get= $database->query($sql_get_brokers_data);

$brokers_data_Count = $brokers_data_all_get->num_rows;
   // output data of each row
   while($row = $brokers_data_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Name[] = $row["Name"];
   }
 $brokers_data= array("ID"=>$ID, "Name"=>$Name );

 $ID=array();
 $Name=array();

 //////////////////////////////////////////////////////////////
// end of ------getting all brokers data
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all payment type data
/////////////////////////////////////////////////////////////
$sql_get_payment_type_data= "SELECT `ID` , `Type` FROM `payment type`";
$payment_type_data_all_get= $database->query($sql_get_payment_type_data);

$payment_type_data_Count = $payment_type_data_all_get->num_rows;
   // output data of each row
   while($row = $payment_type_data_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Type[] = $row["Type"];
   }
 $payment_type_data= array("ID"=>$ID, "Type"=>$Type );

 $ID=array();
 $Type=array();

 //////////////////////////////////////////////////////////////
// end of ------getting all payment type data
///////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////
// Start of ------getting all payment type data
/////////////////////////////////////////////////////////////
$sql_get_activity_status_data= "SELECT * FROM `activity status`";
$activity_status_data_all_get= $database->query($sql_get_activity_status_data);

$activity_status_data_Count = $activity_status_data_all_get->num_rows;
   // output data of each row
   while($row = $activity_status_data_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Name[] = $row["Name"];
   }
 $activity_status_data= array("ID"=>$ID, "Name"=>$Name );

 $ID=array();
 $Name=array();

 //////////////////////////////////////////////////////////////
// end of ------getting all payment type data
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all payment type data
/////////////////////////////////////////////////////////////
$sql_get_Maintenance_Fees_data= "SELECT * FROM `activity status`";
$Maintenance_Fees_data_all_get= $database->query($sql_get_Maintenance_Fees_data);

$Maintenance_Fees_data_Count = $Maintenance_Fees_data_all_get->num_rows;
   // output data of each row
   while($row = $Maintenance_Fees_data_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Name[] = $row["Name"];
   }
 $Maintenance_Fees_data= array("ID"=>$ID, "Name"=>$Name );

 $ID=array();
 $Name=array();

 //////////////////////////////////////////////////////////////
// end of ------getting all payment type data
///////////////////////////////////////////////////////////////


?>