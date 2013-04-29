<?php
	try {
		$hostname = 'mysql.smartwebservers.com';
		$dbname = 'humberinter';
		$db_username = 'humberinter';
		$_db_password = 'charlie2011';
		$dbk = new PDO('mysql:host='.$hostname.';dbname='.$dbname,$db_username,$_db_password,array(PDO::ATTR_PERSISTENT => true));
	} catch (PDOException $err) {
		die("Unable to connect: ". $err->getMessage());
	}
	$dbk->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbk->exec("SET CHARACTER SET utf8");
	if($_GET['pic'] == 'workPic1') {
		$getInfo = $dbk->query('SELECT studentWorkPic1 FROM hi2013_students');
		$info = array();
		while($row = $getInfo->fetch(PDO::FETCH_NUM)){
			array_push($info, $row);
		}
		print(json_encode($info));
	} else if($_GET['pic'] == 'workPic2') {
		$getInfo = $dbk->query('SELECT studentWorkPic2 FROM hi2013_students');
		$info = array();
		while($row = $getInfo->fetch(PDO::FETCH_NUM)){
			array_push($info, $row);
		}
		print(json_encode($info));
	} else if ($_GET['pic'] == 'cover') {
		$getInfo = $dbk->query('SELECT studentCover FROM hi2013_students');
		$info = array();
		while($row = $getInfo->fetch(PDO::FETCH_NUM)){
			array_push($info, $row);
		}
		print(json_encode($info));
	}
?>