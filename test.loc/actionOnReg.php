	<?php
	$db='dbgym';
    $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(! $conn ) {
	   die('Could not connect: ' . mysql_error());
	} 
	if($conn){
		echo 'Успешно соединились!!!';
	}
	$lastname = $_POST['lastname'];
	$email = rtrim($_POST['login']);//delete empty end 
	$firstname = $_POST['firstname'];
	$pass =ltrim($_POST['password']);//delete empty start 
	$membership =$_POST['membership'];
	$mobile =$_POST['mobile'];

	if($membership!=0){
		$sql = "INSERT INTO `member` (`MemberId`, `FirstName`, `Email`,
		`Password`, `LastName`, `MembershipCode`, `Mobile` ) VALUES 
		(NULL, '$firstname', '$email', '$pass', '$lastname',
		  '$membership', '$mobile')";
   
	   if ($conn->query($sql) === TRUE) {
		   echo "New record created successfully";
		   setcookie("Login", $email, time()-3600, "/");
		   setcookie("Pass", $pass, time()-3600, "/");
		   setcookie("FirstName", $firstname, time()-3600, "/");
		   setcookie("Membership", $membership, time()-3600, "/");
	   
		   header('Location: '.$uri.'/test.loc/pageSignin.php');// перекидывает на этот адрес
		   
	   } else {
		   echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	   
	}else{
		$sql = "INSERT INTO `member` (`MemberId`, `FirstName`, `Email`,
		`Password`, `LastName`, `Mobile` ) VALUES 
		(NULL, '$firstname', '$email', '$pass', '$lastname',
		   '$mobile')";
   
	   if ($conn->query($sql) === TRUE) {
		   echo "New record created successfully";
		   setcookie("Login", $email, time()+3600, "/");
		   setcookie("Pass", $pass, time()+3600, "/");
		   setcookie("FirstName", $firstname, time()+3600, "/");
		   setcookie("Membership", $membership, time()+3600, "/");
	   
		   header('Location: '.$uri.'/test.loc/pageSignin.php');// перекидывает на этот адрес
		   
	   } else {
		   echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	}
	

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
