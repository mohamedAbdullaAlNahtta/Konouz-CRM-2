<?php

include_once("inc/classautoloader.inc");

$database_hr = new DB('10.144.120.27', 'root', 'admin', 'hr');


// $b= $a->query("update `activites` set `status_id`='3'");

// var_dump($b);


// $servername = "10.144.120.27";
// $username = "root";
// $password = "admin";
// $dbname = "hr";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

$sql_get_emp_data= "SELECT `EMP_ID`, `User_Account` FROM `employees`";
$emp_data_all_get= $database_hr->query($sql_get_emp_data);

$emp_data_Count = $emp_data_all_get->num_rows;
   // output data of each row
   while($row = $emp_data_all_get->fetch_assoc()) {
     $EMP_ID[] = $row["EMP_ID"];
     $User_Account[] = $row["User_Account"];
   }
 $emp_data= array("EMP_ID"=>$EMP_ID, "User_Account"=>$User_Account );




?>

<html>
    <head></head>
    <body>
<?php 

var_dump($emp_data);
?>

    </body>
</html>