<?php

// loading System Classes
include_once("inc/classautoloader.inc");

//include dirname(__FILE__)."/main/config.php";


/////////////////////////
// loading module screen
/////////////////////////
if (isset($_GET['create']))
{
    //loading create page
    require_once ("PL/create.php");
}
elseif (isset($_GET['ActivityId']))
{
    ///loading unite details
    require_once ("PL/ActivityDetails.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
