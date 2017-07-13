<?php 
	$host = 'localhost';
	$dbusername = 'root';

	$dbname = 'test';
	$tbname = 'user';
	$sql_arr = [
		"sql0" => "SHOW DATABASES",
		"sql1" => "CREATE DATABASE ".$dbname,
		"sql2" => "SHOW TABLES",
		"sql3" => "CREATE TABLE user(
	id int(11) NOT NULL AUTO_INCREMENT,
	username varchar(30) NOT NULL,	
	studentid varchar(30) NOT NULL,	
	school varchar(30) NOT NULL,	
	perfession_class varchar(55) NOT NULL,	
	qq varchar(20) NOT NULL,	
	telephone varchar(20) NOT NULL,	
	PRIMARY KEY(id)
)CHARSET=utf8 AUTO_INCREMENT=1;",
	];
	
	$conn = mysqli_connect($host,$dbusername) or die("连接数据库失败");
	//判断数据库是否存在，否则创建
	$dbresult = mysqli_query($conn, $sql_arr["sql0"]);
	//var_dump($dbresult);
	while($row1 = mysqli_fetch_assoc($dbresult)) {
		$dbdata[] = $row1["Database"];
	}
	//var_dump($dbdata);
	if(!in_array(strtolower($daname),$dbdata)) {
		$result = mysqli_query($conn, $sql_arr["sql1"]);
		//var_dump($result);
		mysqli_select_db($conn, $dbname);
	}
	
	//判断表是否存在，否则创建
	$tbresult = mysqli_query($conn, $sql_arr["sql2"]);
	//var_dump($tbresult);
	while($row2 = mysqli_fetch_assoc($tbresult)) {
		$tbdata[] = $row2["Tables_in_".$tbname];
	}
	//var_dump($tbdata);
	if(!in_array(strtolower($tbname),$tbdata)) {
		$result = mysqli_query($conn, $sql_arr["sql3"]);
		//var_dump($result);
	}
?>