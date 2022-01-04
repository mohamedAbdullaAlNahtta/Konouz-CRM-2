<?php


/////////////////////////////////////////////////////////////
// Start of ------getting all developers names and ids 
/////////////////////////////////////////////////////////////
$sql_get_pro= "SELECT `ID`, `Name` FROM `projects`";
$projects_all_get= $database->query($sql_get_pro);

$projectsNameCount = $projects_all_get->num_rows;
   // output data of each row
   while($row = $projects_all_get->fetch_assoc()) {
     $ProID[] = $row["ID"];
     $ProName[] = $row["Name"];
   }
 $project_name= array("ProID"=>$ProID, "ProName"=>$ProName );

 //////////////////////////////////////////////////////////////
// End of ------ getting all developers names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  Floor  names and ids 
/////////////////////////////////////////////////////////////
$sql_get_Floor= "SELECT `ID`, `Name` FROM `floor`";
$floors_all_get= $database->query($sql_get_Floor);

$FloorNameCount = $floors_all_get->num_rows;
   // output data of each row
   while($row = $floors_all_get->fetch_assoc()) {
     $Floor_Id[] = $row["ID"];
     $Floor_Name[] = $row["Name"];
   }
 $floor_name= array("Floor_Id"=>$Floor_Id, "Floor_Name"=>$Floor_Name );

 //////////////////////////////////////////////////////////////
// End of ------ getting all  Floor  names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  Status  names and ids 
/////////////////////////////////////////////////////////////
$sql_get_Status= "SELECT `ID`, `Name` FROM `unit status` ORDER BY `Name` ASC";
$status_all_get= $database->query($sql_get_Status);

$StatusNameCount = $status_all_get->num_rows;
   // output data of each row
   while($row = $status_all_get->fetch_assoc()) {
     $Status_ID[] = $row["ID"];
     $status_Name[] = $row["Name"];
   }
 $Status_name= array("Status_ID"=>$Status_ID, "status_Name"=>$status_Name );

 //////////////////////////////////////////////////////////////
// End of ------ getting all  Status  names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  Rows  names and ids 
/////////////////////////////////////////////////////////////
$sql_get_row= "SELECT `ID`, `Type` FROM `raw type`";
$row_all_get= $database->query($sql_get_row);

$rowNameCount = $row_all_get->num_rows;
   // output data of each row
   while($row = $row_all_get->fetch_assoc()) {
     $R_ID[] = $row["ID"];
     $R_Type[] = $row["Type"];
   }
 $row_name= array("R_ID"=>$R_ID, "R_Type"=>$R_Type );

 //////////////////////////////////////////////////////////////
// End of ------ getting all  Rows  names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  Position  names and ids 
/////////////////////////////////////////////////////////////
$sql_get_unit_position= "SELECT `Pos_ID`, `Pos_Name` FROM `unit_position`";
$unit_position_all_get= $database->query($sql_get_unit_position);

$unitPositionNameCount = $unit_position_all_get->num_rows;
   // output data of each row
   while($row = $unit_position_all_get->fetch_assoc()) {
     $Pos_ID[] = $row["Pos_ID"];
     $Pos_Name[] = $row["Pos_Name"];
   }
 $unitPosition= array("Pos_ID"=>$Pos_ID, "Pos_Name"=>$Pos_Name );

 //////////////////////////////////////////////////////////////
// End of ------ getting all  Position  names and ids 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  Rooms  dis 
/////////////////////////////////////////////////////////////
$sql_get_rooms= "SELECT `ID`, `Rooms_Count`, `Rooms_Description` FROM `rooms`";
$rooms_all_get= $database->query($sql_get_rooms);

$roomsNameCount = $rooms_all_get->num_rows;
   // output data of each row
   while($row = $rooms_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Rooms_Count[] = $row["Rooms_Count"];
     $Rooms_Description[] = $row["Rooms_Description"];
   }
 $rooms= array("ID"=>$ID, "Rooms_Count"=>$Rooms_Count, "Rooms_Description"=>$Rooms_Description );

 //////////////////////////////////////////////////////////////
// End of ------ getting all  Rooms  dis 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all  finshing level  
/////////////////////////////////////////////////////////////
$sql_get_finishing_level= "SELECT `ID`, `Level` FROM `finishing_level`";
$finishing_level_all_get= $database->query($sql_get_finishing_level);

$finishingLevelNameCount = $finishing_level_all_get->num_rows;
   // output data of each row
   while($row = $finishing_level_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Level[] = $row["Level"];
   }
 $finishing_level= array("ID"=>$ID, "Level"=>$Level);

 //////////////////////////////////////////////////////////////
// End of ------ getting all  finshing level 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all   Usufruct Type 
/////////////////////////////////////////////////////////////
$sql_get_usufruct_type= "SELECT `Usu_type` FROM `usufruct_type`";
$usufruct_type_all_get= $database->query($sql_get_usufruct_type);

$usufructtypeNameCount = $usufruct_type_all_get->num_rows;
   // output data of each row
   while($row = $usufruct_type_all_get->fetch_assoc()) {
     $Usu_type[] = $row["Usu_type"];
   }
 $usufruct_type= array("Usu_type"=>$Usu_type);

 //////////////////////////////////////////////////////////////
// End of ------ getting all   Usufruct Type  
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all   usufruct_prices
/////////////////////////////////////////////////////////////
$sql_get_usufruct_prices= "SELECT `UsuID`, `Usufruct_Meter_Price` FROM `usufruct_prices`";
$usufruct_prices_all_get= $database->query($sql_get_usufruct_prices);

$usufructpricesNameCount = $usufruct_prices_all_get->num_rows;
   // output data of each row
   while($row = $usufruct_prices_all_get->fetch_assoc()) {
     $UsuID[] = $row["UsuID"];
     $Usufruct_Meter_Price[] = $row["Usufruct_Meter_Price"];
   }
 $usufruct_prices= array("UsuID"=>$UsuID, "Usufruct_Meter_Price"=>$Usufruct_Meter_Price );

 //////////////////////////////////////////////////////////////
// End of ------ getting all   usufruct_prices 
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
// Start of ------getting all   usufruct_prices
/////////////////////////////////////////////////////////////
$sql_get_basic_prices= "SELECT `Basic_ID`, `Basic_Meter_Price` FROM `basic_prices`";
$basic_prices_all_get= $database->query($sql_get_basic_prices);

$basicpricesNameCount = $basic_prices_all_get->num_rows;
   // output data of each row
   while($row = $basic_prices_all_get->fetch_assoc()) {
     $Basic_ID[] = $row["Basic_ID"];
     $Basic_Meter_Price[] = $row["Basic_Meter_Price"];
   }
 $basic_prices = array("Basic_ID"=>$Basic_ID, "Basic_Meter_Price"=>$Basic_Meter_Price );

 //////////////////////////////////////////////////////////////
// End of ------ getting all   usufruct_prices 
///////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>