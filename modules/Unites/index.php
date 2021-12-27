<?php


/////////////////////////
// loading module screen
/////////////////////////
if (isset($_GET['create']))
{
    // getDropDownValuesFromDb
    require_once __DIR__ . "/inc/getDropDownValuesFromDb.php";
    //loading create page
    require_once ("PL/create.php");
}
elseif (isset($_GET['unitId']))
{ 
    ///loading unite details
    require_once ("PL/unitDetails.php");
}elseif (isset($_GET['EditeunitId']))
{
    // getDropDownValuesFromDb
    require_once __DIR__ . "/inc/getDropDownValuesFromDb.php";
    ///loading edite developer details page
    require_once ("PL/EditeUnit.php");
}else
{
    //...
    require_once ("PL/home.php");
}

?>
