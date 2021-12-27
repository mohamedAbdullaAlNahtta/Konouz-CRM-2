<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


$download_file=$_GET['download_file'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($download_file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($download_file));
ob_clean();
flush();
readfile($download_file);
exit();

// onclick="window.location.href ='uploads/download.php?download_file=units/layout-with-dimensions.jpg'"

?>

</body>
</html>