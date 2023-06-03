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
	if(! $conn ) {
	   die('Could not connect: ' . mysql_error());
	} 
	if($conn){
		
	
	$email = $_POST['login'];
    $pass = $_POST['password'];
	
	//if member
	$check= $conn->query("SELECT `MemberId` FROM `member`
	WHERE `Email`='$email' AND `Password` = '$pass'");
    //if admin
    $check2= $conn->query("SELECT LoginID FROM admin
    WHERE LoginID='$email' AND Password = '$pass'");
	//if coach
    $check3= $conn->query("SELECT CoachID FROM coach
    WHERE Email='$email' AND Password = '$pass'");

	if((mysqli_num_rows($check))!=0){
		
		setcookie("Login", $email, time()+3600, "/");
    setcookie("Pass", $pass, time()+3600, "/");
		echo('
            <form name="goto"  method="post" action="pageProfile.php">
            <input type="hidden" name="login"  value="'); echo($email); echo('">
            <input type="hidden" name="password" value="'); echo($pass); echo('">
            <p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="GO TO PROFILE" onclick="showPrompt()"></p>
            </form>
		');
	}
	else if((mysqli_num_rows($check2))!=0){
		setcookie("Login", $email, time()+3600, "/");
    setcookie("Pass", $pass, time()+3600, "/");
		//Go to pageAdminProfile.php
		echo('
            <form name="goto"  method="post" action="pageAdminProfile.php">
			<input type="hidden" name="login" value="'); echo($email);echo('">
			<input type="hidden" name="password" value="'); echo($pass); echo('">
			<p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Continue" onclick="showPrompt()"></p>
			</form>
		');
	}
	else if((mysqli_num_rows($check3))!=0){
		setcookie("Login", $email, time()+3600, "/");
    setcookie("Pass", $pass, time()+3600, "/");
		//Go to pageCoachProfile.php
		echo('
            <form name="goto"  method="post" action="pageCoachProfile.php">
			<input type="hidden" name="login" value="'); echo($email);echo('">
			<input type="hidden" name="password" value="'); echo($pass); echo('">
			<p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Continue" onclick="showPrompt()"></p>
			</form>
		');
	}else{
		echo 'Not found';
		setcookie("Login", null, time()+3600, "/");
    setcookie("Pass", null, time()+3600, "/");
		header('Location: '.$uri.'/test.loc/pageSignin.php');
	}
}
	else{
		echo "Not could not connect to database";
	}
	

	mysqli_close($conn);
?>
</body>
</html>
<!-- 	

	//header('Location: '.$uri.'/test.loc/pageProfile.php');
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
