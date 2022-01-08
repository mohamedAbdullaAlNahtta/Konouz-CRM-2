<?php

/////////////////////////////////////////////////////////////
// Start of ------getting all broker type and ids 
/////////////////////////////////////////////////////////////
$sql_get_pro= "SELECT `ID`, ``Broker_Type`` FROM `broker type` ";
$projects_all_get= $database->query($sql_get_pro);

$projectsNameCount = $projects_all_get->num_rows;
   // output data of each row
   while($row = $projects_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $broker_type[] = $row["broker type"];
   }
 $project_name= array("ID"=>$ID, "broker_type"=>$ProName );

 //////////////////////////////////////////////////////////////
// End of ------ getting all broker type and ids 
///////////////////////////////////////////////////////////////

?>