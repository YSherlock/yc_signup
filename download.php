<?php 
ob_start();
require('database.php');

$sql = "SELECT id,username,studentid,school,perfession_class,qq,telephone FROM ".$tbname;
//ListAll
$result = mysqli_query($conn,$sql);

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition:filename=signup.csv");
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-control:must-revalidate,post-check=0,pre-check=0");

ob_end_flush();
echo iconv("UTF-8","UTF-8","序号,姓名,学号,学院,专业班级,QQ,联系方式\n");
$col = mysqli_fetch_all($result);

foreach($col as $row) {
	
	foreach($row as $temp2) {
		echo iconv("UTF-8","UTF-8",$temp2).",";
	}
	echo "\n";
}

?>