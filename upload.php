<?php

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
$countfiles = count($_FILES['file']['name']);
$count=0;

////連線
$serverName="localhost";
$connectionInfo=array("Database"=>"Embryo", "UID"=>"sa", "PWD"=>"123456");
$conn=sqlsrv_connect($serverName, $connectionInfo);
       

 // Looping all files
for($i=0;$i<$countfiles;$i++){
	echo $i;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$count++;
		$name     = $_FILES['file']['name'][$i];
		$tmpName  = $_FILES['file']['tmp_name'][$i];
		$error    = $_FILES['file']['error'][$i];
		$size     = $_FILES['file']['size'][$i];
		$ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		$extension = pathinfo($name, PATHINFO_EXTENSION);
		$newName=date("Ymd_His")."_".$count;
		$img_size=getimagesize($tmpName);
		$width=$img_size[0];
		$height=$img_size[1];
		$time=date("Ymd H:i:s");
	  
		switch ($error) {
			case UPLOAD_ERR_OK:
				$valid = true;
				//validate file extensions
				if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
					$valid = false;
					$response = '錯誤檔案類型';
					echo "<script type='text/javascript'>alert('$name.$response');</script>";
				}
				//validate file size
				if ( $size/1024/1024 > 4 ) {
					$valid = false;
					$message = "檔太大無法上傳";
					echo "<script type='text/javascript'>alert('$name.$message');</script>";
					$response = 'File size is exceeding maximum allowed size.';
				}
				//upload file
				if ($valid) {
					$newFileName=$newName.".".$extension;
					$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $newFileName;
					move_uploaded_file($tmpName,$targetPath);
					$sql="INSERT INTO image_sizeInfo(PicName,FilePath,UploadTime,width,height) VALUES('$newFileName','$targetPath','$time','$width','$height')";
					$query=sqlsrv_query($conn,$sql)or die("sql error".sqlsrv_errors());					
				}
				break;
			case UPLOAD_ERR_INI_SIZE:
				$response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
				break;
			case UPLOAD_ERR_PARTIAL:
				$response = 'The uploaded file was only partially uploaded.';
				break;
			case UPLOAD_ERR_NO_FILE:
				$response = '沒有檔案被上傳';
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
				break;
			case UPLOAD_ERR_CANT_WRITE:
				$response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
				break;
			default:
				$response = '不知名錯誤';
			break;
		}

		echo $response;
	}
}
header( 'Location: index.php' ) ;
exit;
?>