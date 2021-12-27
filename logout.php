<?php
session_start();
error_reporting(0);

$_SESSION['username']=="";
$_SESSION['password']="";

session_destroy();
session_unset();


?>
<script language="javascript">
document.location="login";
</script>