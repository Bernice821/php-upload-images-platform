<?php
// get correct file path
$fileName = $_GET['name'];
$filePath = 'uploads/'.$fileName;
////連線
$serverName="localhost";
$connectionInfo=array("Database"=>"Embryo", "UID"=>"sa", "PWD"=>"123456");
$conn=sqlsrv_connect($serverName, $connectionInfo);

$sql="DELETE FROM image_sizeInfo WHERE PicName='$fileName'";
$query=sqlsrv_query($conn,$sql)or die("sql error".sqlsrv_errors());	
// remove file if it exists
if ( file_exists($filePath) ) {
	unlink($filePath);
	header('Location:index.php');
}
?>