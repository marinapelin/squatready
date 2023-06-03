<html>
		<head>
			<style>
				.b{
                    background-color: blueviolet;
                    width: 100%;
                    color: white;
                    padding: 15px;
                    border: none;
                    border-radius: 30px;
                    box-shadow:0 15px  20px rgba(0, 0, 0, 0.3);
                    font-size: 20px;
                    margin: 20px 0;
                }
			</style>
		</head>	
<?php
	$db='dbgym';
    $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(! $conn ) die('Could not connect: ' . mysql_error());
	if($conn) echo 'Успешно соединились!!!';
	

	$email = $_POST['login'];
    $pass =$_POST['password'];
    $name=$_POST['name'];
    $memberid=$_POST['memberid'];


	setcookie("Memberid", $memberid, time()-3600, "/");
	
	setcookie("Login", $email, time()-3600, "/");
	setcookie("Pass", $pass, time()-3600, "/");
	

	$checkEmailQuery= $conn->query(
		"SELECT MemberId
		FROM member
		WHERE Email= '$email' AND Password = '$pass'");
	
	
	if($checkEmailQuery){
		$result=$checkEmailQuery->fetch_assoc();
		$memberid=$result['MemberId'];

		echo'Вы найдены';
		$updatePay=null;

		$card=$_POST['card'];
	    $bsb=$_POST['bsb'];
	    $expmonth=$_POST['expmonth'];
	    $expyear=$_POST['expyear'];
	    $cardfirstname=$_POST['cardfirstname'];
	    $cardlastname=$_POST['cardlastname'];
		
		
		if($card!=null &&
		$bsb!=null &&
		$expmonth!=null &&
		$expyear!=null &&
		$cardfirstname!=null &&
		$cardlastname!=null){
			echo('1');
			//edit in future 
			//$id=$memberid*1000;
			 
			 $updatePay=$conn->query("INSERT INTO `paymentdetails`(`CardFirstName`, `CardLastName`, `Card`, `BSB`, `ExpiryMonth`, `ExpiryYear`, `LastPaymentId`, `LastPaymentDate`, `LastUpdate`, `ID`)
			  VALUES ('$cardfirstname','$cardlastname','$card', '$bsb', '$expmonth', '$expyear', NULL,NULL, NULL, NULL)");
			  
			 
	 
	 
		  }
		
		if($updatePay){
			$findId= $conn->query(
				"SELECT  `ID` FROM `paymentdetails` WHERE `CardFirstName`='$cardfirstname' AND `CardLastName`='$cardlastname' AND `Card`='$card' AND `BSB`= '$bsb' AND `ExpiryMonth`='$expmonth' AND `ExpiryYear`='$expyear'");
			  
				$resulta=$findId->fetch_assoc();
			  
			  $id=$resulta["ID"];
			  $updateAcc=$conn->query("UPDATE `member` SET `PaymentId`='$id' WHERE `MemberId`='$memberid'");

			 
			echo "yeeeeeeeeeeeees";
			echo $resulta["ID"];
	       header('Location: '.$uri.'/test.loc/pageProfile.php');// перекидывает на этот адрес
		}
	}else{
		echo "Not found email";
	}
    
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
