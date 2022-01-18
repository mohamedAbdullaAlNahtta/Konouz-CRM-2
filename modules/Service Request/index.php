<?php


/////////////////////////
// loading module screen
/////////////////////////
if (isset($_GET['create']))
{
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
    ///loading edite developer details page
    require_once ("PL/EditeSR.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
