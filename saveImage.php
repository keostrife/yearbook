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
	if(isset($_POST['imgBase64'])){
		$encodeData = str_replace(' ','+',$_POST['imgBase64']);
		$decoded = ""; 
		for ($i=0; $i < ceil(strlen($encodeData)/256); $i++) 
		$decoded = $decoded . base64_decode(substr($encodeData,$i*256,256)); 

		$image = base64_decode(substr($encodeData,22));

		//check signCount
		$checkSignCount = $dbk->prepare('SELECT signCount FROM hi2013_students WHERE studentFName=?');
		$checkSignCount->bindParam(1, $_POST['student']);
		$checkSignCount->execute();
		if($checkSignCount->rowCount() != 1) {
			print('error');
		} else {
			$signCount = $checkSignCount->fetch();
			if(!file_put_contents('studentSigns/SS-'.ucfirst($_POST['student']).$signCount[0].'.png', $image)) {
				print('error');
			} else {
				print($signCount[0]);
				$updateSignCount = $dbk->prepare('UPDATE hi2013_students SET signCount = signCount + 1 WHERE studentFName=?');
				$updateSignCount->bindParam(1, $_POST['student']);
				$updateSignCount->execute();
			}
		}

		
	}
?>