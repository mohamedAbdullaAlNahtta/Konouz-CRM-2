<?php

/////////////////////////////////////////////////////////////
// Start of ------getting all broker type and ids 
/////////////////////////////////////////////////////////////
$sql_get_Broker_Type= "SELECT `ID`, `Broker_Type` FROM `broker type`";
$Broker_Type_all_get= $database->query($sql_get_Broker_Type);

$BrokerTypeCount = $Broker_Type_all_get->num_rows;
   // output data of each row
   while($row = $Broker_Type_all_get->fetch_assoc()) {
     $ID[] = $row["ID"];
     $Broker_Type[] = $row["Broker_Type"];
   }
 $Broker_Type_all= array("ID"=>$ID, "Broker_Type"=>$Broker_Type );

 //////////////////////////////////////////////////////////////
// End of ------ getting all broker type and ids 
///////////////////////////////////////////////////////////////

?>