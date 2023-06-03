7	<?php
	$db='dbgym';
    $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(! $conn ) die('Could not connect: ' . mysql_error());
	if($conn) {

	
	//Type
	$trname = $_POST['trainingName'];
	$reqlevel = $_POST['reqlevel'];
	$reqeq = $_POST['reqeq'];
	$pic = $_POST['pic'];
	//Group Training
	$grtype=$_POST['grtype'];
	$grcoach=$_POST['grcoach'];
	$rundate=$_POST['rundate'];
	$timestart=$_POST['timestart'];
	$timeend=$_POST['timeend'];
	$maxattendants=$_POST['maxattendants'];
	$minattendants=$_POST['minattendants'];
	$room=$_POST['room'];
	




	$login=htmlspecialchars($_COOKIE['Login']);
	$pass=htmlspecialchars($_COOKIE['Pass']);
	// Do I need put permissions on Update/Delete/etc?
	$checkEmailQuery= $conn->query("SELECT ClubLocationName
	FROM coach
	WHERE Email= '$login' AND Password = '$pass'");


	if($checkEmailQuery){
		
		
		$updateAcc=null;
		//TYPE
	    if($trname!=null &&
		$reqlevel!=null && 
		$pic!=null && $reqeq==null )
		{
			echo('1');
			echo($reqeq);
	    	$updateAcc=$conn->query("INSERT INTO `trainingtype`(`TrainingName`, `Img`, `RequiredLevel`) VALUES ('$trname','$pic','$reqlevel')");
			if($updateType){
				echo "yeeeeeeeeeeeees";
				header('Location: '.$uri.'/test.loc/pageCoachProfile.php');// перекидывает на этот адрес
			}
    
	     }else if($trname!=null &&
		 $reqlevel!=null && 
		 $pic!=null && $reqeq!=null)
		 {
			
			 $updateType=$conn->query("INSERT INTO `trainingtype`(`TrainingName`, `Img`, `RequiredLevel`, `RequiredEquipment` ) VALUES ('$trname','$pic','$reqlevel', '$reqeq')");
			 if($updateType){
				echo "yeeeeeeeeeeeees";
				header('Location: '.$uri.'/test.loc/pageCoachProfile.php');// перекидывает на этот адрес
			}
	 
		  }
		//GroupTr
		if($grtype!=null &&
		$grcoach!=null &&
		$rundate!=null &&
		$timestart!=null &&
		$timeend!=null &&
		$maxattendants!=null &&
		$minattendants!=null &&
		$room!=null){
			
			
			 $updateGroup=$conn->query("INSERT INTO `grouptraining`(`TrainingName`, `CoachID`, `RunDate`, `TimeStart`, `TimeEnd`, `MaxAttendants`, `MinAttendants`, `Room`)
			  VALUES ('$grtype','$grcoach','$rundate', '$timestart', '$timeend', '$maxattendants', '$minattendants','$room')");
	 
	 if($updateGroup){
		echo "yes";
		header('Location: '.$uri.'/test.loc/pageCoachProfile.php');// перекидывает на этот адрес
	}
		  }
		
		
		
	}else{
		echo "Not found email";
	}

}else{
	echo "No connection to database";
}
	
	


	// $sql = "INSERT INTO `account` ( `NICK`, 'DESCRIPTION', 'PROFPIC_URL') VALUES 
	//  ('$nick', '$desc', '$pic')";

    // if ($conn->query($sql) === TRUE) {
	// 	echo "New record created successfully";
	// 	setcookie("Description", $desc, time()+3600, "/");
	// 	setcookie("Pic_url", $pic, time()+3600, "/");
	// 	setcookie("Nick", $nick, time()+3600, "/");
	//     header('Location: '.$uri.'/test.loc/pagePrifile.php');// перекидывает на этот адрес
		
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
	// }
	

	//setcookie("Access", $id, time()+3600, "/");

	//$pass = 'kekKEK123@';
	//$email ='marinapelina@gmail.com';
	
    
	mysqli_close($conn);
?>


<!-- 	

	
	// $prevCon="SELECT * FROM account";
	// $result = $conn->query($prevCon);
	// if(!$result) die("GG!");
// $gg = $result->num_rows +1;//?

// $checkEmailQuery= $conn->query(
// 	"SELECT COUNT(EMAIL) AS 'Exist'
// 	FROM account
// 	WHERE EMAIL= '$email'");
// $passValidate = preg_match("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])(?=\\S+$).{8,}", $pass);
// $emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);
// $emailAgain = $checkEmailQuery->fetch_assoc()['Exist']==0;
// $passwordsAreEqual = $pass ==$verpass;
// echo $passwordsAreEqual;
// echo $passValidate;
// echo $emailAgain;
// echo $emailValidate;

// $Suc = $passValidate && $passwordsAreEqual && $emailValidate && $emailAgain; 

// if($Suc ==false){
// 	if(!empty($_SERVER['HTTPS'])&&('on' == $_SERVER['HTTPS'])){
// 		$uri = 'https://';
// 	}else{
// 		$uri = 'http://';
// 	}
// 	$uri .=$_SERVER['HTTP_HOST'];
// 	//header('Location: '.$uri.'/test.loc/Signin.html');
// 	exit;
// } -->
