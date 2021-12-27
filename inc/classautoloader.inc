<?php

spl_autoload_register("myAutoLoader");
function myAutoLoader($className){
    
    $path = "classes/";
    $extensiontype = ".class.php";
    $fullpath = $path . $className . $extensiontype;

	include $fullpath;

}




?>