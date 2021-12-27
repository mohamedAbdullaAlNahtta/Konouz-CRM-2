<?php


/////////////////////////
// loading module screen
/////////////////////////
if (isset($_GET['create']))
{
    //loading create page
    require_once ("PL/create.php");
}
elseif (isset($_GET['ProjectId']))
{
    ///loading project details
    require_once ("PL/ProjectDetails.php");
}
elseif (isset($_GET['EditeProjectId']))
{
    ///loading project details
    require_once ("PL/EditeProject.php");
}
else
{
    //...
    require_once ("PL/home.php");
}

?>
