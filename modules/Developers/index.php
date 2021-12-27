<?php


/////////////////////////
// loading module screen
/////////////////////////
if (isset($_GET['create']))
{
    //loading create page
    require_once ("PL/create.php");
}
elseif (isset($_GET['DeveloperId']))
{
    ///loading developer details
    require_once ("PL/DeveloperDetails.php");
}
elseif (isset($_GET['EditeDeveloperId']))
{
    ///loading edite developer details page
    require_once ("PL/EditeDeveloper.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
