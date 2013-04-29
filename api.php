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

	if(isset($_GET['fname'])){
		$getStudent = $dbk->prepare('SELECT * FROM hi2013_students WHERE LOWER(studentFName) = LOWER(?)');
		$getStudent->bindParam(1, $_GET['fname']);
		$getStudent->execute();
		if($getStudent->rowCount() < 1) {
			$object['studentFName'] = 'none';
			print(json_encode($object));
		} else if ($getStudent->rowCount() > 1) {
				$object['studentFName'] = 'too many';
			print(json_encode($object));
		} else {
			$student = $getStudent->fetch();
			print(json_encode($student));
		}
	}
?>