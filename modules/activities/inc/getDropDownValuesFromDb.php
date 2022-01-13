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


?>