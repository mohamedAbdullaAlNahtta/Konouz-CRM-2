<?php

// include_once("inc/classautoloader.inc");

// $a = new DB('10.144.120.27', 'soliman', 'soliman', 'inventory');


// $b= $a->query("update `activites` set `status_id`='3'");

// var_dump($b);


$servername = "10.144.120.27";
$username = "root";
$password = "admin";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `P`.`ProID`, `P`.`ProName`, `D`.`DevName`, `P`.`Insertion_date`, `P`.`Added_By`, `P`.`maintenance_pct`, `P`.`location`, `P`.`location_OnMap`  from `projects` as `P`, `developers` as `D`
where `P`.`DevID`=`D`.`DevID`";
$result = $conn->query($sql);

$ProjectCount = $result->num_rows;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $ProID[] = $row["ProID"];
    $ProName[] = $row["ProName"];
    $DevName[] = $row["DevName"];
    $Insertion_date[] = $row["Insertion_date"];
    $Added_By[] = $row["Added_By"];
    $maintenance_pct[] = $row["maintenance_pct"];
    $location[] = $row["location"];
    $location_OnMap[] = $row["location_OnMap"];
  }
} else {
  echo "0 results";
}
$conn->close();


$projects= array("ProID"=>$ProID, "ProName"=>$ProName, "DevName"=>$DevName, "Insertion_date"=>$Insertion_date, "Added_By"=>$Added_By, "maintenance_pct"=>$maintenance_pct, "location"=>$location, "location_OnMap"=>$location_OnMap);



?>

<html>
    <head></head>
    <body>
    <table style="width:50%">
  <tr>
    <th>ProID </th>
    <th>ProName </th>
    <th>DevName </th>
    <th>Insertion_date </th>
    <th>Added_By </th>
    <th>maintenance_pct </th>
    <th>location </th>
    <th>location_OnMap </th>
  </tr>
 
<?php
for ($i=0; $i < $ProjectCount ; $i++) { 
    # code.
    echo " <tr><th>".$projects["ProID"][$i]."</th>";
    echo "<th>".$projects["ProName"][$i]."</th>";
    echo "<th>".$projects["DevName"][$i]."</th>";
    echo "<th>".$projects["Insertion_date"][$i]."</th>";
    echo "<th>".$projects["Added_By"][$i]."</th>";
    echo "<th>".$projects["maintenance_pct"][$i]."</th>";
    echo "<th>".$projects["location"][$i]."</th>";
    echo "<th>".$projects["location_OnMap"][$i]."</th>  </tr>";

}
?>

</table>

    </body>
</html>