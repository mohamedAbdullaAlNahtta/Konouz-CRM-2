<?php


/////////////////////////////////////////////////////////////
// Start of ------getting  Unit
/////////////////////////////////////////////////////////////
$sql_get_unit_data= "SELECT `Build_No`, `Unit_Area`, `Basic_Meter_Price`, `Unit_Basic_Price`, `usufruct_meter_price``Roof_Area`, `Garden_Area`, `Open_terrace_Area` FROM `units`";
$unit_data_all_get= $database->query($sql_get_unit_data);

$unit_data_Count = $unit_data_all_get->num_rows;
   // output data of each row
   while($row = $unit_data_all_get->fetch_assoc()) {
     $Unit_Build_No = $row["Build_No"];
     $Unit_Unit_Area = $row["Unit_Area"];
     $Unit_Basic_Meter_Price = $row["Basic_Meter_Price"];
     $Unit_Unit_Basic_Price = $row["Unit_Basic_Price"];
     $Unit_usufruct_meter_price = $row["usufruct_meter_price"];
     $Unit_Roof_Area = $row["Roof_Area"];
     $Unit_Garden_Area = $row["Garden_Area"];
     $Unit_Open_terrace_Area = $row["Open_terrace_Area"];
     
   }
 //////////////////////////////////////////////////////////////
// End of ------ getting Unit
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all developers names and ids 
/////////////////////////////////////////////////////////////
// $sql_get_unit_data= "SELECT Build_No,  FROM `units`";
// $unit_data_all_get= $database->query($sql_get_unit_data);

// $unit_data_Count = $unit_data_all_get->num_rows;
//    // output data of each row
//    while($row = $unit_data_all_get->fetch_assoc()) {
//      $ProID[] = $row["ID"];
//      $ProName[] = $row["Name"];
//    }
//  $unit_data= array("ProID"=>$ProID, "ProName"=>$ProName );

 //////////////////////////////////////////////////////////////
// End of ------ getting all developers names and ids 
///////////////////////////////////////////////////////////////


?>