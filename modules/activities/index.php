<?php

// loading System Classes
include_once("inc/classautoloader.inc");

//include dirname(__FILE__)."/main/config.php";


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
elseif (isset($_GET['ActivityEditeId']))
{
    // getDropDownValuesFromDb
    require_once __DIR__ . "/inc/getDropDownValuesFromDb.php";
    ///loading unite details
    require_once ("PL/ActivityEdite.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
