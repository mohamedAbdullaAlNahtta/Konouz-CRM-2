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
elseif (isset($_GET['SRId']))
{
    ///loading developer details
    require_once ("PL/SRDetails.php");
}
elseif (isset($_GET['EditeSRId']))
{
    // getDropDownValuesFromDb
    require_once __DIR__ . "/inc/getDropDownValuesFromDb.php";
    ///loading edite developer details page
    require_once ("PL/EditeSR.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
