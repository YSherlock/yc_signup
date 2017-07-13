<?php
ob_start();
require('database.php');
require('resobj.php');

$username = trim($_POST['username']);
$studentid = trim($_POST['studentid']);
$school = trim($_POST['school']);
$perfession_class = trim($_POST['perfession_class']);
$qq = trim($_POST['qq']);
$telephone = trim($_POST['telephone']);


$response = "true";
$message = "";
//检查是否已经报名
$sql1 = "SELECT studentid FROM ".$tbname;
$result = mysqli_query($conn,$sql1);
//判断是否存在相同的学号
$col = mysqli_fetch_all($result);
foreach($col as $temp1){
	foreach($temp1 as $temp2) {
		if($studentid == $temp2) {
			$response = "false";
			$message = "已报名成功，无需重复报名";
		}
	}
}

if($response == "false") {
	$resb = new ResObj($message, $response);
	$jsonRes = json_encode($resb);
	echo $jsonRes;
} else {
	$resb = new ResObj($message, $response);
	$jsonRes = json_encode($resb);
	echo $jsonRes;
}

if($response == "true") {
	$sql = "INSERT INTO ".$tbname."(username,studentid,school,perfession_class,qq,telephone) VALUES(?,?,?,?,?,?)";
	$stmt = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($stmt,"ssssss", $username, $studentid, $school,$perfession_class,$qq,$telephone);
	mysqli_stmt_execute($stmt);
}
mysqli_close($conn);
ob_end_flush();

?>